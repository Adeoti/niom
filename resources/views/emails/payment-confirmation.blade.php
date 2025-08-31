<!DOCTYPE html>
<html>
<head>
    <title>Payment Confirmation</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #f8f9fa; padding: 20px; text-align: center; }
        .content { padding: 20px; border: 1px solid #ddd; border-top: none; }
        .footer { text-align: center; margin-top: 20px; font-size: 12px; color: #6c757d; }
        .payment-details { background: #f8f9fa; padding: 15px; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Payment Confirmation</h2>
        </div>
        
        <div class="content">
            <p>Dear {{ $membership->first_name }} {{ $membership->surname }},</p>
            
            <p>Thank you for your payment. Your transaction has been processed successfully.</p>
            
            <div class="payment-details">
                <h3>Payment Details:</h3>
                <p><strong>Payment For:</strong> {{ $payment->name }}</p>
                <p><strong>Amount Paid:</strong> {{ number_format($amount, 2) }}</p>
                <p><strong>Payment Method:</strong> {{ $payment->payment_method ?? 'Online' }}</p>
                <p><strong>Transaction Date:</strong> {{ now()->format('F j, Y') }}</p>
                <p><strong>Transaction Reference:</strong> PAY-{{ uniqid() }}</p>
            </div>
            
            <p>This payment has been recorded against your membership account (ID: {{ $membership->id }}).</p>
            
            <p>If you have any questions about this payment, please contact our support team.</p>
            
            <p>Best regards,<br>
            The Membership Team<br>
            {{ config('app.name') }}</p>
        </div>
        
        <div class="footer">
            <p>This is an automated message. Please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>