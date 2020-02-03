<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Blog Post: Blog Application</title>
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

if(!isset($_SESSION['currentUser'])){
    header("location:../");
}

?>

<form action="index.php" method="POST">
<div id="divRegister">
    <h1>Add New Blog Post</h1>

    <div class="col-25">
        <label>Title</label>
    </div>
    <div class="col-75">
        <input type="text" name="blog[txtBlogTitle]" value="<?php echo getValue('blog', 'txtBlogTitle'); ?>">
    </div>

    <div>
        <div class="col-25">
            <label>Content</label>
        </div>
        <div class="col-75">
            <textarea name="blog[txtareaContent]" rows="5" cols="30"><?php echo getValue('blog', 'txtareaContent') ?></textarea>
        </div>    
    </div>

    <div>
        <div class="col-25">
            <label>URL</label>
        </div>
        <div class="col-75">
            <input type="text" name="blog[txtURL]" value="<?php echo getValue('blog', 'txtURL') ?>">
        </div>    
    </div>

    <div>
        <div class="col-25">
            <label>Published At</label>
        </div>
        <div class="col-75">
            <input type="date" name="blog[datePublishedOn]" value="<?php echo getValue('blog', 'datePublishedOn') ?>">
        </div>    
    </div>

    <div>
        <div class="col-25">
            <label>Category</label>
        </div>
        <div class="col-75">
            <input type="text" name="blog[txtCategory]" value="<?php echo getValue('blog', 'txtCategory') ?>">
        </div>    
    </div>

    <div>
        <div class="col-25">
            <label>Meta Title</label>
        </div>
        <div class="col-75">
            <input type="text" name="blog[txtMetaTitle]" value="<?php echo getValue('blog', 'txtMetaTitle') ?>">
        </div>    
    </div>

    <div>
        <div class="col-25">
            <label>Parent Category</label>
        </div>
        <div class="col-75">
            <input type="text" name="blog[txtParentCategory]" value="<?php echo getValue('blog', 'txtParentCategory') ?>">
        </div>    
    </div>

    <div>
        <div class="col-25">
            <label>Image</label>
        </div>
        <div class="col-75">
            <input type="file" name="blogImage">
        </div>    
    </div>

    <div>
        <input type="submit" id="buttonAddBlog" name="buttonAddBlog">
    </div>
</div>            
</form>