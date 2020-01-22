<?php

$num1 = 0; 
$num2 = 1; 
$temp = 0;

echo 'Fibonacci Series: '.$num1.', '.$num2.', ';

while($temp < 34){
    $temp = $num1 + $num2;
    echo $temp.', ';
    $num1 = $num2;
    $num2 = $temp;
}

?>