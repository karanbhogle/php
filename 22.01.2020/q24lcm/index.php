<?php

function calculateLCM($number1, $number2){
    $hcf = 0;
    for($i = 1; $i < $number1 && $i < $number2; $i++){
        if($number1 % $i == 0 && $number2 % $i == 0){
            $hcf = $i;
        }
    }
    echo "LCM of ".$number1." & ".$number2." is ".(($number1 * $number2)/$hcf);
}

calculateLCM(6, 15);

?>