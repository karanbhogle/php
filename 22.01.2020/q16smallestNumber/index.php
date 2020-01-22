<?php

function smallestNumberInArray($arrayOfNumbers){
    $smallestNumber = $arrayOfNumbers[0];
    for($i = 0; $i < (sizeof($arrayOfNumbers)-1) ; $i++){
        if($arrayOfNumbers[$i] < $smallestNumber){
            $smallestNumber = $arrayOfNumbers[$i];
        }
    }
    return 'The smallest Number in the array is '.$smallestNumber;
}

$arrayOfNumbers = [2323, 3464, 1424, 1265, 2346, 1423];
echo smallestNumberInArray($arrayOfNumbers);

?>