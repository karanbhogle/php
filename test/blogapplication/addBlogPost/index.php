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
require_once '../addfunctions.php';

if(!isset($_SESSION['currentUser'])){
    header("location:../");
}

if(isset($_POST['buttonAddBlog'])){
    $status = insertValidBlogData();
    if($status == "inserted"){
        header("location:../homepage");
    }
    else{
        echo $status;
    }
}

if(isset($_GET['toBeUpdated'])){
    $_SESSION['blogId'] = $_GET['toBeUpdated'];
}

if(isset($_POST['buttonUpdateBlog'])){
    updateValidBlogData();
}

?>

<form action="index.php" method="POST">
<div id="divRegister">
    <h1>Add New Blog Post</h1>

    <div class="col-25">
        <label>Title</label>
    </div>
    <div class="col-75">
        <input type="text" name="blog[txtBlogTitle]" value="<?php echo getBlogValue('blog', 'txtBlogTitle'); ?>">
    </div>

    <div>
        <div class="col-25">
            <label>Content</label>
        </div>
        <div class="col-75">
            <textarea name="blog[txtareaContent]" rows="5" cols="30"><?php echo getBlogValue('blog', 'txtareaContent') ?></textarea>
        </div>    
    </div>

    <div>
        <div class="col-25">
            <label>URL</label>
        </div>
        <div class="col-75">
            <input type="text" name="blog[txtURL]" value="<?php echo getBlogValue('blog', 'txtURL') ?>">
        </div>    
    </div>

    <div>
        <div class="col-25">
            <label>Published At</label>
        </div>
        <div class="col-75">
            <input type="date" name="blog[datePublishedOn]" value="<?php echo getBlogValue('blog', 'datePublishedOn') ?>">
        </div>    
    </div>

    <div>
        <div class="col-25">
            <label>Category</label>
        </div>
        <div class="col-75">
            <select name="blog[selectCategory]">
                        <option value=''></option>
                <?php $categoriesArray = getAllCategories();?>
                    <?php foreach($categoriesArray as $category): ?>
                        <?php $selectedCategory = in_array(getBlogValue('blog', 'selectCategory'),[$category]) ? "selected":""; ?>
                        <option value="<?= $category?>" <?= $selectedCategory ?> ><?= $category?></option>
                    <?php endforeach; ?>
            </select>
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
        <input type="submit" name="<?php echo getBlogSubmitName(); ?>" value="<?php echo getBlogSubmitValue(); ?>">
        <a href="/cybercom/extra/blogapplication/homepage/">Back to Blog Posts</a>
    </div>
</div>            
</form>