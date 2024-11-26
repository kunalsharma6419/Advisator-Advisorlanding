<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <p>Hello {{ $advisor->full_name }},</p>
    <p>The user <strong>{{ $authUser->unique_id }}</strong> is interested in scheduling a consulting session with you.</p>
    <p>Best Regards,</p>
    <p>Advisator</p>
</body>
</html>
