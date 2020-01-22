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
    echo 'The factors of '.$number.' are ';
    foreach($factors as $factor){
        echo $factor.', ';
    }
    echo '<br>';
}

getFactors(10);
getFactors(14);
getFactors(17);
getFactors(18);
getFactors(20);

?>