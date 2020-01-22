<?php

function swapTwoNumbers($num1, $num2){
    echo 'A: '.$num1.'  B: '.$num2.'<br>';

    $temp = $num1;
    $num1 = $num2;
    $num2 = $temp;

    echo 'New A: '.$num1.'  New B: '.$num2.'<br>';
}

swapTwoNumbers(10, 20);

?>