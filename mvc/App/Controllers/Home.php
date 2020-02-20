<?php
namespace App\Controllers;
use Core\View;
use App\Models\Admin\CategoryModel;
use App\Models\Admin\Page;
use App\Models\UserModel;

/**
 * Controller : Home
 */	
class Home extends \Core\Controller
{
	public function indexAction(){
		
		$allCategories = CategoryModel::getAllCategories();
		$allCategories = CategoryModel::getCategoryWithStatus($allCategories);
		$allCategories = CategoryModel::getCategoryWithParentCategory($allCategories);
		$allPages = Page::getAllPages();

		$parentCategories = CategoryModel::getAllParentCategories();
		
		if(isset($_SESSION['currentUser'])){
			$currentUser = $_SESSION['currentUser'];
		}
		else{
			$currentUser = "";
		}

		View::renderTemplate("User/home.html",
		[	
			'base_url' => $_SESSION['base_url'],
			'allCategories' => $allCategories,
			'allParentCategories' => $parentCategories,
			'allPages' => $allPages,
			'currentUser' => $currentUser
		]);
	}

	public function showAction(){
		$allCategories = CategoryModel::getAllCategories();
		$allCategories = CategoryModel::getCategoryWithStatus($allCategories);
		$allCategories = CategoryModel::getCategoryWithParentCategory($allCategories);
		
		$parentCategories = CategoryModel::getAllParentCategories();

		$page = Page::getSpecificPageWithURLKey($this->route_params['value']);
		$allPages = Page::getAllPages();

		View::renderTemplate("User/display_cms_page.html",
		[	
			'base_url' => $_SESSION['base_url'],
			'page' => $page,
			'allCategories' => $allCategories,
			'allParentCategories' => $parentCategories,
			'allPages' => $allPages
		]);	
	}

	public function loginAction(){
		if(@$_SESSION['currentUser'] === null){
			View::renderTemplate("User/user_login.html", ['currentUser' => ""]);
		}
		else{
			header("location:".$_SESSION['base_url']);
		}
	}

	public function loginCheckerAction(){
		@$email = $_POST['txtEmail'];
		@$password = md5($_POST['txtEmail']);

		if($loggedUser = UserModel::checkUser($email, $password)){

			$_SESSION['loggedUser'] = $loggedUser;
			$_SESSION['currentUser'] = @$loggedUser[0]['user_firstname'];
			$currentUser = $_SESSION['currentUser'];

			$allCategories = CategoryModel::getAllCategories();
			$allCategories = CategoryModel::getCategoryWithStatus($allCategories);
			$allCategories = CategoryModel::getCategoryWithParentCategory($allCategories);
		
			$parentCategories = CategoryModel::getAllParentCategories();

			$page = Page::getSpecificPageWithURLKey(@$this->route_params['value']);
			$allPages = Page::getAllPages();
		
			if(isset($_SESSION['currentUser'])){
				$currentUser = $_SESSION['currentUser'];
			}
			else{
				$currentUser = "";
			}

			View::renderTemplate("User/home.html",
			[	
				'base_url' => $_SESSION['base_url'],
				'allCategories' => @$allCategories,
				'allParentCategories' => @$parentCategories,
				'allPages' => @$allPages,
				'loggedUser' => @$loggedUser,
				'currentUser' => $currentUser
			]);
		}
		else{
			echo "Please Check your Login Credentials";
			View::renderTemplate("User/user_login.html", ['currentUser' => ""]);
		}
	}

	public function logoutAction(){
		$_SESSION['loggedUser'] = "";
		$_SESSION['currentUser'] = "";

		$allCategories = CategoryModel::getAllCategories();
		$allCategories = CategoryModel::getCategoryWithStatus($allCategories);
		$allCategories = CategoryModel::getCategoryWithParentCategory($allCategories);
		
		$parentCategories = CategoryModel::getAllParentCategories();

		$page = Page::getSpecificPageWithURLKey(@$this->route_params['value']);
		$allPages = Page::getAllPages();

		$currentUser = "";

		View::renderTemplate("User/home.html", 
		[	
				'base_url' => $_SESSION['base_url'],
				'allCategories' => @$allCategories,
				'allParentCategories' => @$parentCategories,
				'allPages' => @$allPages,
				'loggedUser' => @$loggedUser,
				'currentUser' => @$loggedUser[0]['user_firstname']
		]);
	}
}

?>