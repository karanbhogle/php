<?php

//This is to demonstrate if-else & if-elseif-else
$value = 20;
$value == 0;

if($value)
{
	echo '<b>First IF is true </b><br>';
	if($value < 20)
	{
		echo '$value is less than 20';
	}
	else if($value > 20)
	{
			echo '$value is more than 20';
	}
	else
	{
			echo '$value is exactly 20';
	}
}
else
{
	echo '<b>First IF is false</b> <br>';
}
?>