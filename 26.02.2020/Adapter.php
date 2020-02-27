<?php

class Adapter
{
	protected $config = [];
	protected $connect;

	public function connect(){
		if(!$this->isConnected()){
			$this->setConnect($this->getConfig());
		}
	}

	public function isConnected(){
		if(!$this->getConnect()){
			return false;
		}
		return true;
	}



	public function query($query){
		$result = $this->getConnect()->query($query);
		if(!$result){
			return NULL;
		}
		return $result;
	}


	public function insertToDatabase($query){
		$this->query($query);
		return $this->getConnect()->insert_id;
	}

	public function updateDatabase($query){
		$this->query($query);
		return $this->getConnect()->affected_rows;
	}

	public function loadFromDatabase($query){
		$row = $this->query($query);
		if(!$row){
			return NULL;
		}
		return $row->fetch_assoc();
	}

	public function fetchRowFromDatabase($query){
		$row = $this->query($query);
		if(!$row){
			return NULL;
		}
		return $row->fetch_assoc();
	}

	public function fetchAllFromDatabase($tableName){
		$query = "SELECT * FROM `{$tableName}`";
		$rows = $this->query($query);

		if(!$rows){
			return NULL;
		}
		return $rows->fetch_all(MYSQLI_ASSOC);
	}


	//GETTER & SETTERS METHODS
	public function setConnect($config){
		$connect = new mysqli($config['hostname'], $config['username'], $config['password'], $config['dbname']);
		$this->connect = $connect;
		return $this;
	}

	public function getConnect(){
		return $this->connect;
	}

	public function setConfig($config){
		$this->config = array_merge($this->config, $config);
		return $this;
	}

	public function getConfig(){
		return $this->config;
	}
}
?>