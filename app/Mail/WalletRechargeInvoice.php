<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WalletRechargeInvoice extends Mailable
{
    use Queueable, SerializesModels;

    public $walletRecharge;
    public $user;
    public $plan;
    public $pdfPath;

    /**
     * Create a new message instance.
     *
     * @param $walletRecharge
     * @param $user
     * @param $plan
     * @param $pdfPath
     */
    public function __construct($walletRecharge, $user, $plan, $pdfPath)
    {
        $this->walletRecharge = $walletRecharge;
        $this->user = $user;
        $this->plan = $plan;
        $this->pdfPath = $pdfPath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.wallet_invoice2')
            ->with([
                'walletRecharge' => $this->walletRecharge,
                'user' => $this->user,
                'plan' => $this->plan,
            ])
            ->attach($this->pdfPath, [
                'as' => $this->walletRecharge->razorpay_order_id . '_Invoice.pdf',  // Correct concatenation
                'mime' => 'application/pdf',
            ])
            ->subject('Wallet Recharge Invoice [Transaction ID: ' . $this->walletRecharge->razorpay_order_id . ']');
    }
}
