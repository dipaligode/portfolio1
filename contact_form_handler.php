<?php
require_once 'email_helper.php';

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

$body = "
  <h2>New Message from Portfolio</h2>
  <p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>
  <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
  <p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>
";

if (sendEmail('dipaligode1311@gmail.com', "Contact From Portfolio", $body)) {
    echo "Message sent successfully!";
} else {
    echo "Failed to send email. Please try again.";
}

?>
