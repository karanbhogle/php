<?php

namespace App\Controllers;
use \Core\View;
use App\Models\Admin\Category;

class Admin extends \Core\Controller
{
	public function loginAction(){
		if(!isset($_SESSION['user'])){
			View::renderTemplate("Admin/login.html");
		}
		else{
			View::renderTemplate("Admin/dashboard.html");
		}
	}

	public function loginChecker(){
		if(isset($_SESSION['user'])){
			if($_SESSION['user'] === "admin"){
				View::renderTemplate("Admin/dashboard.html");
			}
		}
		else{
			if(isset($_POST['btnLogin'])){
				if(isset($_POST['txtEmail']) && !empty($_POST['txtEmail'])
					&& isset($_POST['txtPassword']) && !empty($_POST['txtPassword']) ){

					if($_POST['txtEmail'] === "admin" && $_POST['txtPassword'] === "1"){
						$_SESSION['user'] = $_POST['txtEmail'];
						header("location:http://localhost/cybercom/extra/mvc/admin/dashboard");
					}
				}
				else{
					echo "Enter Valid Details";
					View::renderTemplate("Admin/login.html");
				}
			}
			echo "Enter Valid Details";
			View::renderTemplate("Admin/login.html");
		}
	}

	public function dashboard(){
		echo "Welcome, ".$_SESSION['user'];
		View::renderTemplate("Admin/dashboard.html");
	}

	public function products(){
		View::renderTemplate("Admin/Products/manage_product.html");
	}

	public function categories(){

		$categories = Category::getAllCategories();
		echo "before Status";
		$categories = Category::getCategoryWithStatus($categories);

		View::renderTemplate("Admin/Categories/manage_category.html",
		[
			'name' => 'static',
			'base_url' => $_SESSION['base_url'],
			'categories' => $categories
		]);
	}

}

?>