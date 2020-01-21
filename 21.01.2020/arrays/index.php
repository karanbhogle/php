//ARRAY, ASSOCIATIVE ARRAY AND MULTI-DIMENSIONAL ARRAY WITH FOREACH<br>
$array1 = array('sunday','monday');<br>
echo $array1;<br>
echo $array1[1];<br>

$array1[99] = 'tuesday';<br>
$array1['key'] = '44';<br>
print_r($array1);<br><br>



$assocarr = array('pizza' =>1000 , 'pizza' =>2000, 'salad' => 3000);<br>
$assocarr['coffee'] = 100;<br>
$assocarr[null] = 'Chai';<br>
$assocarr['Chai1'] = 0;<br>
$assocarr['Chai2'] = 1;<br><br>

$assocarr[0] = 'Chai1';<br>
$assocarr[1] = 'Chai2';<br><br>

$assocarr[true] = 'samosa';<br>
$assocarr[false] = 'vegetables';<br>
print_r($assocarr);<br><br>


$food = array(<br>
		'Healthy' => array('Salad', 'vegetables', 'pasta', 1234, 1235.5),<br>
		'Unhealthy' => array('Pizza', 'Icecream',false,null,true)<br>
);<br><br>
foreach($food as $element => $inner_array)<br>
{<br>
	echo '<b>'.$element.'</b>';<br>
	foreach ($inner_array as $item) {<br>
		echo $item.", ";<br>
	}<br>
}<br><br>


//EXTRA<br>
function getArray() {<br>
    return array(1, 2, 3);<br>
}<br><br>

// on PHP 5.4<br>
print_r($secondElement = getArray()[1]);
<br><br>

// previously<br>
$tmp = getArray();<br>
print_r($secondElement = $tmp[1]);<br><br>

// or<br>
print_r(list(, $secondElement) = getArray());<br><br>




<hr>
Output of the above code is as below:










<?php

//ARRAY, ASSOCIATIVE ARRAY AND MULTI-DIMENSIONAL ARRAY WITH FOREACH
$array1 = array('sunday','monday');
echo $array1.'<br>';
echo $array1[1].'<br>';

$array1[99] = 'tuesday';
$array1['key'] = '44';
print_r($array1);

echo "<br><br>";



$assocarr = array('pizza' =>1000 , 'pizza' =>2000, 'salad' => 3000);
$assocarr['coffee'] = 100;
$assocarr[null] = 'Chai';

$assocarr['Chai1'] = 0;
$assocarr['Chai2'] = 1;

$assocarr[0] = 'Chai1';
$assocarr[1] = 'Chai2';

$assocarr[true] = 'samosa';
$assocarr[false] = 'vegetables';
print_r($assocarr);


echo "<br><br>";

$food = array(
		'Healthy' => array('Salad', 'vegetables', 'pasta', 1234, 1235.5),
		'Unhealthy' => array('Pizza', 'Icecream',false,null,true)
);
foreach($food as $element => $inner_array)
{
	echo '<br><b>'.$element.'</b><br>';
	foreach ($inner_array as $item) {
		echo $item.", ";
	}
}
echo "<br>";




//EXTRA
function getArray() {
    return array(1, 2, 3);
}

// on PHP 5.4
echo "<br>";
print_r($secondElement = getArray()[1]);

// previously
echo "<br>";
$tmp = getArray();
print_r($secondElement = $tmp[1]);

// or
echo "<br>";
print_r(list(, $secondElement) = getArray());

?>