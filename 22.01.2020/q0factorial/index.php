<?php

function factorial($number){
    $originalNumber = $number;
    $factorial = 1;
    while($number > 0){
        $factorial = $factorial * $number;
        $number--;
    }
    echo 'The Factorial of '.$originalNumber.' is '.$factorial;
}

factorial(5);

?>