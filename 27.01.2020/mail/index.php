<?php
require 'PHPMailer/PHPMailerAutoload.php';

if(isset($_POST['btnSubmit'])){
    $to = $_POST['textTo'];
    $subject = $_POST['textSubject'];
    $attachment = $_FILES['fileAttachment'];
    $body = $_POST['textareaBody'];
    $file_tmp  = $_FILES['fileAttachment']['tmp_name'];
    $file_name = $_FILES['fileAttachment']['name'];

    if(!empty($to)){
        $mail = new PHPMailer;

        $mail->IsSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                 // Specify main and backup server
        $mail->Port = 587;                                    // Set the SMTP port
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'karanbhoglenow@gmail.com';                // SMTP username
        $mail->Password = 'ke54628epReal8171ms';                  // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

        $mail->From = 'karanbhoglenow@gmail.com';
        $mail->FromName = 'Admin Chhu Admin';
        $mail->AddAddress($to);  // Add a recipient
        // $mail->AddAddress('ellen@example.com');               // Name is optional

        $mail->IsHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        move_uploaded_file($file_tmp,"uploads/".$file_name);
        $mail->addAttachment("uploads/".$file_name);
        
        if(!$mail->Send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            exit;
        }
        else{
            echo 'Message has been sent';
        }
    }
    else{
        echo 'Please add a recepient';
    }
}

?>




<head>
    <style>
        .col-25{
            float:left;
            width:25%;
        }
        .col-75{
            float:left;
            width:75%;
        }
    </style>
</head>
<form action="index.php" method="POST" enctype="multipart/form-data">
<div>
    <div>
        <div class="col-25"><label>To:</label></div>
        <div class="col-75"><input type="text" name="textTo"></div>
    </div>
    <div>
        <div class="col-25"><label>Add Attachment:</label></div>
        <div class="col-75"><input type="file" name="fileAttachment"></div>
    </div>

    <div>
        <div class="col-25"><label>Subject:</label></div>
        <div class="col-75"><input type="text" name="textSubject"></div>
    </div>

    <div>
        <div class="col-25"><label>Body:</label></div>
        <div class="col-75"><textarea rows="10" cols="60" name="textareaBody"></textarea></div>
    </div>
    
    <div>
        <div><input type="submit" value="Send Mail" name="btnSubmit"></div>
    </div>
</div>    
</form>