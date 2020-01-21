function calculateStringLength($testString){<br>
    $stringLength = strlen($testString);<br>
    echo "Length of ".$testString." is ".$stringLength;<br>
}<br><br>
calculateStringLength("Karan");<br>
calculateStringLength(array("2", "3", "4","5"));<br>
calculateStringLength(1234);<br>
calculateStringLength(false);<br>
calculateStringLength(null);<br>
calculateStringLength(true);<br>
calculateStringLength(0);<br>
calculateStringLength();<br>
<hr>Output of the above code is as follows:

<?php

function calculateStringLength($testString){
    $stringLength = strlen($testString);
    echo "Length of ".$testString." is ".$stringLength;
    echo '<br>';
}
calculateStringLength("Karan");
calculateStringLength(array("2", "3", "4","5"));
calculateStringLength(1234);
calculateStringLength(false);
calculateStringLength(null);
calculateStringLength(true);
calculateStringLength(0);
calculateStringLength();

?>