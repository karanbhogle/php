<?php

function biggestNumberInArray($arrayOfNumbers){
    $biggestNumber = $arrayOfNumbers[0];
    for($i = 0; $i < (sizeof($arrayOfNumbers)-1) ; $i++){
        if($arrayOfNumbers[$i] > $biggestNumber){
            $biggestNumber = $arrayOfNumbers[$i];
        }
    }
    return 'The biggest Number in the array is '.$biggestNumber;
}

$arrayOfNumbers = [2323, 3464, 1424, 1265, 2346, 1423];
echo biggestNumberInArray($arrayOfNumbers);

?>