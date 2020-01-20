<?php
echo '<h2>Counting 1 to 10 Using While Loop</h2>';
$counter = 1;
while($counter <= 10)
{
	echo $counter.' , ';
	$counter++;
}

echo '<br><br><h2>Table of 2 Using do...While Loop</h2><pre>';
$counter = 1;
do
{
	echo '<br>2  x  '.$counter.'  =  '.($counter*2);
	$counter++;
}while($counter <= 10);
echo '</pre>';


echo '<br><br><h2>Pattern Using for For Loop</h2><pre>';
for($i=1; $i<=5; $i++)
{
	for($j=1; $j<=$i; $j++)
	{
		echo '*';
	}
	echo '<br>';
}
echo '</pre>';


echo '<br><br><h2>Weekend or Weekday using Switch Statement</h2><pre>';
$day = 'd';

switch($day)
{
	case 'Saturday': 
	case 'Sunday': echo 'It\'s a Weekend. <b>Hurray!</b>';
					break;
	default: echo 'It\'s a Weekday. <b>Work HAAAARD</b>';
					break;
}

?>