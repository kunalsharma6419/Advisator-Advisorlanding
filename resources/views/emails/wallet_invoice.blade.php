<div>
    <div>
        <img src="https://advisator.com/src/assets/logo/AdvisatorLogo.png" alt="Advisator Logo">
        <span style="font-size: 24px; font-weight: bold;">Invoice</span>
    </div>
    <div>
        <p>
            Hi {{ $user->full_name }},<br>
            Thanks for recharging! Your recharge has been confirmed. You can now avail our services against this recharge. Looking forward to serving you!
        </p>
    </div>

    <div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td>Invoice Number</td>
                    <td>:</td>
                    <td><strong>{{ $walletRecharge->id }}</strong></td>
                </tr>
                <tr>
                    <td>Invoice date/time</td>
                    <td>:</td>
                    <td><strong>{{ \Carbon\Carbon::parse($walletRecharge->created_at)->format('d/m/Y (h:i A)') }}</strong></td>
                </tr>
                <tr>
                    <td>Order ID</td>
                    <td>:</td>
                    <td><strong>{{ $walletRecharge->razorpay_order_id }}</strong></td>
                </tr>
                <tr>
                    <td>Service Type</td>
                    <td>:</td>
                    <td><strong>Wallet Recharge</strong></td>
                </tr>
                <tr>
                    <td>Recharge Status</td>
                    <td>:</td>
                    <td style="color:#19b20e"><strong>Success</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td><strong>{{ $user->full_name }}</strong></td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td>:</td>
                    <td><strong>{{ $user->phone_number }}</strong></td>
                </tr>
                {{-- <tr>
                    <td>Place Of Supply</td>
                    <td>:</td>
                    <td><strong>{{ $user->profile->location ?? 'Not Available' }}</strong></td>
                </tr> --}}
            </tbody>
        </table>
    </div>

    <div>
        <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td width="52%">DESCRIPTION</td>
                    <td width="48%">AMOUNT (₹)</td>
                </tr>
                <tr>
                    <td>{{ $plan->plan_name }}</td>
                    <td>₹{{ number_format($plan->plan_price, 2) }}</td>
                </tr>
                {{-- <tr>
                    <td>Discount</td>
                    <td>₹0.00</td>
                </tr> --}}
                <tr>
                    <td>Taxable Amount</td>
                    <td>₹{{ number_format($walletRecharge->amount, 2) }}</td>
                </tr>
                <tr>
                    <td>IGST @ 18.00%</td>
                    <td>₹{{ number_format($walletRecharge->tax, 2) }}</td>
                </tr>
                <tr>
                    <td><strong>Net Amount Payable (₹)</strong></td>
                    <td><strong>₹{{ number_format($walletRecharge->total_amount, 2) }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>This is a computer-generated invoice and does not require a signature or stamp.</div>

    <div>
      
    </div>
</div>
