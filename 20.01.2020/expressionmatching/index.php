$string = "This is a String is long";<br>
$find = "is";<br><br>

if(preg_match("/$find/", $string, $matches)){<br>
	echo 'Match Found. There is "'.$find.'" in the <b>'.$string.'</b>';<br>
	print_r($matches);<br>
}<br>
else{<br>
	echo 'Match Not Found. There is no "'.$find.'" in the <b>'.$string.'</b>';<br>
}


<?php
$string = "This is a String is long";
$find = "is";

echo '<hr> Output for the above code<br>';
if(preg_match("/$find/", $string, $matches)){
	echo 'Match Found. There is "'.$find.'" in the <b>'.$string.'</b>';
	print_r($matches);
}
else{
	echo 'Match Not Found. There is no "'.$find.'" in the <b>'.$string.'</b>';
}
?>