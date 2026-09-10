<?php
session_start();

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: contact.php");
    exit();
}

// Get form data and sanitize
$name = strip_tags(trim($_POST['name'] ?? ''));
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$phone = strip_tags(trim($_POST['phone'] ?? ''));
$subject = strip_tags(trim($_POST['subject'] ?? ''));
$message = strip_tags(trim($_POST['message'] ?? ''));

// Validate required fields
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    $_SESSION['contact_error'] = "Please fill in all required fields.";
    header("Location: contact.php");
    exit();
}

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['contact_error'] = "Please enter a valid email address.";
    header("Location: contact.php");
    exit();
}

// Prepare email
$to = "matrisevasamiti1910@gmail.com";
$email_subject = "Contact Form: " . $subject;
$email_body = "You have received a new message from the contact form.\n\n";
$email_body .= "Name: $name\n";
$email_body .= "Email: $email\n";
$email_body .= "Phone: $phone\n";
$email_body .= "Subject: $subject\n\n";
$email_body .= "Message:\n$message\n";

$headers = "From: $email\n";
$headers .= "Reply-To: $email";

// Send email
if (mail($to, $email_subject, $email_body, $headers)) {
    $_SESSION['contact_success'] = "Thank you for your message! We'll get back to you soon.";
} else {
    $_SESSION['contact_error'] = "Sorry, there was an error sending your message. Please try again later.";
}

// Redirect back to contact page
header("Location: contact.php");
exit();
?> 