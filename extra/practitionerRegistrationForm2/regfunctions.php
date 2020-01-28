<?php

function getValue($section, $fieldName, $returnType = ""){
    if(isset($_POST[$section][$fieldName])){
        if(is_array($_POST[$section][$fieldName])){
            $tmpArray = [];
            foreach($_POST[$section][$fieldName] as $element){
                array_push($tmpArray, $element);
            }
            $_POST[$section][$fieldName] = $tmpArray;
        }    
        return $_POST[$section][$fieldName];
    }
    else{
        if(isset($_SESSION[$section][$fieldName])){
            return $_SESSION[$section][$fieldName];
        }
        else{
            return $returnType;
        }
    }
}

function setSessionValues($section){
    return isset($_POST[$section]) ? $_SESSION[$section] = $_POST[$section] : [];
}

$account = setSessionValues('account');
$address = setSessionValues('address');
$otherInfo = setSessionValues('otherInfo');

echo "<pre>";
echo "ACCOUNT";
print_r($account);

echo "<br><br>ADDRESS";
print_r($address);

echo "<br><br>OTHER INFO";
print_r($otherInfo);
echo "</pre>";


?>