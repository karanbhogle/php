<?php

function displayPattern3($rows){
    for($i = 0; $i < $rows; $i++){
        for($j = 0; $j < $i; $j++){
            echo '* ';
        }
        echo '<br>';
    }
}

displayPattern3(9);
?>