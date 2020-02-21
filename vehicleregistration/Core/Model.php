<?php

/*
	Core :: MODEL
*/

namespace Core;
use PDO;

abstract class Model
{
	protected static function getDB(){
			$host = "localhost";
			$dbname = "vehicleregistration";
			$username = "root";
			$password = "";
		try{
			$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
			return $db;
		}
		catch(PDOException $e){
			echo 'Error connecting to Database';
		}
	}
}
?>