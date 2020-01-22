<?php

function isLeapYear($year){
    if($year % 400 == 0 || $year % 4 == 0){
        echo $year.' is a leap year<br>';
    }
    else{
        echo $year.' is NOT a leap year<br>';
    }
}

isLeapYear(2020);
isLeapYear(2044);
isLeapYear(2017);
isLeapYear(2048);
isLeapYear(2034);
isLeapYear(2049);


?>