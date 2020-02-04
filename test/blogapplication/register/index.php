<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register: Blog Application</title>
    <style>
        .error{
            color:red;
        }
        .col-25{
            float: left;
            width: 25%;
            margin-top: 6px;
        }
        .col-75{
            float: left;
            width: 75%;
            margin-top: 6px;
        }
    </style>
</head>

<?php
session_start();
require_once '../regfunctions.php';
if(isset($_POST['btnRegister'])){
    $validatedStatus = validateData();

    if($validatedStatus == "ok"){
        insertValidData();
        header("location:../homepage/");
    }
}

if(isset($_POST['btnUpdate'])){
    $validatedStatus = validateData();

    if($validatedStatus == "ok"){
        require_once '../database/DB.php';
        updateValidData();
    }
}
?>

<form action="index.php" method="POST">
<div id="divRegister">
    <h1>Register</h1>
    <div class="col-25">
        <label>Prefix</label>
    </div>
    <div class="col-75">
        <select name="account[prefix]">
            <?php $prefixArray = ["Mr", "Miss", "Mrs", "Ms", "Dr"];?>
                <?php foreach($prefixArray as $prefix): ?>
                    <?php $selectedPrefix = in_array(getValue('account', 'prefix'),[$prefix]) ? "selected":""; ?>
                    <option value="<?= $prefix?>" <?= $selectedPrefix ?> ><?= $prefix?></option>
                <?php endforeach; ?>
        </select>
    </div>

    <div class="col-25">
        <label>FirstName</label>
    </div>
    <div class="col-75">
        <input type="text" id="txtFirstName" name="account[txtFirstName]" value="<?php echo getValue('account', 'txtFirstName'); ?>">
        <span class = "error"><?php if(isset($_POST['buttonRegister'])){echo $firstNameError;}?></span>
    </div>


    <div>
        <div class="col-25">
            <label>LastName</label>
        </div>
        <div class="col-75">
            <input type="text" id="txtLastName" name="account[txtLastName]" value="<?php echo getValue('account', 'txtLastName') ?>">
            <span class = "error"><?php if(isset($_POST['buttonRegister'])){echo $lastNameError;}?></span>
        </div>    
    </div>

    <div>
        <div class="col-25">
            <label>Email</label>
        </div>
        <div class="col-75">
            <input type="text" name="account[txtEmail]" value="<?php echo getValue('account', 'txtEmail') ?>">
            <span class = "error"><?php if(isset($_POST['buttonRegister'])){echo $emailError;}?></span>
        </div>    
    </div>

    <div>
        <div class="col-25">
            <label>Mobile Number</label>
        </div>
        <div class="col-75">
            <input type="text" id="txtLastName" name="account[txtPhoneNumber]" value="<?php echo getValue('account', 'txtPhoneNumber') ?>">
            <span class = "error"><?php if(isset($_POST['buttonRegister'])){echo $phoneNumberError;}?></span>
        </div>    
    </div>

    <div>
        <div class="col-25">
            <label>Password</label>
        </div>
        <div class="col-75">
            <input type="password" name="account[txtPassword]" value="<?php echo getValue('account', 'txtPassword') ?>">
        </div>    
    </div>

    <div>
        <div class="col-25">
            <label>Confirm Password</label>
        </div>
        <div class="col-75">
            <input type="password" name="account[txtConfirmPassword]" value="<?php echo getValue('account', 'txtConfirmPassword') ?>">
            <span class = "error"><?php if(isset($_POST['buttonRegister'])){echo $passwordError;}?></span>
        </div>    
    </div>

    <div>
        <div class="col-25">
            <label>Information</label>
        </div>
        <div class="col-75">
            <textarea name="account[txtareaInformation]" rows="5" cols="30"><?php echo getValue('account', 'txtareaInformation') ?></textarea>
        </div>    
    </div>
    
    <?php 
    if(!isset($_SESSION['currentUser'])){
        echo '
        <div>
        <input type="checkbox" id="checkboxTerms&Conditions" onclick="toggleTermsAndConditions()">
            Hereby, I accept Terms & Conditions
        </div>';
    }?> 

    <div>
        <input type="submit" <?php if(!isset($_SESSION['currentUser'])){echo 'style="display:none"';} ?> id="<?php echo getButtonId(); ?>" name="<?php echo getButtonName(); ?>" value="<?php echo getButtonValue(); ?>">
    </div>
</div>            
</form>

<script src="blogapp.js"></script>
