<?php

namespace App\Controllers;
use \Core\View;
use App\Models\Admin\ProductModel;
use App\Models\Admin\CategoryModel;

class Product extends \Core\Controller
{
	public function viewAction(){
		
		$data = ProductModel::getProductDetails($this->route_params['value']);		
		$data = ProductModel::getProductWithStatus($data);		

		$allCategories = CategoryModel::getAllCategories();
		$allCategories = CategoryModel::getCategoryWithStatus($allCategories);
		$allCategories = CategoryModel::getCategoryWithParentCategory($allCategories);

		$parentCategories = CategoryModel::getAllParentCategories();

		View::renderTemplate("User/display_product_details.html",
		[	
			'base_url' => $_SESSION['base_url'],
			'allCategories' => $allCategories,
			'allParentCategories' => $parentCategories,
			'specificProductDetails' => $data
		]);
	}

	
}
?>