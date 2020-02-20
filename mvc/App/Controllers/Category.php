<?php

namespace App\Controllers;
use \Core\View;
use App\Models\Admin\CategoryModel;

class Category extends \Core\Controller
{
	public function viewAction(){

		$data = CategoryModel::getProductsBasedOnCategory($this->route_params['value']);		

		$allCategories = CategoryModel::getAllCategories();
		$allCategories = CategoryModel::getCategoryWithStatus($allCategories);
		$allCategories = CategoryModel::getCategoryWithParentCategory($allCategories);

		$parentCategories = CategoryModel::getAllParentCategories();

		View::renderTemplate("User/display_products.html",
		[	
			'base_url' => $_SESSION['base_url'],
			'allCategories' => $allCategories,
			'allParentCategories' => $parentCategories,
			'allCategoryProducts' => $data
		]);

	}

	
}
?>