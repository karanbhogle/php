<?php

function displayChess($dimensions){
    echo '<table border=1 style="border-collapse: collapse;">';
    $colorAlter = 0;

    for($i = 0; $i < $dimensions; $i++){
        echo '<tr>';
        for($j = 0; $j < $dimensions; $j++){
            if($colorAlter == 1){
                echo '<td style="background-color:black; height:50px; width:50px;"></td>';
                $colorAlter = 0;
            }
            else{
                echo '<td style="background-color:white; height:50px; width:50px;"> </td>';
                $colorAlter = 1;
            }
        }
        echo '<tr>';
        if($colorAlter == 1){
            $colorAlter = 0;
        }
        else{
            $colorAlter = 1;
        }
    }
    echo '</table>';
}

displayChess(8);

?>