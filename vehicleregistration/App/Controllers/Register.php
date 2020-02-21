<?php
namespace App\Controllers;
use Core\View;
use App\Models\User\UserModel;

/**
 * Register Controller
 */
class Register extends \Core\Controller
{
	public function user(){
		View::renderTemplate("User/user/user_register.html", [
				'base_url' => $_SESSION['base_url']
		]);
	}

	public function vehicle(){
		View::renderTemplate("User/user/user_vehicleregister.html", [
				'base_url' => $_SESSION['base_url']
		]);
	}








	public function userdata(){
		if(isset($_POST['btnRegister'])){
			$user = $this->getCleanUserArray();
			$address = $this->getCleanAddressArray();

			if(UserModel::isExistingUser($user['user_email'], $user['user_password'])){
				echo "User already exists with this email.";
				View::renderTemplate("User/user/user_register.html", [
					'base_url' => $_SESSION['base_url']
				]);
			}
			else{
				$lastId = UserModel::insertUserData($user);
				UserModel::insertAddressData($address, $lastId);
				header("location:".$_SESSION['base_url']);
			}
		}
		elseif($_SESSION['vehicleUser'] !== ""){
			echo $_SESSION['base_url'];
			header("location:".$_SESSION['base_url']);
		}
		else{
			header("location:".$_SESSION['base_url']);
		}
	}


	public function vehicledata(){
		if(isset($_POST['btnRegisterVehicle'])){
			$vehicle = $this->getCleanVehicleArray();

			if(UserModel::isExistingVehicleNumber($_POST['vehicle']['txtVehicleNumber'])){
				echo "Service request already made for this VehicleNumber.";
				View::renderTemplate("User/user/user_vehicleregister.html", [
					'base_url' => $_SESSION['base_url']
				]);
			}
			else{
				UserModel::insertVehicleData($vehicle);
				View::renderTemplate("User/user/user_homepage.html", [
					'base_url' => $_SESSION['base_url']
				]);
			}
		}
		elseif($_SESSION['vehicleUser'] !== NULL){
			echo $_SESSION['base_url'];
			header("location:".$_SESSION['base_url']);
		}
		else{
			header("location:".$_SESSION['base_url']);
		}
	}







	protected function getCleanUserArray(){
		$userKeys = ['user_firstname', 
					'user_lastname', 
					'user_email', 
					'user_password', 
					'user_phonenumber'];
    	$userValues = [$_POST['user']['txtFirstName'], 
    					$_POST['user']['txtLastName'], 
    					$_POST['user']['txtEmail'],
                      	$_POST['user']['txtPassword'], 
                      	$_POST['user']['txtPhoneNumber']];
    	return array_combine($userKeys, $userValues);
	}

	protected function getCleanVehicleArray(){
		$vehicleKeys = ['user_id',
						'service_registrations_title', 
						'service_registrations_vehiclenumber', 
						'service_registrations_userlicencenumber', 
						'service_registrations_date', 
						'service_registrations_timeslot', 
						'service_registrations_vehicleissue', 
						'service_registrations_servicecenter', 
						'service_registrations_status'];

    	$vehicleValues = [$_SESSION['currentUser'],
    					$_POST['vehicle']['txtTitle'], 
    					$_POST['vehicle']['txtVehicleNumber'],
    					$_POST['vehicle']['txtUserLicenceNumber'],
    					$_POST['vehicle']['date'],
    					$_POST['vehicle']['timeslot'],
    					$_POST['vehicle']['txtVehiceIssue'],
    					$_POST['vehicle']['txtServiceCenter'],
                      	"Pending"];
    	return array_combine($vehicleKeys, $vehicleValues);
	}

	protected function getCleanAddressArray(){
		$addressKeys = ['user_addresses_street', 
						'user_addresses_city', 
						'user_addresses_state', 
						'user_addresses_zipcode', 
						'user_addresses_country'];
    	$addressValues = [$_POST['address']['txtStreet'], 
    					$_POST['address']['txtCity'], 
    					$_POST['address']['txtState'],
                      	$_POST['address']['txtZipCode'], 
                      	$_POST['address']['txtCountry']];
    	return array_combine($addressKeys, $addressValues);
	}
}

?>