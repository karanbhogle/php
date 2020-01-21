
function stringReplace($string, $toReplaceWith, $offset){<br>
    $string_new = substr_replace($string, $toReplaceWith, $offset);<br>
    echo $string_new;<br>
}<br><br>

$string = 'This part won't get searched. This part search for different';<br>
$toReplaceWith = "karan";<br>
$offset = 29;<br>
stringReplace($string, $toReplaceWith, $offset);<br><br>

$string = 12345.3434;<br>
$toReplaceWith = 90;<br>
$offset = 5;<br>
stringReplace($string, $toReplaceWith, $offset);<br><br>

$string = false;<br>
$toReplaceWith = true;<br>
$offset = 0;<br>
stringReplace($string, $toReplaceWith, $offset);<br><br>

$string = null;<br>
$toReplaceWith = 12;<br>
$offset = 1;<br>
stringReplace($string, $toReplaceWith, $offset);<br><br>

<hr>Output to the above code is as below:<br><br>

<?php

function stringReplace($string, $toReplaceWith, $offset){
    $string_new = substr_replace($string, $toReplaceWith, $offset);
    echo $string_new;
    echo '<br>';
}

$string = 'This part won\'t get searched. This part search for different';
$toReplaceWith = "karan";
$offset = 29;
stringReplace($string, $toReplaceWith, $offset);

$string = 12345.3434;
$toReplaceWith = 90;
$offset = 5;
stringReplace($string, $toReplaceWith, $offset);

$string = false;
$toReplaceWith = true;
$offset = 0;
stringReplace($string, $toReplaceWith, $offset);

$string = null;
$toReplaceWith = 12;
$offset = 1;
stringReplace($string, $toReplaceWith, $offset);


?>