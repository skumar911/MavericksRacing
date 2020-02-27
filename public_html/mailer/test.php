<?php
//Import PHPMailer classes into the global namespace
require 'mailer\Exception.php';
require 'mailer\PHPMailer.php';
require 'mailer\SMTP.php';
require 'mailowner.php';

$name="Rahul Grover";
$email="rahulgrover095@gmail.com";
$company="Pentaknot";
$contact="9768310746";
$message="asdasdasdasd";

$mail = new PHPMailer\PHPMailer\PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
$mail->SMTPAuth = true;
$mail->Username = $Email;
$mail->Password = $Password;
$mail->setFrom($email, $name);
$mail->addReplyTo($email, $name);
$mail->addAddress($Email, 'Admin');
$mail->Subject = $name . ' has some Query';
$mail->isHTML(true);
$mail->Body    = 
'
<b>Name: </b><u>'. $name . '</u><br>
<b>Email: </b><u>' .$email . '</u><br>
<b>Contact No. : </b><u>' .$contact . '</u><br>
<b>Company Name : </b><u>' .$company . '</u><br>
<br><h3>Message :</h3>
<p>' . $message . '</p>
';
if (!$mail->send()) {
    echo 'Mailer Error: '. $mail->ErrorInfo;
} else {
    echo 'sent';
}

?>