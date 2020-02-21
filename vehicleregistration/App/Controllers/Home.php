<?php
namespace App\Controllers;
use Core\View;
use App\Models\User\UserModel;
/**
 * Controller : Home
 */	
class Home extends \Core\Controller
{
	public function indexAction(){

		if($_SESSION['currentUser'] !== NULL){
			$allVehicleServices = UserModel::getSpecificVehicleServices();

			View::renderTemplate("User/user/user_homepage.html", [
				'base_url' => $_SESSION['base_url'],
				'allVehicleServices' => $allVehicleServices
			]);
		}
		else{
			View::renderTemplate("User/user/user_login.html", [
				'base_url' => $_SESSION['base_url']
			]);
		}
	}

	public function loginChecker(){
		if($currentUser = UserModel::isExistingUser(@$_POST['txtUserEmail'], @$_POST['txtUserPassword'])){
			$_SESSION['currentUser'] = $currentUser[0]['user_id'];
			header("location:".$_SESSION['base_url']."home/vehicleservices");
		}
		else{
			View::renderTemplate("User/user/user_login.html", [
				'base_url' => $_SESSION['base_url']
			]);
		}
	}

	public function vehicleservices(){
			$allVehicleServices = UserModel::getSpecificVehicleServices();

			View::renderTemplate("User/user/user_homepage.html", [
				'base_url' => $_SESSION['base_url'],
				'allVehicleServices' => $allVehicleServices
			]);
	}
}

?>