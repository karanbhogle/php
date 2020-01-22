<?php

function isPrime($number){
    $originalNumber = $number;
    $i = 1;
    $count = 0;

    while($i <= $number){
        if($number % $i == 0){
            $count++;
            if($count > 2){
                return $originalNumber." is NOT a Prime Number".'<br>';
                break;
            }
        }
        $i++;
    }
    return $originalNumber." is a Prime Number".'<br>';
}

echo isPrime(7);
echo isPrime(8);
echo isPrime(9);
echo isPrime(11);
?>