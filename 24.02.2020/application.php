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
    protected $currentBalance;

    public function connect($config){
        if(!is_array($config)){
            throw new Exception();
        }
        $this->setConfig($config);
        $this->setConnect($this->getConfig());
    }

    public function withdraw($id, $amount){
        $this->setCurrentBalance($this->getCurrentBalance($id));
        $this->currentBalance = $this->currentBalance - $amount;
        $this->saveCurrentBalanceToDB($id);
    }

    public function deposit($id, $amount){
        $this->setCurrentBalance($this->getCurrentBalance($id));
        $this->currentBalance = $this->currentBalance + $amount;
        $this->saveCurrentBalanceToDB($id);
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

    public function saveCurrentBalanceToDB($id){
        $query = "UPDATE `user` SET user_balance = ".$this->currentBalance." WHERE user_id = ".$id;
        $this->setQuery($query);
        $this->query($this->getQuery());
    }


    public function query($query){
        if(!$this->isConnected()){
            $this->connect();
        }
        return $this->getConnect()->query($query);
    }

    public function isConnected(){
        if(!$this->getConnect()){
            return false;
        }
        return true;
    }



    //LIST OF GETTERs AND SETTERs

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

    public function setCurrentBalance($balance){
        $this->currentBalance = $balance;
    }

    public function getCurrentBalance($id){
        $query = "SELECT user_balance FROM `user` WHERE user_id = ".$id;
        $this->setQuery($query);
        $result = $this->query($this->getQuery());
        while($row = $result->fetch_assoc()){
            $data = $row['user_balance'];
        }
        return $data;
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

if(isset($_POST['btnConfirm'])){
    if(isset($_POST['txtId']) && $_POST['numWithdrawlAmount'] !== ''){
        $adapter->withdraw($_POST['txtId'], $_POST['numWithdrawlAmount']);
    }

    elseif(isset($_POST['txtId']) && $_POST['numDepositAmount'] !== ''){
        $adapter->deposit($_POST['txtId'], $_POST['numDepositAmount']);
    }
    echo "Your Balance is ".$adapter->getCurrentBalance($_POST['txtId']);
    echo "<br><a href='application.html'>Withdraw/Deposit again</a>";
}


?>