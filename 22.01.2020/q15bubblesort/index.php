<?php

function bubbleSort($array){
    
    for($i = 0; $i < sizeof($array); $i++){
        for($j = $i; $j < sizeof($array)-1; $j++){
            if($array[$i] > $array[$j]){
                $temp = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $temp;
            }
        }
    }

    echo "The Sorted array is ";
    for($i = 0; $i < sizeof($array); $i++){
        echo $array[$i].', ';
    }
}

$array = [5, 1, 8, 4, 2, 8];
bubbleSort($array);

?>