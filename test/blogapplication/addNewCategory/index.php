<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Category: Blog Application</title>
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

if(isset($_POST['buttonAddCategory'])){
    insertValidCategoryData();
    header("location:../category/");
}

if(isset($_GET['toBeUpdated'])){
    $_SESSION['categoryId'] = $_GET['toBeUpdated'];
}

if(isset($_POST['buttonUpdateCategory'])){
    updateValidCategoryData();
    header("location:../category/");
}
?>

<form action="index.php" method="POST" enctype="multipart/form-data">
<div id="divRegister">
    <h1><?php echo getCategoryName(); ?></h1>

    <div class="col-25">
        <label>Title</label>
    </div>
    <div class="col-75">
        <input type="text" name="category[txtCategoryTitle]" value="<?php echo getCategoryValue('category', 'txtCategoryTitle'); ?>">
    </div>

    <div>
        <div class="col-25">
            <label>Content</label>
        </div>
        <div class="col-75">
            <textarea name="category[txtareaContent]" rows="5" cols="30"><?php echo getCategoryValue('category', 'txtareaContent') ?></textarea>
        </div>    
    </div>

    <div>
        <div class="col-25">
            <label>URL</label>
        </div>
        <div class="col-75">
            <input type="text" name="category[txtURL]" value="<?php echo getCategoryValue('category', 'txtURL') ?>">
        </div>    
    </div>

    <div>
        <div class="col-25">
            <label>Meta Title</label>
        </div>
        <div class="col-75">
            <input type="text" name="category[txtMetaTitle]" value="<?php echo getCategoryValue('category', 'txtMetaTitle') ?>">
        </div>    
    </div>

    <div>
        <div class="col-25">
            <label>Parent Category</label>
        </div>
        <div class="col-75">
            <select name="category[selectCategory]">
                        <option value=''></option>
                <?php $categoriesArray = getAllCategories();?>
                    <?php for($i = 0; $i < sizeof($categoriesArray); $i++): ?>
                        <?php $selectedCategory = in_array(getCategoryValue('category', 'selectCategory'),[$category]) ? "selected":""; ?>
                        <option value="<?= $categoriesArray[$i]['category_id']?>" <?= $selectedCategory ?> ><?= $categoriesArray[$i]['category_title']?></option>
                    <?php endfor; ?>
            </select>
        </div>    
    </div>

    <div>
        <div class="col-25">
            <label>Image</label>
        </div>
        <div class="col-75">
            <input type="file" name="categoryImage">
        </div>    
    </div>

    <div>
        <input type="submit" id="buttonAddCategory" name="<?php echo getCategorySubmitName();?>" value="<?php echo getCategorySubmitValue();?>">
        <a href="/cybercom/extra/blogapplication/category/">Back to Categories</a>
    </div>
</div>            
</form>