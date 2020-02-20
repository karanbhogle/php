<?php

namespace App\Controllers;
use \Core\View;
use App\Models\Admin\CategoryModel;
use App\Models\Admin\ProductModel;

class Admin extends \Core\Controller
{
	public function loginAction(){
		if(@$_SESSION['user'] === null){
			View::renderTemplate("Admin/login.html");
		}
		else{
			View::renderTemplate("Admin/dashboard.html");
		}
	}

	public function loginChecker(){
		if(@$_SESSION['user'] != null){
			if(@$_SESSION['user'] === "admin"){
				View::renderTemplate("Admin/dashboard.html");
			}
		}
		else{
			if(isset($_POST['btnLogin'])){
				if(isset($_POST['txtEmail']) && !empty($_POST['txtEmail'])
					&& isset($_POST['txtPassword']) && !empty($_POST['txtPassword']) ){

					if($_POST['txtEmail'] === "admin" && $_POST['txtPassword'] === "1"){
						@$_SESSION['user'] = $_POST['txtEmail'];
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
		if(@$_SESSION['user'] === "admin"){
			View::renderTemplate("Admin/dashboard.html", ['base_url' => $_SESSION['base_url']]);
		}	
		else{
			echo "Provide Admin login credentials first";
			View::renderTemplate("Admin/login.html");
		}

	}

	public function products(){
		if(@$_SESSION['user'] === "admin"){
			$products = ProductModel::getAllProducts();
			$products = ProductModel::getProductWithStatus($products);

			View::renderTemplate("Admin/Products/manage_product.html",
			[
				'name' => 'static',
				'base_url' => @$_SESSION['base_url'],
				'allProducts' => $products,
				'allCategories' => @$categories
			]);
		}	
		else{
			echo "Provide Admin login credentials first";
			View::renderTemplate("Admin/login.html");
		}
	}

	public function categories(){
		if(@$_SESSION['user'] === "admin"){
			$categories = CategoryModel::getAllCategories();
			$categories = CategoryModel::getCategoryWithStatus($categories);
			$categories = CategoryModel::getCategoryWithParentCategory($categories);

			View::renderTemplate("Admin/Categories/manage_category.html",
			[
				'name' => 'static',
				'base_url' => @$_SESSION['base_url'],
				'allCategories' => $categories
			]);
		}	
		else{
			echo "Provide Admin login credentials first";
			View::renderTemplate("Admin/login.html");
		}
	}

	public function logout(){
		if(@$_SESSION['user'] === "admin"){
			session_destroy();	
		}	
		header("location:http://localhost/cybercom/extra/mvc/admin/login");	
	}

}

?>