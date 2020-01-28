<?php

if(isset($_POST['btnSubmit'])){
    if(!empty($_POST['txtPassword']) && !empty($_POST['txtConfirmPassword'])){
        $password = md5($_POST['txtPassword']);
        $confirmPassword = md5($_POST['txtConfirmPassword']);

        echo "<br><b>Password: </b>".$password.' & <b>Confirm Password: </b>'.$confirmPassword;

        if($password == $confirmPassword){
            echo "<br>Password and Confirm Passwords are same<br><br>";
        }
        else{
            echo "<br>Password and Confirm Passwords are different<br><br>";
        }
    }
}

?>

<form action="index.php" method="POST">

<label>ENTER PASSWORD</label>
<input type="password" name="txtPassword"><br>

<label>CONFIRM PASSWORD</label>
<input type="password" name="txtConfirmPassword"><br>

<input type="submit" name="btnSubmit" value="Submit Now"><br><br>

</form>