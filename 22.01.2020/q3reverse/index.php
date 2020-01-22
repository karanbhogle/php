<?php

$number = 153;
$originalNumber = $number;
$currentdigit = 0;
$newNumber = 0;

while($number > 0){
    $currentdigit = $number % 10;
    $newNumber += $currentdigit * 10;
    $number = $number / 10;
}

echo $newNumber;

?>