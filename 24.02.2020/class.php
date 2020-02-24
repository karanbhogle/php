<?php

class Adapter
{
    protected $config = [
        'hostname' => '',
        'username' => '',
        'password' => '',
        'dbname' => ''
    ];
    protected $connect;
    protected $query;

    public function connect($config){
        if(!is_array($config)){
            throw new Exception();
        }
        $this->setConfig($config);
        $this->setConnect($this->getConfig());
    }

    public function insert($insertQuery){
        $this->setQuery($insertQuery);
        $this->query($this->getQuery());
        return $last_id = mysqli_insert_id($this->getConnect());
    }

    public function update($updateQuery){
        $this->setQuery($updateQuery);
        $this->query($this->getQuery());
    }

    public function delete($deleteQuery){
        $this->setQuery($deleteQuery);
        $this->query($this->getQuery());
    }

    public function fetchOne($fetchOneQuery){
        $this->setQuery($fetchOneQuery);
        $result = $this->query($this->getQuery());
        return mysqli_num_rows($result);
    }

    public function fetchRow($fetchRowQuery){
        $this->setQuery($fetchRowQuery);
        return $result = $this->query($this->getQuery());
    }

    public function query($query){
        if(!$this->getConnect()){
            $this->connect();
        }
        return $this->getConnect()->query($query);
    }



    public function setConfig($config){
        $this->config = array_merge($this->config, $config);
        return $this;
    }

    public function getConfig(){
        return $this->config;
    }

    public function setConnect($config){
        $this->connect = new mysqli($config['hostname'], $config['username'], $config['password'], $config['dbname']);
        return $this;
    }
    
    public function getConnect(){
        return $this->connect;
    }

    public function setQuery($query){
        $this->query = $query;
        return $this;
    }

    public function getQuery(){
        return $this->query;
    }
}

$adapter = new Adapter();
$myDbConfig = [
    'dbname' => 'test',
    'password' => '',
    'username' => 'root',
    'hostname' => 'localhost'
];

$adapter->connect($myDbConfig);

$insertQuery = "INSERT INTO `user`(`user_firstname`, `user_lastname`, `user_email`) VALUES('dumb', 'kumar', 'dumb@mail.com')";
// echo $last_id = $adapter->insert($insertQuery);

$updateQuery = "UPDATE `user` SET `user_firstname` = 'dumber' WHERE `user_id` = 4";
// $adapter->update($updateQuery);

$deleteQuery = "DELETE FROM `user` WHERE `user_firstname` = 'delete'";
// $adapter->delete($deleteQuery);

$fetchOneQuery = "SELECT * from `user`";
// echo "The Number of Rows in `user` table is ".$adapter->fetchOne($fetchOneQuery);

$fetchRowQuery = "SELECT * FROM `user` WHERE `user_id` = 2";
$result = $adapter->fetchRow($fetchRowQuery);
for($row = mysqli_fetch_assoc($result)){
    echo "User is ".$row['user_firstname']." ".$row['user_lastname'];
}


?>