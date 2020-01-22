<?php

function getFactors($number){
    $i = 1;
    $factors = [];
    while($i <= $number){
        if($number % $i == 0){
            array_push($factors, $i);
        }
        $i++;
    }
    return $factors;
}

function getCommonFactors($factorsOfNumber1, $factorsOfNumber2){
    return array_intersect($factorsOfNumber1, $factorsOfNumber2);
}

function calculateHCF($number1, $number2){
    $factor = 0;
    $factorsOfNumber1 = getFactors($number1);
    $factorsOfNumber2 = getFactors($number2);

    $commonFactors = getCommonFactors($factorsOfNumber1, $factorsOfNumber2);
    echo '<br>Common Factors are: ';
    print_r($commonFactors);
    echo '<br><br>The Highest Common Factor of '.$number1.' and '.$number2.' is '.max($commonFactors);
}

calculateHCF(15, 35);

?>