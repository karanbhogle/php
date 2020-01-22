<?php

function displayPattern2($rows){
    for($i = $rows; $i > 0; $i--){
        for($j = 1; $j <= $i; $j++){
            echo $j.' ';
        }
        echo '<br>';
    }
}

displayPattern2(8);
?>