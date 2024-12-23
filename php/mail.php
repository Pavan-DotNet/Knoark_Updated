<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate form data
    if (empty($name) || empty($email) || empty($message)) {
        die("Please fill in all required fields.");
    }

    // Prepare email headers
    $to = 'coolpavankishore@gmail.com'; // Change to the recipient's email address
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Prepare email body
    $body = "<strong>Name:</strong> $name<br><strong>Email:</strong> $email<br><strong>Message:</strong><br>$message";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo 'Message has been sent';
    } else {
        echo 'Message could not be sent.';
    }
}
