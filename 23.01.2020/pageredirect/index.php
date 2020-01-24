<h1>This is an attempt to access a redirected page.</h1>
<?php
ob_start();
$redirect_page = "http://google.co.in";
$redirect = false;


if($redirect){
    header('Location: '.$redirect_page);
}
else{
    echo "Failed redirecting to ".$redirect_page;
}

?>