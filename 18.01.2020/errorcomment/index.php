<?php

//This is a single line comment

//Multiple lines 
//can be 
//commented  
//this way or 
//below way

/*
Like this 
commenting
multiple 
lines is easier
and easily readable.
*/

//This statement will change the error reporting status. 0 means off.
error_reporting('0');
ini_set('error_reporting',0);

echo '<h2>For Comments, open the code. Error Reporting is shown below</h2>'.'<br>';

//echo 'By commenting this line and running the code, error will be NOT BE reported.'

echo 'Check code and remove <b>Line 25</b> from comments to see the error';

?>