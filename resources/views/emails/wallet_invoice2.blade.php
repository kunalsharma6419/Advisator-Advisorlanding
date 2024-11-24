<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fc;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header img {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 32px;
            color: #2c3e50;
            margin: 0;
        }
        .content {
            margin-bottom: 30px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }
        .table-container {
            margin-top: 20px;
            margin-bottom: 40px;
        }
        .table-container table {
            width: 100%;
            border-collapse: collapse;
        }
        .table-container th, .table-container td {
            padding: 12px;
            text-align: left;
            font-size: 16px;
        }
        .table-container th {
            background-color: #f4f7fc;
            color: #2c3e50;
        }
        .table-container td {
            border-bottom: 1px solid #e0e0e0;
        }
        .highlight-success {
            color: #19b20e;
            font-weight: bold;
        }
        .total-amount {
            font-weight: bold;
            font-size: 18px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 40px;
        }
        .footer a {
            color: #526E1C;
            text-decoration: none;
            padding: 0 8px;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header with logo -->
        <div class="header">
            <img src="https://advisator.com/src/assets/logo/AdvisatorLogo.png" alt="Advisator Logo">
            <h1>Invoice</h1>
        </div>

        <!-- Greeting message -->
        <div class="content">
            <p>
                Hi {{ $user->full_name }},<br>
                Thanks for recharging! Your recharge has been confirmed. You can now avail our services against this recharge. Looking forward to serving you!
            </p>
        </div>

        <!-- Invoice details -->
        <div class="table-container">
            <table>
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
                    <td class="highlight-success"><strong>Success</strong></td>
                </tr>
            </table>
        </div>

        <!-- User details -->
        <div class="table-container">
            <table>
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
            </table>
        </div>

        <!-- Transaction details -->
        <div class="table-container">
            <table>
                <tr>
                    <th>DESCRIPTION</th>
                    <th>AMOUNT (₹)</th>
                </tr>
                <tr>
                    <td>{{ $plan->plan_name }}</td>
                    <td>₹{{ number_format($plan->plan_price, 2) }}</td>
                </tr>
                <tr>
                    <td>Taxable Amount</td>
                    <td>₹{{ number_format($walletRecharge->amount, 2) }}</td>
                </tr>
                <tr>
                    <td>IGST @ 18.00%</td>
                    <td>₹{{ number_format($walletRecharge->tax, 2) }}</td>
                </tr>
                <tr>
                    <td class="total-amount"><strong>Net Amount Payable (₹)</strong></td>
                    <td class="total-amount"><strong>₹{{ number_format($walletRecharge->total_amount, 2) }}</strong></td>
                </tr>
            </table>
        </div>

        <!-- Footer with links -->
        <div class="footer">
            <p>This is a computer-generated invoice and does not require a signature or stamp.</p>
            <p>
                <a href="https://advisator.com/cancellation-and-refund-policy" target="_blank">Cancellation & Refund Policy</a> |
                <a href="https://advisator.com/shipping-and-delivery-policy" target="_blank">Shipping & Delivery Policy</a> |
                <a href="https://advisator.com/onboarding-policy" target="_blank">Onboarding Policy</a> |
                <a href="https://advisator.com/privacy-policy" target="_blank">Privacy Policy</a> |
                <a href="https://advisator.com/terms-of-service" target="_blank">Terms of Service</a>
            </p>
            <p><a href="https://advisator.com/" target="_blank">Visit Advisator</a></p>
        </div>
    </div>

</body>
</html>
