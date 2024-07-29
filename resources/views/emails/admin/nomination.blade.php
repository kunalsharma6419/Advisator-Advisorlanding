<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Nomination Received</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            font-size: 24px;
            font-weight: bold;
            color: #333333;
            margin-bottom: 20px;
        }
        .content {
            margin-bottom: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: #007BFF;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777777;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        New Nomination Received
    </div>

    <div class="content">
        <p>Hello Admin,</p>
        <p>A new nomination has been submitted on the platform. Here are the details:</p>

        <table class="table">
            <tr>
                <th>Field</th>
                <th>Details</th>
            </tr>
            <tr>
                <td>Nominee Name</td>
                <td>{{ $advisor->full_name }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $advisor->email }}</td>
            </tr>
            <tr>
                <td>Mobile Number</td>
                <td>{{ $advisor->mobile_number }}</td>
            </tr>
            <tr>
                <td>Location</td>
                <td>{{ $advisor->location }}</td>
            </tr>
            <tr>
                <td>LinkedIn Profile</td>
                <td>{{ $advisor->linkedin_profile ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Business Function Category</td>
                <td>{{ $advisor->businessFunctionCategory->name }}</td>
            </tr>
            <tr>
                <td>Sub Function Category 1</td>
                <td>{{ $advisor->subFunctionCategory1->name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Sub Function Category 2</td>
                <td>{{ $advisor->subFunctionCategory2->name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Industry</td>
                <td>{{ implode(', ', $advisor->industry_ids ?? []) }}</td>
            </tr>
            <tr>
                <td>Geography</td>
                <td>{{ implode(', ', $advisor->geography_ids ?? []) }}</td>
            </tr>
            <tr>
                <td>Qualification</td>
                <td>{{ $advisor->nominee_qualification ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Experience</td>
                <td>{{ $advisor->nominee_experience ?? 'N/A' }} years</td>
            </tr>
            <tr>
                <td>Skills</td>
                <td>{{ $advisor->nominee_skills ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Discovery Call Price/Min</td>
                <td>{{ $advisor->discovery_call_price_per_minute ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Discovery Call Price/Hour</td>
                <td>{{ $advisor->discovery_call_price_per_hour ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Conference Call Price/Min</td>
                <td>{{ $advisor->conference_call_price_per_minute ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Conference Call Price/Hour</td>
                <td>{{ $advisor->conference_call_price_per_hour ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Chat Price/Min</td>
                <td>{{ $advisor->chat_price_per_minute ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Chat Price/Hour</td>
                <td>{{ $advisor->chat_price_per_hour ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Reason for Nomination</td>
                <td>{{ $advisor->nomination_reason ?? 'N/A' }}</td>
            </tr>
        </table>
    </div>

    {{-- <a href="{{ route('nominations.show', $advisor->nominee_id) }}" class="button">View Nomination</a> --}}

    <div class="footer">
        Thanks,<br>
        {{ config('app.name') }}
    </div>
</div>

</body>
</html>
