$string = "This is a string";<br>
//$string = 1234.5678;<br>
//$string = null;<br>
//$string = false;<br>
//$string = true;<br><br>


if(preg_match('/tri/', $string))<br>
{<br>
	echo "Match Found";<br>
}<br>
else<br>
{<br>
	echo "No Match Found";<br>
}

<hr>Output of the above code is as below<br>

<?php
$string = "This is a string";
//$string = 1234.5678;
//$string = null;
//$string = false;
//$string = true;


if(preg_match('/tri/', $string))
{
	echo "Match Found";
}
else
{
	echo "No Match Found";
}
?>