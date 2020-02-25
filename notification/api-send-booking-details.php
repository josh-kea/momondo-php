<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
$sPassword = file_get_contents('private/password.txt');
$sApiKey = file_get_contents('private/api-key-sms.txt');
$mail = new PHPMailer(false);
//Starting session to continue
session_start();
$sFirstName = $_SESSION['sCustomerName'];
$sLastName = $_SESSION['sCustomerLastName'];
$sEmail = $_SESSION['sCustomerEmail'];
$sNumber = $_SESSION['sCustomerPhone'];
$sBookingCode = $_SESSION['sBookingCode'];

echo $sEmail;

file_get_contents("https://fatsms.com/apis/api-send-sms?to-phone=$sNumber&message=hello-hiddenapi&from-phone=71659243&api-key=$sApiKey");

try {
    //Server settings
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.zoho.eu';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'joshua@ptd-cph.com';                     // SMTP username
    $mail->Password   = $sPassword;                               // SMTP password
    $mail->SMTPSecure = 'ssl';//PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 465;                                   // TCP port to connect to

    //Recipients
    $mail->setFrom('joshua@ptd-cph.com', 'Momondo Bookings');
    $mail->addAddress($sEmail);     // Add a recipient
    $mail->addReplyTo('joshua@ptd-cph.com', 'Information');
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Your Booking Details';
    $mail->Body    = "<div>Hi $sFirstName $sLastName <br><br>Thank you for booking a flight with us. <br><br>Here is your booking code: $sBookingCode. To view your ticket information, please login with your last name and booking code at: <a href='http://localhost/2/momondo-v3/booking.php'>http://localhost/2/momondo-v3/booking.php</a> <div>";
    $mail->send();
    echo 'Message has been sent';
    header('Location: ../flightreservation.php');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}