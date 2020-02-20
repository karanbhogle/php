<?php
namespace App\Controllers;
use Core\View;
use App\Models\Admin\CategoryModel;

/**
 * Controller : Home
 */	
class Home extends \Core\Controller
{
	public function indexAction(){
		
		$allCategories = CategoryModel::getAllCategories();
		$allCategories = CategoryModel::getCategoryWithStatus($allCategories);
		$allCategories = CategoryModel::getCategoryWithParentCategory($allCategories);

		$parentCategories = CategoryModel::getAllParentCategories();

		View::renderTemplate("User/home.html",
		[	
			'base_url' => $_SESSION['base_url'],
			'allCategories' => $allCategories,
			'allParentCategories' => $parentCategories
		]);
	}

	public function checkAction(){
		echo "Cfasdf";
	}
}

?>