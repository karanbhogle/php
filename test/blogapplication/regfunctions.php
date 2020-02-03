<?php

$firstNameError = "";
$lastNameError = "";
$emailError = "";
$phoneNumberError = "";
$passwordError = "";

function validateData(){
    global $firstNameError;
    global $lastNameError;
    global $emailError;
    global $phoneNumberError;
    global $passwordError;

    $firstName = $_POST['account']['txtFirstName'];
    $lastName = $_POST['account']['txtLastName'];
    $email = $_POST['account']['txtEmail'];
    $phoneNumber = $_POST['account']['txtPhoneNumber'];
    $password = $_POST['account']['txtPassword'];
    $confirmPassword = $_POST['account']['txtConfirmPassword'];

    if(!empty($firstName) || !empty($lastName) || !empty($email) ||
        !empty($phoneNumber) || !empty($password) ||
        !empty($information)){

        if(!preg_match('/^[a-zA-Z\s]+$/', $firstName)){
            $firstNameError = "Please Enter Valid FirstName";
        }
        if(!preg_match('/^[a-zA-Z\s]+$/', $lastName)){
            $lastNameError = "Please Enter Valid LastName";
        }
        if(!preg_match("/[a-zA-Z0-9._-]+\@[a-zA-Z]+\.[a-zA-Z.]{2,5}/", $email)) {
            $emailError = "Please Enter Valid Email"; 
        }
        if(!preg_match("/^[6-9][0-9]{9}$/", $phoneNumber)){
            $phoneNumberError = "Please Enter a Valid 10-digit Number";
        }
        if($password != $confirmPassword){
            $passwordError = "Please make sure your password and confirm password both match";
        }
        
        if($firstNameError == "" && $lastNameError == "" && $emailError == "" && $phoneNumberError == "" 
        && $passwordError == ""){
            
            return "ok";
        }

    }
    else{
        echo "Red * is mandatory";
    }
}

function getSpecificUserData(){
    require_once 'database/DB.php';
    $selectCurrentUser = "SELECT
                            user_prefix,
                            user_firstname,
                            user_lastname,
                            user_mobile,
                            user_email,
                            user_information
                        FROM user WHERE user_id=".$_SESSION['currentUser']."";

    $getAllDataObj = new DB();
    return $result = $getAllDataObj->fetchData($selectCurrentUser);
}


function getValue($section, $fieldName, $returnType = ""){
    
    if(isset($_SESSION['currentUser'])){
        $data = getSpecificUserData();
        $row = mysqli_fetch_assoc($data);

        switch($fieldName){
            case "prefix": return $row['user_prefix'];
                            break;
            case "txtFirstName": return $row['user_firstname'];
                            break;
            case "txtLastName": return $row['user_lastname'];
                            break;
            case "txtPhoneNumber": return $row['user_mobile'];
                            break;
            case "txtEmail": return $row['user_email'];
                            break;
            case "txtareaInformation": return $row['user_information'];
                            break;
        }                            
    }

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

function getCleanAccountArray(){

    date_default_timezone_set('Asia/Kolkata');
    $currentTime = date( 'd-m-Y h:i:s A', time());

    if(isset($_SESSION['currentUser'])){
        $accountKeys = ['user_prefix', 'user_firstname', 'user_lastname', 'user_mobile',
                    'user_email', 'user_password', 'user_information','user_updatedat'];
        $accountValues = [$_POST['account']['prefix'], $_POST['account']['txtFirstName'], $_POST['account']['txtLastName'],
                      $_POST['account']['txtPhoneNumber'], $_POST['account']['txtEmail'], md5($_POST['account']['txtPassword']), 
                      $_POST['account']['txtareaInformation'], ''];
    }
    else{
        $accountKeys = ['user_prefix', 'user_firstname', 'user_lastname', 'user_mobile',
                    'user_email', 'user_password', 'user_information',
                    'user_createdat', 'user_updatedat'];
        $accountValues = [$_POST['account']['prefix'], $_POST['account']['txtFirstName'], $_POST['account']['txtLastName'],
                      $_POST['account']['txtPhoneNumber'], $_POST['account']['txtEmail'], md5($_POST['account']['txtPassword']), 
                      $_POST['account']['txtareaInformation'], $currentTime, ''];
    }
    return array_combine($accountKeys, $accountValues);
}


function insertValidData(){
    require_once 'database/DB.php';
    $insertObj = new DB();

    $accountArray = getCleanAccountArray('account');

    $last_id = $insertObj->insertData('user', $accountArray);
    $_SESSION['currentUser'] = $last_id;
}


function getButtonId(){
    if(isset($_SESSION['currentUser'])){
        return "btnUpdate";
    }
    else{
        return "btnRegister";
    }
}

function getButtonName(){
    if(isset($_SESSION['currentUser'])){
        return "btnUpdate";
    }
    else{
        return "btnRegister";
    }
}

function getButtonValue(){
    if(isset($_SESSION['currentUser'])){
        return "Update Now";
    }
    else{
        return "Submit";
    }
}


function updateValidData(){
    $accountArray = getCleanAccountArray('account');

    date_default_timezone_set('Asia/Kolkata');
    $currentTime = date( 'd-m-Y h:i:s A', time());

    $updateObj =  new DB();
    $updateQuery = "UPDATE user SET ";

    foreach($accountArray as $fieldName => $fieldValue){
        if($fieldName == "user_updatedat"){
            $updateQuery .= $fieldName." = '".$currentTime."'";
        }
        else{
            $updateQuery .= $fieldName." = '".$fieldValue."',";            
        }
    }
    $updateQuery .= " WHERE user_id=".$_SESSION['currentUser'];
    $updateObj->updateData($updateQuery);
    header("location:../homepage/");
}
?>