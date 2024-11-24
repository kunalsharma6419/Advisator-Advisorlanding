<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserProfiles;
use App\Models\WalletPlans;
use App\Models\WalletRecharge;
use Razorpay\Api\Api;
use App\Mail\WalletRechargeInvoice;
use Illuminate\Support\Facades\Mail;
use PDF;

class WalletController extends Controller
{
    public function mywalletrechargeindex()
    {
        $userprofile = UserProfiles::where('user_id', Auth::user()->unique_id)->firstOrFail();
        $walletplans = WalletPlans::all();

        return view('user.pages.mywalletrecharge', [
            'user' => Auth::user(),
            'userprofile' => $userprofile,
            'walletplans' => $walletplans,
        ]);
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:wallet_plans,id',
        ]);

        $plan = WalletPlans::find($request->plan_id);
        // dd($plan);

        $tax = $plan->plan_price * 0.18; // 18% tax
        $platform_fees = $tax * 0.02;    // 2% platform fees
        $total_amount = $plan->plan_price + $tax + $platform_fees;

        $walletRecharge = WalletRecharge::create([
            'user_id' => Auth::user()->unique_id,
            'plan_id' => $plan->id,
            'amount' => $plan->plan_price,
            'tax' => $tax,
            'platform_fees' => $platform_fees,
            'total_amount' => $total_amount,
        ]);

        // Razorpay Integration
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $orderData = [
            'receipt'         => (string)$walletRecharge->id,
            'amount'          => (int)($total_amount * 100), // Amount in paise
            'currency'        => (string)'INR',
            'payment_capture' => (int)1, // Auto capture
        ];

        //

        $razorpayOrder = $api->order->create($orderData);
        // dd($razorpayOrder);
        $walletRecharge->razorpay_order_id = $razorpayOrder['id'];
        $walletRecharge->save();

        // Redirect to Razorpay checkout page
        return view('user.pages.payment', [
            'walletRecharge' => $walletRecharge,
            'razorpayOrder' => $razorpayOrder,
            'plan' => $plan,
            'totalAmount' => $total_amount,
        ]);

        // return redirect()->route('user.mywallet.recharge.success');
    }

    public function success()
    {
        return view('wallet_recharge.success');
    }

    public function failure()
    {
        return view('user.pages.paymentfailure');
    }

    public function paymentCallback(Request $request)
    {
        $signatureStatus = $this->verifySignature($request);

        if ($signatureStatus) {
            // Payment successful, update the recharge record
            $walletRecharge = WalletRecharge::where('razorpay_order_id', $request->razorpay_order_id)->first();
            $walletRecharge->recharge_status = 'Success';
            $walletRecharge->save();

            // Recalculate wallet balance for the user
            $user = Auth::user(); // Assuming you have a relationship set up
            $totalRechargeAmount = WalletRecharge::where('user_id', $user->unique_id)
                ->where('recharge_status', 'Success')
                ->sum('amount');

            // Update user's wallet balance
            $user->user_wallet_balance = $totalRechargeAmount;
            $user->save();

            //Mail Send To User

             // Send the invoice mail
    $this->sendInvoiceMail($walletRecharge);

            // Redirect to success page
            return redirect()->route('user.mywallet.recharge')->with('success', 'Wallet Recharge Successful');


        } else {
            // Payment failed, redirect to failure page
            return redirect()->route('wallet.recharge.failure');
        }
    }


    protected function sendInvoiceMail($walletRecharge)
{
    // Fetch user details
    $user = User::where('unique_id', $walletRecharge->user_id)->first();
    if (!$user) {
        throw new \Exception("User not found for wallet recharge ID: {$walletRecharge->id}");
    }

    // Fetch plan details
    $plan = WalletPlans::find($walletRecharge->plan_id);
    if (!$plan) {
        throw new \Exception("Plan not found for plan ID: {$walletRecharge->plan_id}");
    }

    // Generate the PDF invoice with walletRecharge, user, and plan
    $pdf = PDF::loadView('pdf.invoice', [
        'walletRecharge' => $walletRecharge,
        'user' => $user,
        'plan' => $plan,
    ]);

    // Save the PDF to storage
    $pdfPath = storage_path('app/public/invoice_' . $walletRecharge->id . '.pdf');
    $pdf->save($pdfPath);

    // Send the email with all details and the PDF attachment
    Mail::to($user->email)->send(new WalletRechargeInvoice($walletRecharge, $user, $plan, $pdfPath));
}

    



    protected function verifySignature($request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        try {
            $attributes = [
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature,
            ];

            $api->utility->verifyPaymentSignature($attributes);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

}
