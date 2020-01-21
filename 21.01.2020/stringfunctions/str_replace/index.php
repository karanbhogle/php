function stringReplace($find, $replace, $string){<br>
    $new_string = str_replace($find, $replace, $string);<br>
    echo $new_string;<br>
}<br><br>

$string = "This is a string, and is an example";<br>
$find = array('is', 'string', 'example');<br>
$replace = array('IS','STRING','');<br>
stringReplace($find, $replace, $string);<br><br>

$string = 1234567;<br>
$find = array('12', '32', '23','34');<br>
$replace = array('32','23','34','CheckTheCode');<br>
stringReplace($find, $replace, $string);<br><br>

$string = false;<br>
$find = array('a');<br>
$replace = array('f','a','');<br>
stringReplace($find, $replace, $string);<br><br>

$string = null;<br>
$find = array(null);<br>
$replace = array('IS','STRING','');<br>
stringReplace($find, $replace, $string);<br><br>

<hr>The output of the above code is as below<br>


<?php

function stringReplace($find, $replace, $string){
    $new_string = str_replace($find, $replace, $string);
    echo $new_string;
}

$string = "This is a string, and is an example";
$find = array('is', 'string', 'example');
$replace = array('IS','STRING','');
stringReplace($find, $replace, $string);
echo '<br>';

$string = 1234567;
$find = array('12', '32', '23','34');
$replace = array('32','23','34','CheckTheCode');
stringReplace($find, $replace, $string);
echo '<br>';

$string = false;
$find = array('a');
$replace = array('f','a','');
stringReplace($find, $replace, $string);
echo '<br>';

$string = null;
$find = array(null);
$replace = array('IS','STRING','');
stringReplace($find, $replace, $string);
echo '<br>';

?>