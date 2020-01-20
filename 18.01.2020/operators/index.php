<?php


echo '<h2>Triple Equals (===)</h2>';
$value1 = 7;
$value2 = "7";
if($value1 === $value2)
{
	echo $value1.' === '.$value2.' Both Values are same with same types';
}
else
{
	echo $value1.' === '.$value2.' Both Values are same but different types<br>';
}

echo '<h2>Assignment Operators</h2>';
$value1 = 20;
echo '<pre>Value is '.$value1;
echo '<br><b>   +=2    '.$value1+=2;
$value1 = 20;
echo '<br><b>   -=2    '.$value1-=2;
$value1 = 20;
echo '<br><b>   *=2    '.$value1*=2;
$value1 = 20;
echo '<br><b>   /=2   '.$value1/=2;
$value1 = 20;
echo '<br><b>   %=3    '.$value1%=3;
$value1 = 20;
echo '<br><b>   .=    '.$value1.='Concatenated String ' .'</b><br></pre>';


echo '<h2>Comparison Operators</h2>';
$value1 = 20;
$value2 = 10;
echo '<pre>Value1 is <b>'.$value1.'</b> & Value2 is <b>'.$value2.'</b>';
if($value1 == $value2)
{
		echo "<br><b>  $value1 == $value2   TRUE";
}
else
{
		echo "<br><b>   $value1 == $value2   FALSE";
}

if($value1 <= $value2)
{
		echo "<br><b>  $value1 <= $value2   TRUE";
}
else
{
		echo "<br><b>  $value1 <= $value2   FALSE";
}

if($value1 >= $value2)
{
		echo "<br><b>  $value1 >= $value2   TRUE";
}
else
{
		echo "<br><b>  $value2 >= $value2   FALSE";
}

if($value1 != $value2)
{
		echo "<br><b>  $value1 != $value2   TRUE";
}
else
{
		echo "<br><b>  $value1 != $value2    FALSE";
}

if($value1 > $value2)
{
		echo "<br><b>  $value1 > $value2   TRUE";
}
else
{
		echo "<br><b>  $value1 > $value2    FALSE";
}

if($value1 < $value2)
{
		echo "<br><b>  $value1 < $value2   TRUE";
}
else
{
		echo "<br><b>  $value1 < $value2    FALSE";
}
echo '</pre><br>';



echo '<h2>Arithmetic Operators</h2>';
$value1 = 10;
echo '<pre>Value is '.$value1;
echo '<br><b>   +2    '.($value1+2);
$value1 = 10;
echo '<br><b>   -2     '.($value1-2);
$value1 = 10;
echo '<br><b>   *2    '.$value1*2;
$value1 = 10;
echo '<br><b>   /2     '.$value1/2;
$value1 = 10;
echo '<br><b>   %3     '.$value1%3;
$value1 = 10;
echo '<br><b>   ++    ';
$value1++;
echo $value1;
$value1 = 10;
echo '<br><b>   --     ';
$value1--;
echo $value1;
$value1 = 10;
echo '<br><b>   **2   '.$value1**2;
echo '</pre><br>';


echo '<h2>Logical Operators</h2>';
$value1 = 20;
$value2 = 10;
echo '<pre>Value1 is <b>'.$value1.'</b> & Value2 is <b>'.$value2.'</b>';
if($value1 == $value2 AND $value1!=0)
{
		echo "<br><b>  $value1 == $value2 AND $value1!=0     TRUE";
}
else
{
		echo "<br><b>   $value1 == $value2 AND $value1!=0     FALSE";
}

if($value1 == $value2 && $value1!=0)
{
		echo "<br><b>  $value1 == $value2 &&  $value1!=0     TRUE";
}
else
{
		echo "<br><b>   $value1 == $value2 &&  $value1!=0     FALSE";
}

if($value1 == $value2 OR $value1!=0)
{
		echo "<br><b>   $value1 == $value2 OR  $value1!=0     TRUE";
}
else
{
		echo "<br><b>    $value1 == $value2 OR  $value1!=0     FALSE";
}

if($value1 == $value2 || $value1!=0)
{
		echo "<br><b>   $value1 == $value2 ||  $value1!=0     TRUE";
}
else
{
		echo "<br><b>    $value1 == $value2 ||  $value1!=0     FALSE";
}
echo '</pre><br>';
?>