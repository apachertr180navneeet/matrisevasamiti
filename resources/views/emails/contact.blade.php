<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contact Form Submission</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <h2 style="color: #f47a20; border-bottom: 2px solid #f47a20; padding-bottom: 10px;">New Contact Form Message</h2>
    <p>You have received a new inquiry from the Matri Seva Samiti website:</p>
    <table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
        <tr>
            <td style="padding: 8px; font-weight: bold; width: 120px; border-bottom: 1px solid #eee;">Name:</td>
            <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $name }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Email:</td>
            <td style="padding: 8px; border-bottom: 1px solid #eee;"><a href="mailto:{{ $email }}">{{ $email }}</a></td>
        </tr>
        <tr>
            <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Phone:</td>
            <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $phone }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Subject:</td>
            <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $subject }}</td>
        </tr>
    </table>
    <div style="margin-top: 20px; padding: 15px; background: #f9f9f9; border-radius: 8px;">
        <strong>Message:</strong>
        <p style="white-space: pre-line; margin-top: 8px;">{{ $userMessage }}</p>
    </div>
    <p style="margin-top: 30px; font-size: 12px; color: #888;">This email was sent from the Matri Seva Samiti website contact form.</p>
</body>
</html>
