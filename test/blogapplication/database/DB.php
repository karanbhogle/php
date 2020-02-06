<?php

require_once 'Connection.php';
class DB{
    private $connectionObj = "";
    private $whereClause = "";

    function __construct(){
        $conn = new Connection();
        $this->connectionObj = $conn->getConnectionObject();
    }

    function insertData($tableName, $insertArray){
        $columns = array_keys($insertArray);
        $values = array_values($insertArray);

        $columnString = implode(",", $columns);
        $valueString = "'".implode("','",$values)."'";

        $insertQueryString = "INSERT INTO ".$tableName."(".$columnString.") VALUES(".$valueString.")";
        echo '<br><pre>'.$insertQueryString.'</pre>';
        $result = mysqli_query($this->connectionObj, $insertQueryString);
        $last_id = mysqli_insert_id($this->connectionObj);
        return $last_id;
    }

    function checkUserLoginDetails($email, $password){
        $loginQueryString = "SELECT user_id from user WHERE user_email='".$email."' AND user_password='".$password."'";
        $result = mysqli_query($this->connectionObj, $loginQueryString);
        
        if(!$result){
            echo mysqli_error($this->connectionObj);
        }
        $rowcount=mysqli_num_rows($result);
        if($rowcount > 0){
            while ($row = $result -> fetch_row()) {
                return $row[0];
            }
        }
        else{
            return false;
        }
    }

    function fetchData($selectQueryString){
        $result = mysqli_query($this->connectionObj, $selectQueryString);
        if(!$result){
            echo mysqli_error($this->connectionObj);
        }
        return $result;
    }

    function updateData($updateQueryString){
        $updateQueryString .= " ";
        $result = mysqli_query($this->connectionObj, $updateQueryString);
        if(!$result){
            echo mysqli_error($this->connectionObj);
        }
        return $result;
    }

    function updateLastLogin(){
        $updateLastLoginQueryString = "UPDATE user SET user_lastlogin='".$_SESSION['currentUserLastLoggedIn']."' WHERE user_id=".$_SESSION['currentUser'];
        $result = mysqli_query($this->connectionObj, $updateLastLoginQueryString);
        if(!$result){
            echo mysqli_error($this->connectionObj);
        }
        return $result;
    }

    function deleteData($deleteQueryString){
        $result = mysqli_query($this->connectionObj, $deleteQueryString);
        if(!$result){
            echo mysqli_error($this->connectionObj);
        }
        return $result;
    }
    
    function getAllCategoriesTitle(){
        $getCategoriesQueryString = "SELECT category_id, category_title from category";
        $result = mysqli_query($this->connectionObj, $getCategoriesQueryString);
        if(!$result){
            echo mysqli_error($this->connectionObj);
        }

        $categories = [];
        while($row = mysqli_fetch_array($result)){
            array_push($categories, $row);
        }
        return $categories;
    }
}
?>