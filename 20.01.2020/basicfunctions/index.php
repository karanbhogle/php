
$name="Karan";<br>
function functionWithoutParameters(){<br>
	echo 'This is a function that has <b>NO PARAMETERS</b>';<br>
}<br><br>

function functionWithParameters($num1, $num2){<br>
	echo $name;<br>
	echo 'This is a function that received <b>TWO VALUES FROM PARAMETERS.</b>'.$num1.' and '.$num2;<br>
}<br><br>

function functionWithReturnValue(){<br>
	global $name;<br>
	echo $name;<br>
	return $_SERVER['REMOTE_ADDR'];<br>
}<br><br>

function functionWithParametersAndReturnValue($num1, $num2){<br>
	return $num1+$num2;<br>
}<br><br>


$num1 = 10;<br>
$num2 = 20;<br>

echo 'BASIC FUNCTIONS';<br><br>
//functions calling<br>
functionWithoutParameters();<br>
functionWithParameters($num1, $num2);<br>
echo 'Your ip address is '.functionWithReturnValue();<br>
echo 'The sum of two numbers '.$num1.' and '.$num2.' is '.functionWithParametersAndReturnValue($num1, $num2);<br>
functionDefinitionIsBelow();<br><br>

function functionDefinitionIsBelow(){<br>
	echo 'This function is defined after calling has been written';<br>
}


function functionWithReference(&$var1, &$var2){
	$var1 = "a";
	$var2 = "b";
}

$variable1 = "";
$variable2 = "";
functionWithReference($variable1, $variable2);
echo $variable1." ".$variable2;

?>



<?php

$name="Karan";
echo '<hr>Output for the above code<br>';
function functionWithoutParameters(){
	echo 'This is a function that has <b>NO PARAMETERS</b>';
}

function functionWithParameters($num1, $num2){
	echo $name;
	echo '<br>This is a function that received <b>TWO VALUES FROM PARAMETERS.</b>'.$num1.' and '.$num2;
}

function functionWithReturnValue(){
	global $name;
	echo $name;
	return $_SERVER['REMOTE_ADDR'];
}

function functionWithParametersAndReturnValue($num1, $num2){
	return $num1+$num2;
}


$num1 = 10;
$num2 = 20;

echo '<h2>BASIC FUNCTIONS</h2>';
//functions calling
functionWithoutParameters();
functionWithParameters($num1, $num2);
echo '<br>Your ip address is '.functionWithReturnValue();
echo '<br>The sum of two numbers '.$num1.' and '.$num2.' is '.functionWithParametersAndReturnValue($num1, $num2);
functionDefinitionIsBelow();

function functionDefinitionIsBelow(){
	echo '<br>This function is defined after calling has been written';
}



function functionWithReference(&$var1, &$var2){
	$var1 = "a";
	$var2 = "b";
}

$variable1 = "";
$variable2 = "";
functionWithReference($variable1, $variable2);
echo "<br>";
echo $variable1." ".$variable2;

?>