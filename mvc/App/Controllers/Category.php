<?php

namespace App\Controllers;
use \Core\View;
use App\Models\Admin\CategoryModel;
use App\Models\Admin\Page;

class Category extends \Core\Controller
{
	public function viewAction(){

		$data = CategoryModel::getProductsBasedOnCategory($this->route_params['value']);		

		$allCategories = CategoryModel::getAllCategories();
		$allCategories = CategoryModel::getCategoryWithStatus($allCategories);
		$allCategories = CategoryModel::getCategoryWithParentCategory($allCategories);

		if(isset($_SESSION['currentUser'])){
			$currentUser = $_SESSION['currentUser'];
		}
		else{
			$currentUser = "";
		}

		$allPages = Page::getAllPages();
		$parentCategories = CategoryModel::getAllParentCategories();

		View::renderTemplate("User/display_products.html",
		[	
			'base_url' => $_SESSION['base_url'],
			'allCategories' => $allCategories,
			'allParentCategories' => $parentCategories,
			'allCategoryProducts' => $data,
			'allPages' => $allPages,
			'currentUser' => $currentUser
		]);

	}

	
}
?>