<?php
$day = "Monday";

switch(null)
{
	case "Saturday": 
	case "Sunday": echo 'Today is '.$day.'. Enjoy your weekend !';
				break;
	default: echo 'Today is '.$day.'. It\'s a Weekday';
				break;
}
?>