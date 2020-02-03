<?php

function insertValidData($tableName, $cleanArray){
    require_once 'database/DB.php';
    $insertObj = new DB();
    
    $last_id = $insertObj->insertData($tableName, $cleanArray);
}

function getCleanCategoryArray(){
    date_default_timezone_set('Asia/Kolkata');
    $currentTime = date( 'd-m-Y h:i:s A', time());

    if(isset($_SESSION['currentUser'])){
        $categoryKeys = ['category_title', 'category_content', 'category_url', 'category_metatitle',
                    'category_parent_id', 'category_image', 'category_updatedat'];
        $categoryValues = [$_POST['category']['txtCategoryTitle'], $_POST['category']['txtFirstName'], $_POST['category']['txtLastName'],
                      $_POST['category']['txtPhoneNumber'], $_POST['category']['txtEmail'], md5($_POST['category']['txtPassword']), 
                      $_POST['category']['txtareaInformation'], ''];
    }
    else{
        $categoryKeys = ['user_prefix', 'user_firstname', 'user_lastname', 'user_mobile',
                    'user_email', 'user_password', 'user_information',
                    'user_createdat', 'user_updatedat'];
        $categoryValues = [$_POST['account']['prefix'], $_POST['account']['txtFirstName'], $_POST['account']['txtLastName'],
                      $_POST['account']['txtPhoneNumber'], $_POST['account']['txtEmail'], md5($_POST['account']['txtPassword']), 
                      $_POST['account']['txtareaInformation'], $currentTime, ''];
    }
    return array_combine($categoryKeys, $categoryValues);
}
?>