<?php
    $host = $_SERVER['HTTP_HOST'].'/cybercom/php/';
    echo $host;

    $ip_address = $_SERVER['REMOTE_ADDR'];
    echo '<br>'.$ip_address;

    if($ip_address == '::1'){
        echo '<br>You are using localhost, so you are blocked';
        die();
    }
?>

<form action="#" method="POST">
    <input type="submit" name="submit" value="Click Now!">
</form>