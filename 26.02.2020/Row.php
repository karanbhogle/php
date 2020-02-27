<?php

require_once 'Adapter.php';

class Row
{
	public $tableName;
	public $primaryKeyField;
	public $primaryKeyValue;
	protected $data = [];
	protected $rowChanged;
	protected $adapter;


	//MAGIC METHODS
	public function __construct(){
		$adapter = new Adapter();
		$this->setAdapter($adapter);

		$config = [
			'hostname' => 'localhost',
			'username' => 'root',
			'password' => '',
			'dbname' => 'test'
		];
		$this->getAdapter()->setConfig($config);
		$this->getAdapter()->connect();
	}

	public function __set($key, $value){
		$this->data[$key] = $value;
	}


	public function insert(){
		$data = $this->getData();

		// $data = array_map(array[this,'getEscapedString'], $data);
		foreach ($data as $key => $value) {
			$data[$key] = $this->getAdapter()->getConnect()->real_escape_string($value);
		}

		$fieldString = "`".implode("`, `", array_keys($data))."`";
		$valueString = "'".implode("', '", array_values($data))."'";

		$insertQuery = "INSERT INTO `{$this->getTableName()}`($fieldString) VALUES($valueString);";
		$last_id = $this->getAdapter()->insertToDatabase($insertQuery);
		$this->setPrimaryKeyValue($last_id);
		$this->load($this->getPrimaryKeyValue());
	}

	public function update($id){
		$data = $this->getData();
		$updateString = "";
		// $data = array_map(array[this,'getEscapedString'], $data);
		foreach ($data as $key => $value) {
			$value = $this->getAdapter()->getConnect()->real_escape_string($value);
			$updateString .= "`{$key}` = '{$value}',";
		}


		$updateString = substr($updateString, 0, -1);

		$updateQuery = "UPDATE `{$this->getTableName()}`
						SET {$updateString}
						WHERE `{$this->getPrimaryKeyField()}` = {$id};";

		$this->getAdapter()->updateDatabase($updateQuery);
		$this->setPrimaryKeyValue($id);
		$this->setRowChanged(true);
		$this->load($this->getPrimaryKeyValue());
	}

	public function load($id){
		$this->data = [];
		$loadQuery = "SELECT * FROM `{$this->getTableName()}`
							WHERE `{$this->getPrimaryKeyField()}` = ".$id;
		$data = $this->getAdapter()->loadFromDatabase($loadQuery);
		$this->setData($data);
	}

	public function fetchRow($query){
		$data = $this->getAdapter()->fetchRowFromDatabase($query);
		$this->setData($data);
		$this->setRowChanged(false);
	}

	public function fetchAll($tableName){
		$data = $this->getAdapter()->fetchAllFromDatabase($tableName);
		
		foreach ($data as $row => &$value) {
			$value = (new Row())->setData($value);
		}	
		$this->setData($data);
		$this->setRowChanged(false);
		$this->setTableName($tableName);
	}

	/*public function getEscapedString($element){
		echo $element;
	}*/


	//GETTER AND SETTER METHODS
	public function setAdapter($adapter){
		$this->adapter = $adapter;
		return $this;
	}

	public function getAdapter(){
		return $this->adapter;
	}

	public function setTableName($tableName){
		$this->tableName = $tableName;
		return $this;
	}

	public function getTableName(){
		return $this->tableName;
	}

	public function setPrimaryKeyField($primaryKeyField){
		$this->primaryKeyField = $primaryKeyField;
		return $this;
	}

	public function getPrimaryKeyField(){
		return $this->primaryKeyField;
	}

	public function setPrimaryKeyValue($primaryKeyValue){
		$this->primaryKeyValue = $primaryKeyValue;
		return $this;
	}

	public function getPrimaryKeyValue(){
		return $this->primaryKeyValue;
	}

	public function setData($data){
		$this->data = $data;
		return $this;
	}

	public function getData(){
		return $this->data;
	}

	public function setRowChanged($rowChanged){
		$this->rowChanged = $rowChanged;
		return $this;
	}

	public function getRowChanged(){
		return $this->rowChanged;
	}
}

echo "<pre>";
$row = new Row();


// $row->setTableName("product");
// $row->setPrimaryKeyField("product_id");
// $row->name = "Galaxy M'20";
// $row->price = 11000;
// $row->brand = "Samsung";
// $row->insert();



// $row->fetchRow("SELECT * FROM `product` WHERE `product_id` = 3");

// $row->fetchAll("product");



// $row->setTableName("product");
// $row->setPrimaryKeyField("product_id");
// $row->name = "Macbook Pro 13' Inch";
// $row->price = 120000;
// $row->brand = "Apple";
// $row->update($id = 2);

print_r($row);
?>