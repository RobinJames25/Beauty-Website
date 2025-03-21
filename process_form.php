<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure PHPMailer is installed

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    if (!$email) {
        $_SESSION['message'] = "Invalid email format!";
        $_SESSION['message_type'] = "error";
        header("Location: contact.php");
        exit();
    }

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Use your SMTP provider
        $mail->SMTPAuth = true;
        $mail->Username = 'jamesrobin12432@gmail.com'; // Replace with your Gmail
        $mail->Password = 'tghdrzgjcohyiupk'; // Use **App Password**, NOT your real password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email headers
        $mail->setFrom($email, $name); // The sender
        $mail->addAddress('jamesrobin12432@gmail.com'); // Replace with your email
        $mail->isHTML(true);
        $mail->Subject = "New Contact Form Submission: " . $subject;
        $mail->Body = "
            <h3>Contact Form Message</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Message:</strong> $message</p>
        ";

        if ($mail->send()) {
            $_SESSION['message'] = "Message sent successfully!";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Failed to send message.";
            $_SESSION['message_type'] = "error";
        }
    } catch (Exception $e) {
        $_SESSION['message'] = "Mailer Error: " . $mail->ErrorInfo;
        $_SESSION['message_type'] = "error";
    }

    header("Location: contact.php");
    exit();
} else {
    $_SESSION['message'] = "Invalid request!";
    $_SESSION['message_type'] = "error";
    header("Location: contact.php");
    exit();
}
