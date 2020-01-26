<?php

$filename = "filetorename.txt";
$randomNumber = rand(10000,99999);

if(@rename($filename, $randomNumber.".txt")){
    echo $filename.' has been changed to '.$randomNumber;
}
else{
    echo 'Cannot rename '.$filename;
}


?>