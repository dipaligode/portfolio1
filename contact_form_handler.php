<?php
require 'email_helper.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST['message'] ?? '');

    if (!$name || !$email || !$message) {
        echo "Invalid input.";
        exit;
    }

    $subject = "New Contact Message from $name";
    $body = "
        <strong>Name:</strong> $name<br>
        <strong>Email:</strong> $email<br>
        <strong>Message:</strong><br>$message
    ";

    $to = 'your@email.com'; // Your destination email

    if (sendEmail($to, $subject, $body)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }
} else {
    echo "Invalid request.";
}
?>
