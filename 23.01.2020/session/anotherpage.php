<?php
session_start();

if(!isset($_SESSION['currentUser'])){
    die("Please Login First and then comeback");
}
else{
    echo "Welcome, ".$_SESSION['currentUser'];
}


if(isset($_POST['btnLogout'])){
    session_destroy();
    header("location:index.php");
}
?>

<form action="#" method="POST">
    <input type="submit" value="LOGOUT" name="btnLogout">
</form>