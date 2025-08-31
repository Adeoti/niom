<!DOCTYPE html>
<html>
<head>
    <title>Membership Approved</title>
</head>
<body>
    <h2>Congratulations, {{ $membership->first_name }}!</h2>
    
    <p>Your membership application with ID: {{ $membership->id }} has been approved.</p>
    
    <p>Application Details:</p>
    <ul>
        <li>Name: {{ $membership->title }} {{ $membership->first_name }} {{ $membership->surname }}</li>
        <li>Membership Type: {{ $membership->type }}</li>
        <li>Approval Date: {{ $membership->approval_date->format('F j, Y') }}</li>
    </ul>
    
    <p>Thank you for joining our community!</p>
    
    <p>Best regards,<br>Membership Team</p>
</body>
</html>