<?php
// List Of Methods

/*connectToDB
isConnected
insert
select
update
delete 
fetchOne
fetchRow 
fetchAll 
fetchPair*/

class DatabaseAdapter
{
	private $hostname = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "test";
	private $dbh;

	public function connectToDB(){
		$this->dbh = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname);
	}

	public function isConnected(){
		if($this->dbh){
			return true;
		}
		else{
			return false;
		}
	}

	public function insertData($insertQuery){
		$result = mysqli_query($this->dbh, $insertQuery);
		return $result;
	}

	public function fetchAll($selectQuery){
		$result = mysqli_query($this->dbh, $selectQuery);
		$noOfRows = mysqli_num_rows($result);

		if($noOfRows > 0){
			return $result;
		}
		else{
			return NULL;
		}
	}

	public function updateData($updateQuery){
		$result = mysqli_query($this->dbh, $updateQuery);
		return $result;
	}
}




//connect to database
$dbObj = new DatabaseAdapter();
$dbObj -> connectToDB();



//check connection
$dbStatus = $dbObj -> isConnected();
echo "<br>DB Connection Status: ".$dbStatus;



// INSERT QUERY
$insertQuery = "INSERT INTO user(
						user_firstname, 
						user_lastname, 
						user_email) 
				VALUES(
						'kevin',
						'shah',
						'kevin@mail.com')";
//$result = $dbObj -> insertData($insertQuery);
//echo "<br>Insert Successful? : ".$result;


//SELECT QUERY
$selectQuery = "SELECT * FROM user";
$result = $dbObj -> fetchAll($selectQuery);
if(isset($result)){
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<br>".$row['user_firstname'];
	}
}
else{
	echo "<br>Returned Result set has no values";
}



//UPDATE QUERY
$updateQuery = "UPDATE user
				SET 
					user_firstname = 'manan'
				WHERE user_firstname = 'manam'";
$result = $dbObj -> updateData($updateQuery);
echo "<br>Update Successful? :".$result;

?>