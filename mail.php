<?php
include'conn.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home/questio2/PHPMailerTest/PHPMailer/src/Exception.php';
require '/home/questio2/PHPMailerTest/PHPMailer/src/PHPMailer.php';
require '/home/questio2/PHPMailerTest/PHPMailer/src/SMTP.php';

// Instantiation and passing [ICODE]true[/ICODE] enables exceptions
$mail = new PHPMailer(true);
$resetLink = "resetpassword.php?token=" . $resetToken;
try {
 //Server settings
 $mail->SMTPDebug = 2; // Enable verbose debug output
 $mail->isSMTP(); // Set mailer to use SMTP
 $mail->Host = $mailHost; // Specify main and backup SMTP servers
 $mail->SMTPAuth = true; // Enable SMTP authentication
 $mail->Username = $mailUsername; // SMTP username
 $mail->Password = $mailPassword; // SMTP password
 $mail->SMTPSecure = $mailSMTPSecure; // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
 $mail->Port = $mailPort; // TCP port to connect to

//Recipients
 $mail->setFrom('furqan@namaz.questiondrive.com', 'Mailer');
 $mail->addAddress('furqanmax27@gmail.com', 'furqan'); // Add a recipient
 //$mail->addAddress('sadcompiler@gmail.com'); // Name is optional
 $mail->addReplyTo('furqan@namaz.questiondrive.com', 'Information');
//  $mail->addCC('cc@example.com');
//  $mail->addBCC('bcc@example.com');

// Attachments
//  $mail->addAttachment('/home/cpanelusername/attachment.txt'); // Add attachments
//  $mail->addAttachment('/home/cpanelusername/image.jpg', 'new.jpg'); // Optional name

// Content
 $mail->isHTML(true); // Set email format to HTML
 $mail->Subject = 'Here is the subject';
 $mail->Body = 'This is the HTML message body <b>in bold!</b>' . $resetLink;
 $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();
 echo 'Message has been sent';

} catch (Exception $e) {
 echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

// Function to generate a random reset token
function generateResetToken()
{
    $length = 32; // Length of the token
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $token = '';
    for ($i = 0; $i < $length; $i++) {
        $token .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $token;
}

?>