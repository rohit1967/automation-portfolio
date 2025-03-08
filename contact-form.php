<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'vendor/autoload.php';  // This line loads PHPMailer's classes

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Email to send the contact form details to
    $to = "rohitshindhe1967@gmail.com"; // Your email address
    $subject = "New Message from Contact Form";
    $body = "Name: $name\nEmail: $email\nMessage: $message";

    $mail = new PHPMailer(true);  // Create a new PHPMailer instance
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Set the SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'rohitshindhe1967@gmail.com';  // Your Gmail address
        $mail->Password = 'Parashuram@1967';  // Your Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;  // SMTP port for Gmail

        $mail->setFrom($email, $name);  // Sender's email
        $mail->addAddress($to);  // Recipient's email

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        if ($mail->send()) {
            echo "Message sent successfully!";
        } else {
            echo "There was an issue sending your message.";
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Please submit the form.";
}
?>
