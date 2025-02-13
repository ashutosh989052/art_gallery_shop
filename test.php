<?php
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true); // Enable exceptions

try {
    echo "✅ PHPMailer initialized!<br>";
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Change this if using another SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'piyushmanoorkarcoc@gmail.com';
    $mail->Password = 'wtfd pimn wklv mzbc';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    echo "✅ SMTP Configured!<br>";

    $mail->setFrom('piyushmanoorkarcoc@gmail.com', 'Your Name');
    $mail->addAddress('ashutoshkalyankar06@example.com');
    $mail->Subject = 'Test Email';
    $mail->Body = 'This is a test email';

    echo "✅ Sending email...<br>";
    $mail->send();
    echo "✅ Email sent successfully!";
} catch (Exception $e) {
    echo "❌ Error: {$mail->ErrorInfo}";
}
?>