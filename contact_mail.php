<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path to autoload.php based on your project

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assign POST data to variables
    $Name = $_POST['name'] ?? '';
    $Email = $_POST['email'] ?? '';
    $Number = $_POST['phone'] ?? '';  
    $Course = $_POST['course'] ?? '';
    $Message = $_POST['message'] ?? '';

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings for Gmail SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ssvasudeva03136@gmail.com'; // Your Gmail email address
        $mail->Password = 'wedarbytmwsrezet'; // Your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('ssvasudeva03136@gmail.com', 'sahasra'); // Your Gmail email and name
        $mail->addAddress('ssvasudeva03136@gmail.com', 'sahasra'); // Recipient's email and name

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Message from Sahasra College';
        $mail->Body = "
            <h1>Contact Message</h1>
            <p><strong>First Name:</strong> $Name</p>
            <p><strong>Email:</strong> $Email</p>
             <p><strong>Phone:</strong> $Number</p>
            <p><strong>Course:</strong><br>$Course</p>  
            <p><strong>Message:</strong><br>$Message</p>
        ";

        $mail->send();
        echo '<script> window.alert("Message has been sent.\n\nPlease click OK."); window.location.href="index.html";</script>';

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // If accessed directly without POST data
    echo 'Access Denied';
}
