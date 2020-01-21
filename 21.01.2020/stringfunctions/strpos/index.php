$string = 'This is a string and it is an example';<br><br>

function stringPosition($string, $find){<br>
    $offset = 0;<br>
    $find_length = strlen($find);<br><br>

    echo '<b>"'.$find.'" in '.$string.'</b>';<br>
    while($string_position = strpos($string, $find, $offset)){<br>
        echo 'Found at index: '.$string_position;<br>
        $offset = $string_position+$find_length;<br>
    }<br>+
}<br><br>

$string = 'This is a string and it is an example';<br>
$find = 'is';<br>
stringPosition($string, $find);<br><br>

$string = 12345;<br>
$find = 4;<br>
stringPosition($string, $find);<br><br>

$string = false;<br>
$find = true;<br>
stringPosition($string, $find);<br><br>

$string = false;<br>
$find = false;<br>
stringPosition($string, $find);<br><br>

$string = "this has a null in it";<br>
$find = null;<br>
stringPosition($string, $find);<br><br>


<hr>The output of the above code is as below:<br>

<?php

$string = 'This is a string and it is an example';

function stringPosition($string, $find){
    $offset = 0;
    $find_length = strlen($find);

    echo '<b>"'.$find.'" in '.$string.'</b><br>';
    while($string_position = strpos($string, $find, $offset)){
        echo 'Found at index: '.$string_position.'<br>';
        $offset = $string_position+$find_length;
    }
    echo '<br>';
}

$string = 'This is a string and it is an example';
$find = 'is';
stringPosition($string, $find);

$string = 12345;
$find = 4;
stringPosition($string, $find);

$string = false;
$find = true;
stringPosition($string, $find);

$string = false;
$find = false;
stringPosition($string, $find);

$string = "this has a null in it";
$find = null;
stringPosition($string, $find);

?>