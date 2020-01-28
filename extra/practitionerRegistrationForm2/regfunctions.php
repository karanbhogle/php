<?php

$firstNameError = "";
$lastNameError = "";
$emailError = "";
$phoneNumberError = "";
$passwordError = "";
$addressLine1Error = "";
$addressLine2Error = "";
$countryError = "";
$postalCodeError = "";
$describeYourselfError = "";
$howToTouchError = "";
$imageError = "";
$certificateError = "";
$displayTable = false;

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



function validateData(){
    global $firstNameError;
    global $lastNameError;
    global $emailError;
    global $phoneNumberError;
    global $passwordError;
    global $addressLine1Error;
    global $addressLine2Error;
    global $countryError;
    global $postalCodeError;
    global $describeYourselfError;
    global $howToTouchError;
    global $imageError;
    global $certificateError;
    global $displayTable;

    $firstName = $_POST['account']['txtFirstName'];
    $lastName = $_POST['account']['txtLastName'];
    $email = $_POST['account']['txtEmail'];
    $phoneNumber = $_POST['account']['txtPhoneNumber'];
    $password = $_POST['account']['txtPassword'];
    $confirmPassword = $_POST['account']['txtConfirmPassword'];
    $addressLine1 = $_POST['address']['txtAddressLine1'];
    $addressLine2 = $_POST['address']['txtAddressLine2'];
    $postalCode = $_POST['address']['txtPostalCode'];
    $describeYourself = $_POST['otherInfo']['txtareaDescribeYourself'];

    $certificateName = $_FILES['fileCertificatePDF']['name'];
    $certificateType = $_FILES['fileCertificatePDF']['type'];

    $profileImageName = $_FILES['fileProfileImage']['name'];
    $profileImageType = $_FILES['fileProfileImage']['type'];
    
    $certificateExtension = strtolower(substr($certificateName, strpos($certificateName, '.') + 1));
    $profilePicExtension = strtolower(substr($profileImageName, strpos($profileImageName, '.') + 1));

    if(!empty($firstName) || !empty($lastName) || !empty($email) ||
        !empty($phoneNumber) || !empty($password) || !empty($addressLine1) ||
        !empty($addressLine2) || !empty($country) || !empty($postalCode) ||
        !empty($describeYourself) || !empty($howToTouch)){

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
        if($addressLine1 == ""){
            $addressLine1Error = "Please enter Address Line 1";
        }
        if($addressLine2 == ""){
            $addressLine2Error = "Please enter Address Line 2";
        }
        if(@$_POST['address']['selectCountry'] == ""){
            $countryError = "Please enter a select a Country";
        }
        if($postalCode == ""){
            $postalCodeError = "Please enter a Valid Postal Code";
        }
        if($describeYourself == ""){
            $describeYourselfError = "Please enter Describe Yourself";
        }
        if(@$_POST['otherInfo']['checkboxTouch'] == ""){
            $howToTouchError = "Please select how would you like to get in touch with us";
        }

        if(!empty($certificateName) && ($certificateExtension == "pdf")){
            $location = "uploaded/";
            if(move_uploaded_file($_FILES['fileCertificatePDF']['tmp_name'], $location.$certificateName)){
            }
        }
        else{
            $certificateError = "Please Choose an PDF file only";
        }
        if(!empty($profileImageName) && ($profilePicExtension == "jpg") || ($profilePicExtension == "jpeg") || ($profilePicExtension == "png")){
            $location = "uploaded/";
            if(move_uploaded_file($_FILES['fileProfileImage']['tmp_name'], $location.$profileImageName)){
            }
        }
        else{
            $imageError = "Please Choose an Image file(JPG/JPEG/PNG) only";
        }
        if($firstNameError == "" && $lastNameError == "" && $emailError == "" && $phoneNumberError == "" 
        && $passwordError == "" && $addressLine1Error == "" && $addressLine2Error =="" && $countryError == ""
        && $postalCodeError == "" && $describeYourselfError == "" && $howToTouchError == "" && $imageError == "" && $certificateError == ""){
            $displayTable = true;
            echo "<script>alert('All Data OK')</script>";
        }

    }
    else{
        echo "Red * is mandatory";
    }
}

if(isset($_POST['btnSubmit']))
    validateData();

?>