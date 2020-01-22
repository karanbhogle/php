<?php

function displayFloydTriangle(){
    $counter = 1;
    for($i = 1; $i <= 5; $i++){
        for($j = 1; $j <= $i; $j++ ){
            echo $counter.' ';
            $counter++;
        }
        echo '<br>';
    }
}
displayFloydTriangle();
?>