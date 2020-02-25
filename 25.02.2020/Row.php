<?php

require_once 'Adapter.php';

class Row extends Adapter
{
	public $tableName = NULL;
	public $primaryKey = NULL;
	protected $rowChange = 0;
	protected $data = [];

	public function __set($name, $value){
		$this->data[$name] = $value;
		if($name == "user_id"){
			$this->primaryKey = $value;
		}
	}

	public function insert(){
		$fieldString = $this->getFieldStringFromData();
		$valueString = $this->getValueStringFromData();

		$tableName = $this->getTableName();

		echo $insertQuery = "INSERT INTO `".$tableName."`($fieldString) VALUES($valueString)";
		$this->query($insertQuery);
		$last_id = $this->getConnect()->insert_id;
		$this->setPrimaryKey($last_id);
		$this->load($this->getPrimaryKey());
	}

	public function load($id){
		$this->data = [];
		$selectQuery = "SELECT * FROM `user` WHERE `user_id`=".$id;
		$result = $this->query($selectQuery);

		while ($row = $result->fetch_assoc()) {
			$this->data = $row;
		}
	}

	public function update(){
		$tableName = $this->getTableName();
		$setString = $this->getSetString();
		$updateQuery = "UPDATE ".$tableName." SET ".$setString." WHERE `user_id`=".$this->getPrimaryKey();
		$result = $this->query($updateQuery);
	}

	public function getFieldStringFromData(){
		return $fieldString = "`".implode("`, `", array_keys($this->getData()))."`";
	}

	public function getValueStringFromData(){
		return $valueString = "'".implode("', '", array_values($this->getData()))."'";
	}

	public function getSetString(){
		$data = $this->getData();
		$setString = "";
		foreach ($data as $key => $value) {
			if($key == "user_id"){
				continue;
			}
			$setString .= "`$key`"."='".$value."',";
		}
		return substr($setString, 0, -1);
	}

	//GETTERS AND SETTERS BELOW
	public function getData(){
		return $this->data;
	}

	public function setData($data){
		$this->data = $data;
		return $this;
	}

	public function getTableName(){
		return $this->tableName;
	}

	public function setTableName($tableName){
		$this->tableName = $tableName;
		return $this;
	}

	public function getPrimaryKey(){
		return $this->primaryKey;
	}

	public function setPrimaryKey($primaryKey){
		$this->primaryKey = $primaryKey;
		return $this;
	}

	public function getRowChange(){
		return $this->rowChange;
	}

	public function setRowChange($rowChange){
		$this->rowChange = $rowChange;
		return $this;
	}
}

$row = new Row();
echo "<pre>";
	
$config = [
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'dbname' => 'test'
];
$row->setConfig($config);


$row->tableName = "user";

$row->user_firstname = "Hello123";
$row->user_lastname = "World456";
$row->user_email = "helloword@mail.com";
// $row->insert();


$row->tableName = "user";
$row->user_id = 12;
$row->user_firstname = "Hello";
$row->user_lastname = "World";
$row->update();
print_r($row);


?>