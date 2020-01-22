<?php

$number = 153;
$originalNumber = $number;
$currentdigit = 0;
$newNumber = 0;

while($number > 0){
    $currentdigit = $number % 10;
    $newNumber += ($currentdigit * $currentdigit * $currentdigit);
    $number = $number / 10;
}

if($newNumber === $originalNumber){
    echo $originalNumber.' is an Armstrong Number';
}
else{
    echo $originalNumber.' is not an Armstrong Number';
}

?>