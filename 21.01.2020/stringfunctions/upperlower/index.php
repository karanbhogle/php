function strCaseChange($string){<br>
    $stringLower = strtolower($string);<br>
    $stringUpper = strtoupper($string);<br><br>
    
    echo "Lowercase: ".$stringLower;<br>
    echo "Uppercase: ".$stringUpper;<br>
}<br><br>

$string = "tHiS iS a SeRiOuS cAsE";<br>
strCaseChange($string);<br><br>

$string = 12345;<br>
strCaseChange($string);<br><br>

$string = false;<br>
strCaseChange($string);<br><br>

$string = true;<br>
strCaseChange($string);<br><br>

$string = null;<br>
strCaseChange($string);

<hr>Output to the above code is :



<?php

function strCaseChange($string){
    $stringLower = strtolower($string);
    $stringUpper = strtoupper($string);
    
    echo '<br>';
    echo "Lowercase: ".$stringLower."<br>";
    echo "Uppercase: ".$stringUpper;
    echo '<br>';
}

$string = "tHiS iS a SeRiOuS cAsE";
strCaseChange($string);

$string = 12345;
strCaseChange($string);

$string = false;
strCaseChange($string);

$string = true;
strCaseChange($string);

$string = null;
strCaseChange($string);

?>