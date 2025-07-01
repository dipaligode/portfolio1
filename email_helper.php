<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Load PHPMailer via Composer

function sendEmail($to, $subject, $body) {
    $mail = new PHPMailer(true);

    try {
        // Optional: Enable debugging to see issues
        // $mail->SMTPDebug = 2; // Set to 0 in production
        // $mail->Debugoutput = 'html';

        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'dipaligode1311@gmail.com'; // Gmail
        $mail->Password   = 'zdho trdg vnyk yqyw';       // App password from Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Sender & Recipient
        $mail->setFrom('dipaligode1311@gmail.com', 'Dipali Gode');
        $mail->addAddress($to);

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        // Send the email
        if ($mail->send()) {
            return true;
        } else {
            error_log("Send failed: " . $mail->ErrorInfo);
            return false;
        }
    } catch (Exception $e) {
        // Log the error AND return it for display if needed
        error_log("PHPMailer Error: " . $mail->ErrorInfo);
        return "PHPMailer Error: " . $mail->ErrorInfo;
    }
}
?>
