<?php

function displayTable($number){
    echo '<h3>Table of '.$number.'</h3>';
    for($i = 1; $i <= 10; $i++){
        echo $number.' x '.$i.' = '.($number * $i);
        echo '<br>';
    }
}

displayTable(5);
?>