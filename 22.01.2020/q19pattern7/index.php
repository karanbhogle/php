<?php

function displayPattern7($rows){
    $counter = 0;
    for($i = 1; $i <= $rows+1; $i++){
        for($j = 1; $j <= $counter; $j++){
            echo '*';
            
        }
        
        for($m = 1; $m <= $i-1; $m++){
            echo '0';
        }
        $counter+=$i;
        echo '<br>';
    }

}
displayPattern7(5);

?>