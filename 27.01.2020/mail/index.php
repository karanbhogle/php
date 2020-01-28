<?php
require_once("PHPMailer/PHPMailerAutoload.php");
$mailer = new PHPMailer();
$mailer->IsSMTP();
$mailer->Host = 'ssl://smtp.gmail.com';
$mailer->Port = 587; //can be 587
$mailer->SMTPAuth = TRUE;
// Change this to your gmail address
$mailer->Username = 'karanbhoglenow@gmail.com';  
// Change this to your gmail password
$mailer->Password = 'ke54628epReal8171ms';  
// Change this to your gmail address
$mailer->From = 'kevinshah0697@gmail.com';  
// This will reflect as from name in the email to be sent
$mailer->FromName = 'Admin Chu Admin'; 
$mailer->Body = 'This is the body of your email.';
$mailer->Subject = 'This is your subject.';
// This is where you want your email to be sent
$mailer->AddAddress('kevinshah0697@gmail.com');  
if(!$mailer->Send())
{
    echo "Message was not sent<br/ >";
    echo "Mailer Error: " . $mailer->ErrorInfo;
}
else
{
    echo "Message has been sent";
}
?>