<?php
//Import PHPMailer classes into the global namespace
require __DIR__.'/mailer/Exception.php';
require __DIR__.'/mailer/PHPMailer.php';
require __DIR__.'/mailer/SMTP.php';
require __DIR__.'/mailowner.php';

// $name=$_POST['name'];
// $email=$_POST['email'];
// $company=$_POST['company'];
// $contact=$_POST['contact'];
// $message=$_POST['message'];

$from = $_REQUEST['email'];
$name = $_REQUEST['name'];
$subject = $_REQUEST['subject'];
$message = $_REQUEST['message'];

$mail = new PHPMailer\PHPMailer\PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
$mail->SMTPAuth = true;
$mail->Username = $Email;
$mail->Password = $Password;
$mail->setFrom($from, $name);
$mail->addReplyTo($from, $name);
$mail->addAddress($OwnerEmail, 'Admin');
$mail->Subject = 'Mavericks Website || You have a mail from ' . $name;
$mail->isHTML(true);
$mail->Body    = 
'
<b>Name: </b><u>'. $name . '</u><br>
<b>Email: </b><u>' .$from . '</u><br>
<b>Subject : </b><u>' .$subject . '</u><br>
<br><h3>Message :</h3>
<p>' . $message . '</p>
';
if (!$mail->send()) {
    echo 'Mailer Error: '. $mail->ErrorInfo;
} else {
    echo 'sent';
}

?>