<?php
// Volunteer Form Processing for Matri Seva Samiti

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $name = strip_tags(trim($_POST['name'] ?? ''));
    $phone = strip_tags(trim($_POST['phone'] ?? ''));
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $address = strip_tags(trim($_POST['address'] ?? ''));
    $message = strip_tags(trim($_POST['message'] ?? ''));
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
    }
    
    // Check required fields
    if (empty($name) || empty($phone) || empty($email) || empty($address)) {
        $error = "All fields except message are required";
    }
    
    if (!isset($error)) {
        // Prepare email
        $to = "matrisevasamiti1910@gmail.com";
        $subject = "New Volunteer Registration - Matri Seva Samiti";
        $email_body = "
        <html>
        <head>
            <title>New Volunteer Registration</title>
        </head>
        <body>
            <h2>New Volunteer Registration</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Address:</strong> $address</p>
            <p><strong>Message:</strong> $message</p>
            <p><strong>Registration Date:</strong> " . date('Y-m-d H:i:s') . "</p>
        </body>
        </html>
        ";
        
        // Headers
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: noreply@matrisevasamiti.ngo" . "\r\n";
        $headers .= "Reply-To: $email" . "\r\n";
        
        // Send email
        if (mail($to, $subject, $email_body, $headers)) {
            // Also send confirmation email to volunteer
            $volunteer_subject = "Thank you for volunteering - Matri Seva Samiti";
            $hindi_text = 'मिलकर करें प्रयास, खुशहाल हो समाज ।';
            $volunteer_body = "
            <html>
            <head>
                <title>Thank you for volunteering</title>
                <meta charset='UTF-8'>
            </head>
            <body>
                <h2>Thank you for your interest in volunteering!</h2>
                <p>Dear $name,</p>
                <p>Thank you for registering as a volunteer with Matri Seva Samiti <small style='color: #666; font-size: 12px;'>$hindi_text</small>. We have received your application and will contact you soon.</p>
                <p><strong>Your Details:</strong></p>
                <p>Name: $name</p>
                <p>Phone: $phone</p>
                <p>Email: $email</p>
                <p>Address: $address</p>
                <br>
                <p>We appreciate your willingness to contribute to our mission of empowering rural communities.</p>
                <p>Best regards,<br>Matri Seva Samiti <small style='color: #666; font-size: 12px;'>$hindi_text</small> Team</p>
                <p><strong>Contact Us:</strong><br>
                Phone: (+91) 9415451910 / (+91) 9838291910<br>
                Email: matrisevasamiti1910@gmail.com</p>
                <p><strong>Visit Our Offices:</strong><br>
                <em>Main Office:</em> 01 NAIKA CHHATNAG ROAD NEAR RAM SHIV COLONY JHUNSI PRAYAGRAJ UTTAR PRADESH 211019<br>
                <em>Branch Office:</em> USTAPUR PATHSHALA ROAD BHAJNANAND ASHRAM NEAR, PANI TANKI JHUNSI PRAYAGRAJ UTTAR PRADESH 211019</p>
            </body>
            </html>
            ";
            
            $volunteer_headers = "MIME-Version: 1.0" . "\r\n";
            $volunteer_headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $volunteer_headers .= "From: matrisevasamiti1910@gmail.com" . "\r\n";
            
            mail($email, $volunteer_subject, $volunteer_body, $volunteer_headers);
            
            $success = "Thank you! Your volunteer registration has been submitted successfully. We will contact you soon.";
        } else {
            $error = "Sorry, there was an error sending your message. Please try again later.";
        }
        
        // Save to database (optional - you can implement this if needed)
        // saveVolunteerData($name, $phone, $email, $address, $message);
    }
}

// Function to save volunteer data to database (implement if needed)
function saveVolunteerData($name, $phone, $email, $address, $message) {
    // Database connection and insert logic here
    // This is a placeholder for database functionality
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Registration - Matri Seva Samiti</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .message-container {
            max-width: 600px;
            margin: 150px auto;
            padding: 40px;
            text-align: center;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        }
        .success {
            color: #4CAF50;
            border: 2px solid #4CAF50;
        }
        .error {
            color: #f44336;
            border: 2px solid #f44336;
        }
        .message-icon {
            font-size: 64px;
            margin-bottom: 20px;
        }
        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 30px;
            background: #f47a20;
            color: #fff;
            text-decoration: none;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        .back-btn:hover {
            background: #d46a10;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="message-container <?php echo isset($success) ? 'success' : (isset($error) ? 'error' : ''); ?>">
        <?php if (isset($success)): ?>
            <div class="message-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h2>Registration Successful!</h2>
            <p><?php echo $success; ?></p>
        <?php elseif (isset($error)): ?>
            <div class="message-icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <h2>Registration Failed</h2>
            <p><?php echo $error; ?></p>
        <?php else: ?>
            <div class="message-icon">
                <i class="fas fa-info-circle"></i>
            </div>
            <h2>No Data Received</h2>
            <p>Please fill out the volunteer form to register.</p>
        <?php endif; ?>
        
        <a href="index.php" class="back-btn">
            <i class="fas fa-arrow-left"></i> Back to Home
        </a>
    </div>
</body>
</html> 