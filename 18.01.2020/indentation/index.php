<?php

//improper indentation
$name = 'Karan';
$age = 22;

echo '<b>IMPROPER INDENTATION</b><br>';
if(strtolower($name)==='karan')
{
if($age>=22)
{
echo 'You\'re over 22'.'<br>';
if(1==1)
{
echo 'Yes, 1 is equal to 1!'.'<br>';
}
}
}
else
{
echo 'You\'re not Karan!'.'<br>';
}


//proper indentations
$name = 'Karan';
$age = 22;

echo '<br><b>PROPER INDENTATION</b><br>';
if(strtolower($name) === 'kevin')
{
	if($age >= 22)
	{
		echo 'You\'re over 22'.'<br>';
		if(1 == 1)
		{
			echo 'Yes, 1 is equal to 1!'.'<br>';
		}
	}
}		
else
{
	echo 'You\'re not Karan!'.'<br>';
}


?>