<?php

if(isset($_POST['btnSubmit'])){
    $fname = $_POST['txtFirstName'];
    $lname = $_POST['txtLastName'];

    echo "Your fullname is ".$fname." ".$lname;
}
?>

<form action="index.php" method="POST">
<label>FirstName:</label>
<input type="text" name="txtFirstName"><br>

<label>LastName:</label>
<input type="text" name="txtLastName"><br>

<input type="submit" name="btnSubmit" value="Submit">
</form>