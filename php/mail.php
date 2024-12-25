<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Get form data and sanitize
$name = htmlspecialchars(trim($_POST['name']));
$email = htmlspecialchars(trim($_POST['email']));
$subject = htmlspecialchars(trim($_POST['subject']));
$message = htmlspecialchars(trim($_POST['message']));

// Gmail SMTP Configuration - Replace with your details
$smtp_host = "smtp.gmail.com";
$smtp_port = 587;
$smtp_username = "Pawandubaikc1@gmail.com"; // Replace with your Gmail
$smtp_password = "Temp123$"; // Replace with your Gmail App Password
$recipient_email = "yathishreddy.kummeta41@gmail.com"; // Replace with where you want to receive emails

// Required for Gmail
ini_set("SMTP", $smtp_host);
ini_set("smtp_port", $smtp_port);
ini_set("sendmail_from", $smtp_username);

// Email headers
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";

// Email content
$email_content = "
<html>
<head>
    <title>New Contact Form Submission</title>
</head>
<body>
    <h2>New Contact Form Submission</h2>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Product/Commodity:</strong> $subject</p>
    <p><strong>Message:</strong></p>
    <p>$message</p>
</body>
</html>
";

// Attempt to send email
$success = mail($recipient_email, "New Contact Form Submission: $subject", $email_content, $headers);

// Return JSON response
header('Content-Type: application/json');
if($success) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to send email']);
}
}
?>
