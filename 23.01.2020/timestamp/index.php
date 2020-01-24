<?php

$time = time();
echo 'The current time in seconds is '.$time;
echo '<br>';

$timeToday = date('d/m/y @ H:i:s', $time);
echo 'Time Today : '.$timeToday;
echo '<br>';

$timeTomorrow = date('d/m/y @ H:i:s', strtotime('+1 day'));
echo 'Time Tomorrow : '.$timeTomorrow;
echo '<br>';
echo '<br>';

echo "A random number generated out of it's Maximum Number: ".rand()."/".getrandmax();
echo "<br>A random number between 1 and 6(Dice Roll): ".rand(1, 6);

?>