<?php


function getBlogValue($section, $fieldName, $returnType = ""){
    
    if(isset($_SESSION['blogId'])){
        $data = getSpecificBlogData();
        $row = mysqli_fetch_assoc($data);

        switch($fieldName){
            case "txtBlogTitle": return $row['blog_post_title'];
                            break;
            case "txtareaContent": return $row['blog_post_content'];
                            break;
            case "txtURL": return $row['blog_post_url'];
                            break;
            case "datePublishedOn": return $row['blog_post_publishedat'];
                            break;
            case "txtCategory": return $row['blog_post_category'];
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


function getAllCategories(){
    require_once 'database/DB.php';
    $getCategoriesObj = new DB();
    $result = $getCategoriesObj->getAllCategoriesTitle();
    return $result;
}


function getCategoryValue($section, $fieldName, $returnType = ""){
    
    if(isset($_SESSION['categoryId'])){
        $data = getSpecificCategoryData();
        $row = mysqli_fetch_assoc($data);

        switch($fieldName){
            case "txtCategoryTitle": return $row['category_title'];
                            break;
            case "txtareaContent": return $row['category_content'];
                            break;
            case "txtURL": return $row['category_url'];
                            break;
            case "txtMetaTitle": return $row['category_metatitle'];
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


function getSpecificCategoryData(){
    require_once 'database/DB.php';
    $selectCurrentCategory = "SELECT
                            category_title,
                            category_content,
                            category_url,
                            category_metatitle
                        FROM category WHERE category_id=".$_SESSION['categoryId']."";

    $getAllDataObj = new DB();
    return $result = $getAllDataObj->fetchData($selectCurrentCategory);
}

function getSpecificBlogData(){
    require_once 'database/DB.php';
    $selectCurrentBlog = "SELECT
                            blog_post_title,
                            blog_post_content,
                            blog_post_url,
                            blog_post_publishedat,
                            blog_post_category
                        FROM blog_post WHERE blog_post_id=".$_SESSION['blogId']."";   

    $getAllDataObj = new DB();
    return $result = $getAllDataObj->fetchData($selectCurrentBlog);
}

function insertValidCategoryData(){
    require_once 'database/DB.php';
    $insertObj = new DB();
    $cleanArray = getCleanCategoryArray();
    $last_id = $insertObj->insertData('category', $cleanArray);
}

function insertValidBlogData(){
    require_once 'database/DB.php';
    $insertObj = new DB();
    $cleanArray = getCleanBlogArray();
    $status = $insertObj->insertData('blog_post', $cleanArray);
    return $status;
}

function getCleanBlogArray(){
    date_default_timezone_set('Asia/Kolkata');
    $currentTime = date( 'd-m-Y h:i:s A', time());
    if(isset($_FILES['blogImage'])){
        
        $imageName = $_FILES['blogImage']['name'];
        $profilePicExtension = $_FILES['blogImage']['type'];

        $location = "../uploaded/blogimage/";
        if(move_uploaded_file($_FILES['blogImage']['tmp_name'], $location.$imageName)){
            echo "Ok";
        }
        else{
            echo "Error";
        }
    }
    else{
        $imageName = ' ';
    }

    if(!isset($_SESSION['blogId'])){
        $blogKeys = ['blog_post_user_id', 'blog_post_title', 'blog_post_url', 'blog_post_content',
                         'blog_post_image', 'blog_post_publishedat', 'blog_post_category', 'blog_post_createdat'];
        $blogValues = [$_SESSION['currentUser'], $_POST['blog']['txtBlogTitle'], 
                            $_POST['blog']['txtURL'], $_POST['blog']['txtareaContent'], 
                            $imageName, $_POST['blog']['datePublishedOn'], 
                            $_POST['blog']['selectCategory'], $currentTime];
    }
    else{
        $blogKeys = ['blog_post_user_id', 'blog_post_title', 'blog_post_url', 'blog_post_content',
                         'blog_post_image', 'blog_post_publishedat', 'blog_post_category', 'blog_post_updatedat'];
        $blogValues = [$_SESSION['currentUser'], $_POST['blog']['txtBlogTitle'], 
                            $_POST['blog']['txtURL'], $_POST['blog']['txtareaContent'], 
                            $imageName, $_POST['blog']['datePublishedOn'], 
                            $_POST['blog']['selectCategory'], $currentTime];
    }
    return array_combine($blogKeys, $blogValues);
}

function getCleanCategoryArray(){
    date_default_timezone_set('Asia/Kolkata');
    $currentTime = date( 'd-m-Y h:i:s A', time());
    if(isset($_FILES['categoryImage'])){
        
        $imageName = $_FILES['categoryImage']['name'];
        $profilePicExtension = $_FILES['categoryImage']['type'];

        $location = "../uploaded/categoryimage/";
        if(move_uploaded_file($_FILES['categoryImage']['tmp_name'], $location.$imageName)){
            echo "Ok";
        }
        else{
            echo "Error";
        } 
        
    }
    else{
        $imageName = ' ';
    }
    
    if(!isset($_POST['category']['selectCategory'])){
        $_POST['category']['selectCategory'] = ' ';
    }

    if(!isset($_SESSION['categoryId'])){
        $categoryKeys = ['category_parent_id', 'category_title', 'category_metatitle', 'category_url',
                         'category_content', 'category_createdat', 'category_image'];
        $categoryValues = [$_POST['category']['selectCategory'], $_POST['category']['txtCategoryTitle'], 
                        $_POST['category']['txtMetaTitle'], $_POST['category']['txtURL'], 
                            $_POST['category']['txtareaContent'], $currentTime, $imageName];
    }
    else{
        $categoryKeys = ['category_parent_id', 'category_title', 'category_metatitle', 'category_url',
                         'category_content', 'category_updatedat', 'category_image'];
        $categoryValues = [$_POST['category']['selectCategory'], $_POST['category']['txtCategoryTitle'], 
                        $_POST['category']['txtMetaTitle'], $_POST['category']['txtURL'], 
                            $_POST['category']['txtareaContent'], $currentTime, $imageName];
    }
    return array_combine($categoryKeys, $categoryValues);
}


function getBlogSubmitName(){
    if(isset($_SESSION['blogId'])){
        return "buttonUpdateBlog";
    }
    else{
        return "buttonAddBlog";
    }
}

function getBlogSubmitValue(){
    if(isset($_SESSION['blogId'])){
        return "Update Blog";
    }
    else{
        return "Submit";
    }
}


function getCategorySubmitName(){
    if(isset($_SESSION['categoryId'])){
        return "buttonUpdateCategory";
    }
    else{
        return "buttonAddCategory";
    }
}

function getCategorySubmitValue(){
    if(isset($_SESSION['categoryId'])){
        return "Update Category";
    }
    else{
        return "Submit";
    }
}





function updateValidBlogData(){
    $blogArray = getCleanBlogArray();

    date_default_timezone_set('Asia/Kolkata');
    $currentTime = date( 'd-m-Y h:i:s A', time());

    require_once 'database/DB.php';
    $updateObj =  new DB();
    $updateQuery = "UPDATE blog_post SET ";

    foreach($blogArray as $fieldName => $fieldValue){
        if($fieldName == "blog_post_updatedat"){
            $updateQuery .= $fieldName." = '".$currentTime."'";
        }
        else{
            $updateQuery .= $fieldName." = '".$fieldValue."',";            
        }
    }
    $updateQuery .= " WHERE blog_post_id=".$_SESSION['blogId'];
    $updateObj->updateData($updateQuery);
    header("location:../homepage/");
}


function updateValidCategoryData(){
    $categoryArray = getCleanCategoryArray();

    date_default_timezone_set('Asia/Kolkata');
    $currentTime = date( 'd-m-Y h:i:s A', time());

    require_once 'database/DB.php';
    $updateObj =  new DB();
    $updateQuery = "UPDATE category SET ";

    foreach($categoryArray as $fieldName => $fieldValue){
        if($fieldName == "category_image"){
            $updateQuery .= $fieldName." = '".$fieldValue."'";
        }
        elseif($fieldName == "category_updatedat"){
            $updateQuery .= $fieldName." = '".$currentTime."',";
        }
        else{
            $updateQuery .= $fieldName." = '".$fieldValue."',";            
        }
    }
    $updateQuery .= " WHERE category_id=".$_SESSION['categoryId'];
    echo $updateQuery;
    $updateObj->updateData($updateQuery);
}
?>
