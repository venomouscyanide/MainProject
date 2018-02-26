<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PHPMailer - SMTP test</title>
</head>
<body>
<?php
session_start();


//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require '../PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtp.gmail.com";

//enable this if you are using gmail smtp, for mandrill app it is not required
$mail->SMTPSecure = 'tls';                            

//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "blockchainvotinginc@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "starpark";
//Set who the message is to be sent from
$mail->setFrom('bvc_admin@bvc.com', 'BOT@BVCinc.com');

//Set who the message is to be sent to
$mail->addAddress($_SESSION['email'], 'User');
//Set the subject line

$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Your profile information has been changed';
$mail->Body    = 'Dear user, your profile has been updated. Please login to view the changes.<br><br><br><br>Regards,<br>admin@BVCinc.com';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Success".$random_number;	
	}
?>
</body>
</html>
