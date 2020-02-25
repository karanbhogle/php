<?php

class Adapter
{
	protected $config = [
		'hostname' => '',
		'username' => '',
		'password' => '',
		'dbname' => '',
	];

	protected $connect;
	protected $query;


	public function insert($query){
		$result = $this->query($query);
	}

	public function query($query){
		if(!$this->isConnected()){
			$this->connect($this->getConfig());
		}

		$this->setQuery($query);
		return $this->getConnect()->query($this->getQuery());
	}

	public function connect($config){
		$connect = new mysqli($config['hostname'], $config['username'], $config['password'], $config['dbname']);
		$this->setConnect($connect);
	}





	public function setConfig($config){
		if (!is_array($config)) {
			throw new Exception("Config is not array");
		}

		$this->config = array_merge($this->config, $config);
		return $this;
	}

	public function getConfig(){
		return $this->config;
	}

	public function isConnected(){
		if(!$this->getConnect()){
			return false;
		}
		return true;
	}

	public function setConnect($connect){
		$this->connect = $connect;
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

$config = [
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'dbname' => 'test'
];

$adapter->setConfig($config);

$insertQuery = "INSERT INTO `user`(`user_firstname`) VALUES('dummy')";
$adapter->insert($insertQuery);

?>














$data = [
// 	'firstname' => 'Karan',
// 	'lastname' => 'Bhogle',
// 	'email' => 'kb@mail.com',
// 	'password' => '1',
// ];

// // $row->setData($data);