<?php

$to = 'karanbhogle.glsica15@gmail.com';
$subject = "This is Mail Server Test";
$body = "This is the body of the message";
$header = 'From: karanbhoglenow@gmail.com';

if(mail($to, $subject, $body, $header)){
    echo "Email has been sent to";
}
else{
    echo "There was an error sending the mail";
}

?>