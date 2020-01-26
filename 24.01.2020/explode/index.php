<?php

$filename = "names.txt";
$file = fopen($filename, "r");

$data = fread($file, filesize($filename));
$arrayNames = explode(",", $data);

print_r($arrayNames);

?>