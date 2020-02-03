<?php

class Connection{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $dbName = "blog";
    private $connection = "";

    function __construct(){
        $this->connectToDB();
    }

    function connectToDB(){
        $this->connection = @mysqli_connect($this->hostname,$this->username, $this->password, $this->dbName) or die("Can't Connect! Check connection variables or XAMPP MySql service");
    }

    function getConnectionObject(){
        return $this->connection;
    }
}