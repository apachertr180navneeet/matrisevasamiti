<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Volunteer Registration</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <h2 style="color: #f47a20; border-bottom: 2px solid #f47a20; padding-bottom: 10px;">New Volunteer Registration</h2>
    <p>A new volunteer has registered on the Matri Seva Samiti portal:</p>
    <table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
        <tr>
            <td style="padding: 8px; font-weight: bold; width: 140px; border-bottom: 1px solid #eee;">Name:</td>
            <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $name }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Phone:</td>
            <td style="padding: 8px; border-bottom: 1px solid #eee;"><a href="tel:{{ $phone }}">{{ $phone }}</a></td>
        </tr>
        <tr>
            <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Email:</td>
            <td style="padding: 8px; border-bottom: 1px solid #eee;"><a href="mailto:{{ $email }}">{{ $email }}</a></td>
        </tr>
        <tr>
            <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Address:</td>
            <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $address }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #eee;">Registration Date:</td>
            <td style="padding: 8px; border-bottom: 1px solid #eee;">{{ $date }}</td>
        </tr>
    </table>
    @if(!empty($userMessage))
    <div style="margin-top: 20px; padding: 15px; background: #f9f9f9; border-radius: 8px;">
        <strong>Motivation / Message:</strong>
        <p style="white-space: pre-line; margin-top: 8px;">{{ $userMessage }}</p>
    </div>
    @endif
</body>
</html>
