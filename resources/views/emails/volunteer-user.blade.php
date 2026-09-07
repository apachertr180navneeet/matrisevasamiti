<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thank you for volunteering - Matri Seva Samiti</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <h2 style="color: #f47a20;">Thank You for Your Interest in Volunteering!</h2>
    <p>Dear {{ $name }},</p>
    <p>Thank you for registering as a volunteer with <strong>Matri Seva Samiti</strong> <span style="color: #666; font-size: 13px;">(मिलकर करें प्रयास, खुशहाल हो समाज ।)</span>. We have received your application and our team will get in touch with you soon.</p>
    
    <div style="background: #fdf6f0; border-left: 4px solid #f47a20; padding: 15px; margin: 20px 0; border-radius: 4px;">
        <h4 style="margin: 0 0 10px 0; color: #333;">Your Submitted Details:</h4>
        <p style="margin: 4px 0;"><strong>Name:</strong> {{ $name }}</p>
        <p style="margin: 4px 0;"><strong>Phone:</strong> {{ $phone }}</p>
        <p style="margin: 4px 0;"><strong>Email:</strong> {{ $email }}</p>
        <p style="margin: 4px 0;"><strong>Address:</strong> {{ $address }}</p>
    </div>

    <p>We deeply appreciate your willingness to contribute towards our mission of empowering rural communities through education, skill development, healthcare, and women empowerment.</p>
    
    <p style="margin-top: 25px;">Warm regards,<br>
    <strong>Matri Seva Samiti Team</strong><br>
    Phone: {{ config('site.phone_primary') }} / {{ config('site.phone_secondary') }}<br>
    Email: {{ config('site.email') }}
    </p>

    <hr style="border: none; border-top: 1px solid #eee; margin: 25px 0;">
    <p style="font-size: 12px; color: #777;">
        <strong>Main Office:</strong> {{ config('site.address_primary') }}<br>
        <strong>Branch Office:</strong> {{ config('site.address_secondary') }}
    </p>
</body>
</html>
