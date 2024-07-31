<!DOCTYPE html>
<html>
<head>
    <title>New Ticket Submitted</title>
</head>
<body>
    <h1>New Ticket Submitted</h1>
    <p><strong>Subject:</strong> {{ $ticketData['subject'] }}</p>
    <p><strong>Description:</strong> {{ $ticketData['description'] }}</p>
    @if(isset($ticketData['attachment']))
        <p><strong>Attachment:</strong> <a href="{{ asset('storage/' . $ticketData['attachment']) }}">Download</a></p>
    @endif
</body>
</html>
