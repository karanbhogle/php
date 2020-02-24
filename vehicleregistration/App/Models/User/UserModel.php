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


    public static function isTimeslotAvailable($date, $timeslot){
        try{
            $db = static::getDB();
            $timeslotQuery = "SELECT 
                                * 
                            FROM service_registrations WHERE service_registrations_date = '$date' AND service_registrations_timeslot = '$timeslot' ";
            $stmt = $db->query($timeslotQuery);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($stmt->rowCount() < 3){
                return true;
            }
            else{
                return false;
            }
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function updateVehicleServiceStatus($updateId, $status){
        try{
            $db = static::getDB();

            $updateQuery = "UPDATE service_registrations 
                            SET 
                                service_registrations_status = '".$status."' 
                            WHERE service_registrations_id = ".$updateId;

            $db->exec($updateQuery);

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

    public static function getSpecificVehicleServicesForUpdate($toBeUpdated){
        try{
            $db = static::getDB();
            $existingVehicleQuery = "SELECT 
                                * 
                            FROM service_registrations WHERE service_registrations_id = '".$toBeUpdated."'";
            $stmt = $db->query($existingVehicleQuery);

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
            
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function getAllVehicleServices(){
        try{
            $db = static::getDB();
            $existingVehicleQuery = "SELECT 
                                * 
                            FROM service_registrations";
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