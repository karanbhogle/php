<?php

if(isset($_GET['btnSubmit'])){
    $firstName = htmlentities($_GET['firstName']);
    $lastName = $_GET['lastName'];

    echo $firstName." ".$lastName;
}

?>

<form action="#" method="GET">
    <label>Enter FirstName:</label><br>
    <input type="text" name="firstName"><br><br>

    <label>Enter LastName:</label><br>
    <input type="text" name="lastName"><br>

    <input type='submit' name='btnSubmit' value="Submit Now">    
</form>