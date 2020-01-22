<?php

function displayPattern3($rows){
    for($i = 1; $i <= $rows; $i++){
        for($j = 1; $j <= $i; $j++){
            echo $j.' ';
        }
        echo '<br>';
    }
}

displayPattern3(8);
?>