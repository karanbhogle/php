<?php
// Model :: Category
namespace App\Models\User;
use PDO;

class UserModel extends \Core\Model
{
	public static function isExistingUser($email, $password){
		try{
            $db = static::getDB();
            $loginQuery = "SELECT 
            					* 
            				FROM users WHERE user_email = '$email' AND user_password = '$password' ";
            $stmt = $db->query($loginQuery);

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if($stmt->rowCount() == 1){
            	return $results;
            }
            else{
            	return false;
            }
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
	}

	public static function isExistingVehicleNumber($vehicleNumber){
		try{
            $db = static::getDB();
            $existingVehicleQuery = "SELECT 
            					* 
            				FROM service_registrations WHERE  	service_registrations_vehiclenumber = '$vehicleNumber'";
            $stmt = $db->query($existingVehicleQuery);

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if($stmt->rowCount() == 1){
            	return $results;
            }
            else{
            	return false;
            }
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
	}



	public static function getSpecificVehicleServices(){
		try{
            $db = static::getDB();
            $existingVehicleQuery = "SELECT 
            					* 
            				FROM service_registrations WHERE user_id = '".$_SESSION['currentUser']."'";
            $stmt = $db->query($existingVehicleQuery);

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
            
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
	}



	public static function insertUserData($user){
		try{
            $db = static::getDB();

			$columns = array_keys($user);
        	$values = array_values($user);
	
			$columnString = implode(",", $columns);
	        $valueString = "'".implode("','",$values)."'";
	
        	$insertQuery = "INSERT INTO users(".$columnString.") VALUES(".$valueString.")";
        	
			$db->exec($insertQuery);
        	return $db->lastInsertId();

		}
		catch(PDOException $e){
            echo $e->getMessage();
        } 
	}

	public static function insertAddressData($address, $lastId){
		try{
            $db = static::getDB();

			$columns = array_keys($address);
        	$values = array_values($address);
	
			$columnString = implode(",", $columns);
	        $valueString = "'".implode("','",$values)."'";
	
        	$insertQuery = "INSERT INTO user_addresses(user_id,".$columnString.") VALUES($lastId,".$valueString.")";
        	
			$db->exec($insertQuery);
		}
		catch(PDOException $e){
            echo $e->getMessage();
        } 
	}

	public static function insertVehicleData($vehicle){
		try{
            $db = static::getDB();

			$columns = array_keys($vehicle);
        	$values = array_values($vehicle);
	
			$columnString = implode(",", $columns);
	        $valueString = "'".implode("','",$values)."'";
	
        	$insertQuery = "INSERT INTO service_registrations(".$columnString.") VALUES(".$valueString.")";

			$db->exec($insertQuery);

		}
		catch(PDOException $e){
            echo $e->getMessage();
        } 
	}
}

?>