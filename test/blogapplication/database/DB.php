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
        
        $result = mysqli_query($this->connectionObj, $insertQueryString);
        $last_id = mysqli_insert_id($this->connectionObj);
        return $last_id;
    }

    function checkUserLoginDetails($email, $password){
        $loginQueryString = "SELECT user_id from user WHERE user_email='".$email."' AND user_password='".$password."'";
        $result = mysqli_query($this->connectionObj, $loginQueryString);
        
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
        return $result;
    }

    function updateData($updateQueryString){
        $updateQueryString .= " ";
        $result = mysqli_query($this->connectionObj, $updateQueryString);
        return $result;
    }

    function updateLastLogin(){
        $updateLastLoginQueryString = "UPDATE user SET user_lastlogin='".$_SESSION['currentUserLastLoggedIn']."' WHERE user_id=".$_SESSION['currentUser'];
        echo $updateLastLoginQueryString;
        $result = mysqli_query($this->connectionObj, $updateLastLoginQueryString);
        return $result;
    }
}
?>