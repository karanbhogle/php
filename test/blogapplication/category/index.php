<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category: Blog Application</title>
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


if(isset($_SESSION['currentUser']) && isset($_POST['btnAddCategory'])){
    if(isset($_SESSION['categoryId'])){
        unset($_SESSION['categoryId']);
    }
    header("location:../addNewCategory/");
}

if(isset($_SESSION['currentUser']) && isset($_POST['btnMyProfile'])){
    header("location:../register/");
}

if(isset($_SESSION['currentUser']) && isset($_POST['btnHomepage'])){
    header("location:../homepage/");
}
if(isset($_GET['toBeDeleted'])){
    require_once '../database/DB.php';
    $deleteQuery = "DELETE FROM category WHERE category_id=".$_GET['toBeDeleted'];

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
            <input type="submit" class="btnClass" name="btnHomepage" value="Display Blogs">
            <input type="submit" class="btnClass" name="btnMyProfile" value="My Profile">
            <input type="submit" class="btnClass" name="btnLogout" value="Log Out">
        </div>

        <div>
            <h2>Blog Category</h2>
            <input type="submit" name="btnAddCategory" value="Add Category">
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
        $columns = @array_keys(mysqli_fetch_assoc($result));
        for($i = 0; $i < @sizeof($columns); $i++){
            echo '<th>'.$columns[$i].'</th>';
        }
        echo '<th>Actions</th>';
    }
}

function displayTableRows(){
    global $result;
    $result = getResultData();
    if(mysqli_num_rows($result) <= 0){
        echo "Your newly added categories will appear here";
    }
    else{
        while($row = mysqli_fetch_row($result)){

            if(sizeof($row) > 0){
                echo '<tr>';
                for($i = 0; $i < sizeof($row); $i++){
                    if($i == 1){
                        echo '<td><img src="../uploaded/categoryimage/'.$row[$i].'" width=100 height=70></td>';
                        continue;
                    }
                    echo '<td>'.$row[$i].'</td>';
                }
                echo '<td>';
                    echo '<a href="/cybercom/extra/blogapplication/addNewCategory/index.php?toBeUpdated='.$row[0].'">Update</a>'.'&nbsp;&nbsp;';
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
                    category_id "Category ID",
                    category_image "Category Image",
                    category_title "Category Name",
                    category_createdat "Created Date"
                FROM category';
    $selectObj = new DB();
    $result = $selectObj->fetchData($selectQuery);
    return $result;
}

?>