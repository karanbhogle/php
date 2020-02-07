<?php


$string = "karanbhogle.glsica15@gmail.com.co.con.com";
echo $string;
echo '<br>';

$regex = "/^[a-zA-Z0-9._-]+\@[a-zA-Z]+\.[a-zA-Z.]{2,5}$/";
$match = preg_match($regex, $string);
if($match){
    echo $string." is a valid match<br>";
}
else{
    echo $string." is a NOT valid match<br>";
}
echo '<hr>';

//*-*-**-*-*-*-*-*-*-*--*-*-*-*-*-*-*-*--*-*-*-**--**--**--**--*-*-*-*-*-*-*--*-*

$string = "karanbhogle.glsica15@gmail.com.co.con.com";
echo $string;
echo '<br>';

$regex = "(\.)";
$match = preg_replace($regex, "_", $string, 1, $count);
echo "Match Found: ".$match;
echo "<br>No of Replaces : " .$count;
echo '<hr>';

//*-*-**-*-*-*-*-*-*-*--*-*-*-*-*-*-*-*--*-*-*-**--**--**--**--*-*-*-*-*-*-*--*-*


?>

