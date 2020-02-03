<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login: Blog Application</title>
    <style>
        .error{
            color:red;
        }
        .col-25{
            float: left;
            width: 25%;
            margin-top: 6px;
        }
        .col-75{
            float: left;
            width: 75%;
            margin-top: 6px;
        }
    </style>
</head>
<?php
session_start();
if(isset($_SESSION['currentUser'])){
    header("location:/cybercom/extra/blogapplication/homepage/");
}

if(isset($_POST['buttonLogin'])){
    require_once 'database/DB.php';

    $email = $_POST['txtLoginEmail'];
    $password = $_POST['txtLoginPassword'];

    $loginObj = new DB();
    
    $loginStatus = $loginObj->checkUserLoginDetails($email, md5($password));
    echo $loginStatus;
    if($loginStatus){
        date_default_timezone_set('Asia/Kolkata');
        $currentTime = date( 'd-m-Y h:i:s A', time());

        $_SESSION['currentUser'] = $loginStatus;
        $_SESSION['currentUserLastLoggedIn'] = $currentTime;

        $lastLoginObj = new DB();
        $lastLoginObj->updateLastLogin();

        header("location:/cybercom/extra/blogapplication/homepage/");
    }
    else{
        echo "Invalid Login Details provided.";
    }
}

if(isset($_POST['buttonRegister'])){
    header("location:register/");
}
?>

<form action="index.php" method="POST">
<div id="divLogin">
    
    <h1>Login</h1>
    <div class="col-25">
        <label>Email</label>
    </div>
    <div class="col-75">
        <input type="text" name="txtLoginEmail">
    </div>


    <div class="col-25">
        <label>Password</label>
    </div>
    <div class="col-75">
        <input type="password" name="txtLoginPassword">
    </div>

    <div>
        <input type="submit" name="buttonLogin" value="Login">
        <input type="submit" name="buttonRegister" value="Register">
    </div>
</div>            
</form>