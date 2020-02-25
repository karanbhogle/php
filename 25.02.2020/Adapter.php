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

	public function connect($config){
		$connect = new mysqli($config['hostname'], $config['username'], $config['password'], $config['dbname']);
		$this->setConnect($connect);
	}

	public function query($query){
		if(!$this->isConnected()){
			$this->connect();
		}
		return $this->getConnect()->query($query);
	}

	public function setConfig($config){
		$this->config = array_merge($this->config, $config);
		$this->connect($this->getConfig());
		return $this;
	}

	public function getConfig(){
		return $this->config;
	}

	public function setConnect($connect){
		$this->connect = $connect;
		return $this;
	}

	public function getConnect(){
		return $this->connect;
	}

	public function isConnected(){
		if(!$this->getConnect()){
			return false;
		}
		return true;
	}
}


?>