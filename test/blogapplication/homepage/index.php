<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Posts: Blog Application</title>
    <style>
        .mainContainer{
            border:1px solid black;
        }
        .topLeft{
            float:right;
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
if(!isset($_SESSION['currentUser'])){
    header("location:../");
}

if(isset($_SESSION['currentUser']) && isset($_POST['btnManageCategory'])){
    header("location:../addNewCategory/");
}

if(isset($_SESSION['currentUser']) && isset($_POST['btnAddBlogPost'])){
    header("location:../addBlogPost/");
}

if(isset($_SESSION['currentUser']) && isset($_POST['btnMyProfile'])){
    header("location:../register/");
}



?>

<form action="index.php" method="POST">
<div class="mainContainer">
        <div class="topLeft">
            <input type="submit" name="btnManageCategory" value="Manage Category">
            <input type="submit" name="btnMyProfile" value="My Profile">
            <input type="submit" name="btnLogout" value="Log Out">
        </div>

        <div>
            <h2>Blog Posts</h2>
            <input type="submit" name="btnAddBlogPost" value="Add Blog Post">
        </div>

        <div>
            <table>

            </table>
        </div>
</div>
</form>


<?php

if(isset($_POST['btnLogout'])){
    session_destroy();
    header("location:../");
}
?>