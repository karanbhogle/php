<?php

if(isset($_POST['btnLogin'])){
    $username = $_POST['txtUsername'];
    if(!empty($_POST['txtUsername']) && !empty($_POST['txtPassword'])){
        session_start();
        $_SESSION['currentUser'] = $_POST['txtUsername'];
        header("location:anotherpage.php");
    }
    else{
        echo "All fields are necessary";
    }
}

?>

<form action="#" method="POST">
    <label>Enter Username:</label><br>
    <input type="text" name="txtUsername" value="<?php if(isset($_POST['btnLogin'])){echo $username;}?>"><br><br>

    <label>Enter Password:</label><br>
    <input type="password" name="txtPassword"><br>
    <input type="submit" value="LoginNow" name="btnLogin">
</form>