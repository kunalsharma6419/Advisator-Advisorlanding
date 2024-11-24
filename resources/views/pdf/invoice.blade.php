<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .invoice-header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
        }
        .details, .amount-details {
            margin: 20px;
        }
        .details p {
            margin: 5px 0;
        }
        .details span {
            font-weight: bold;
        }
        .footer {
            font-size: 12px;
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        td, th {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .total {
            font-weight: bold;
            text-align: right;
        }
        .signature-note {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <div class="invoice-header">
        <p>Invoice</p>
    </div>

    <h2>Thanks for using Advisator, {{ $user->full_name }}!</h2>
    <p>Here are your order details
    </p>

    <div class="details">
        <p><span>Invoice Number:</span> {{ $walletRecharge->id }}</p>
        <p><span>Invoice Date/Time:</span> {{ \Carbon\Carbon::parse($walletRecharge->created_at)->format('d/m/Y (h:i A)') }}</p>
        <p><span>Order ID:</span> {{ $walletRecharge->razorpay_order_id }}</p>
        <p><span>Service Type:</span> Wallet Recharge</p>
        <p><span>Recharge Status:</span> <span style="color:green;"><strong>Success</strong></span></p>
    </div>

    <div class="details">
        <p><span>Name:</span> {{ $user->full_name }}</p>
        <p><span>Phone Number:</span> {{ $user->phone_number }}</p>
    </div>

    <div class="amount-details">
        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Amount (₹)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $plan->plan_name }}</td>
                    <td>₹{{ number_format($plan->plan_price, 2) }}</td>
                </tr>
                <tr>
                    <td>Taxable Amount</td>
                    <td>₹{{ number_format($walletRecharge->amount, 2) }}</td>
                </tr>
                <tr>
                    <td>IGST @ 18%</td>
                    <td>₹{{ number_format($walletRecharge->tax, 2) }}</td>
                </tr>
                <tr>
                    <td><strong>Net Amount Payable</strong></td>
                    <td><strong>₹{{ number_format($walletRecharge->total_amount, 2) }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="signature-note">
        <p>This is a computer-generated invoice and does not require a signature or stamp.</p>
    </div>

    <div class="footer">
        {{-- <p>Corporate Office Address: Plot no. 220, Phase IV, Udyog Vihar, Sector 18, Gurugram, Haryana 122001</p>
        <p>Registered Office: CSG LGF Grand Vasant, Vasant Kunj, New Delhi, Delhi 110070</p>
        <p>Helpline No: +91 9999 091 091</p>
        <p><strong>Amount in Words:</strong> <i>ONE THOUSAND ONE HUNDRED EIGHTY RUPEES ONLY</i></p>
        <p><strong>GST No.:</strong> 07AABCN1019J1ZQ | <strong>PAN:</strong> AABCN1019J | <strong>SAC:</strong> 998313</p> --}}
    </div>

</body>
</html>
