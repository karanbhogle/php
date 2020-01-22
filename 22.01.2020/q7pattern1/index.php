<?php

function displayPattern1($rows){
    for($i = $rows; $i > 0; $i-=2){
        for($j = 0; $j < $i; $j++){
            echo '* ';
        }
        echo '<br>';
    }
}

displayPattern1(15);

?>