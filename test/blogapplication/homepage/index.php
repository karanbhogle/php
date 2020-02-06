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
        table,tr{
            border:0.5px solid black;
            width:1000px;
            text-align:center;
        }
        .btnClass {
            box-shadow: 0px 0px 0px 2px #9fb4f2;
            background:linear-gradient(to bottom, #7892c2 5%, #476e9e 100%);
            background-color:#7892c2;
            border-radius:16px;
            border:1px solid #4e6096;
            display:inline-block;
            cursor:pointer;
            color:#ffffff;
            font-family:Arial;
            font-size:12px;
            margin-top: 10px;
            margin-right:10px;
            padding:8px 30px;
            text-decoration:none;
            text-shadow:0px 1px 0px #283966;
        }
        .btnClass:hover {
            background:linear-gradient(to bottom, #476e9e 5%, #7892c2 100%);
            background-color:#476e9e;
        }
        .btnClass:active {
            position:relative;
            top:1px;
        }
    </style>
</head>
<?php
session_start();
if(!isset($_SESSION['currentUser'])){
    header("location:../");
}

if(isset($_SESSION['currentUser']) && isset($_POST['btnManageCategory'])){
    header("location:../category/");
}

if(isset($_SESSION['currentUser']) && isset($_POST['btnAddBlogPost'])){
    if(isset($_SESSION['blogId'])){
        unset($_SESSION['blogId']);
    }
    header("location:../addBlogPost/");
}

if(isset($_SESSION['currentUser']) && isset($_POST['btnMyProfile'])){
    header("location:../register/");
}

if(isset($_GET['toBeDeleted'])){
    require_once '../database/DB.php';
    $deleteQuery = "DELETE FROM blog_post WHERE blog_post_id=".$_GET['toBeDeleted'];

    $deleteBlogObj = new DB();
    $deleteBlogObj->deleteData($deleteQuery);
    header("location:index.php");
}
if(isset($_POST['btnLogout'])){
    session_destroy();
    header("location:../");
}


?>

<form action="index.php" method="POST">
<div class="mainContainer">
        <div class="topLeft">
            <input type="submit" class="btnClass" name="btnManageCategory" value="Manage Category">
            <input type="submit" class="btnClass" name="btnMyProfile" value="My Profile">
            <input type="submit" class="btnClass" name="btnLogout" value="Log Out">
        </div>

        <div>
            <h2>Blog Posts</h2>
            <input type="submit" name="btnAddBlogPost" value="Add Blog Post">
        </div>

        <div>
        <table>
            <tr>
                <?php
                require_once '../database/DB.php';
                displayTableHeader();
                ?>
            </tr>
            <?php
                displayTableRows();
            ?>
        </table>
        </div>
</div>
</form>






<?php
function displayTableHeader(){
    global $result;
    $result = getResultData();
    if(mysqli_num_rows($result) <= 0){
        echo " ";
    }
    else{
        $columns = array_keys(mysqli_fetch_assoc($result));
        for($i = 0; $i < sizeof($columns); $i++){
            echo '<th>'.$columns[$i].'</th>';
        }
        echo '<th>Actions</th>';
    }
    
}

function displayTableRows(){
    global $result;
    $result = getResultData();
    if(mysqli_num_rows($result) <= 0){
        echo "<h3>Your newly added Blog Post will appear here.</h3>";
    }
    else{
        while($row = mysqli_fetch_row($result)){

            if(sizeof($row) > 0){
                echo '<tr>';
                for($i = 0; $i < sizeof($row); $i++){
                    echo '<td>'.$row[$i].'</td>';
                }
                echo '<td>';
                    echo '<a href="/cybercom/extra/blogapplication/addBlogPost/index.php?toBeUpdated='.$row[0].'">Update</a>'.'&nbsp;&nbsp;';
                    echo '<a href="index.php?toBeDeleted='.$row[0].'">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
            else{
                echo 'No DATA to Display.';
            }
        }
    }
}

function getResultData(){
    $selectQuery = 'SELECT 
                    blog_post_id PostID,
                    blog_post_title Title,
                    blog_post_publishedat "Published Date"
                FROM blog_post 
                WHERE blog_post_user_id='.$_SESSION['currentUser'];
    $selectObj = new DB();
    $result = $selectObj->fetchData($selectQuery);
    return $result;
}

?>