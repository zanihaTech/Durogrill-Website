<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set your email address
    $to = 'syedluqman2001@gmail.com'; // Your email address

    // Get form fields
    $from_name = $_POST['name'];
    $from_email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Set up headers
    $headers = "From: $from_name <$from_email>" . "\r\n" .
               "Reply-To: $from_email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Build the email body
    $email_body = "Name: $from_name\n";
    $email_body .= "Email: $from_email\n";
    $email_body .= "Subject: $subject\n\n";
    $email_body .= "Message:\n$message\n";

    // Send the email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message. Please try again later.";
    }
} else {
    // If not a POST request, return a 405 Method Not Allowed response
    header("HTTP/1.1 405 Method Not Allowed");
    exit;
}
