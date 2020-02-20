<?php

namespace App\Controllers\Admin;
use \Core\View;
use App\Models\Admin\ProductModel;
use App\Models\Admin\CategoryModel;

class Products extends \Core\Controller
{
	public function addAction(){
		if(isset($_POST['btnSubmitProduct'])){
			if($txtProductName = ProductModel::addProduct($_POST)){
				echo $txtProductName." inserted successfully";
			}
			else{
				echo "Product already exists!";
			}
		}
		$categories = CategoryModel::getAllCategories();
		View::renderTemplate('Admin/Products/add_product.html',
		[
			'name' => 'static',
			'base_url' => $_SESSION['base_url'],
			'allCategories' => @$categories
		]);
	}

	public function edit(){
		$toBeUpdated = $this->route_params['id'];
		
		$products = ProductModel::getSpecificProduct($toBeUpdated);
		$categories = CategoryModel::getCategoryNames();
		$selectedCategories = CategoryModel::getSelectedCategories($toBeUpdated);

		View::renderTemplate("Admin/Products/update_product.html",
		[
			'name' => 'static',
			'base_url' => $_SESSION['base_url'],
			'allProducts' => $products,
			'allCategories' => $categories,
			'selectedCategories' => $selectedCategories
		]);
	}

	public function delete(){
		$toBeDeleted = $this->route_params['id'];
		
		ProductModel::deleteProduct($toBeDeleted);
		header("location:http://localhost/cybercom/extra/mvc/admin/products");
	}

	public function update(){	
		if($txtProductName = ProductModel::updateProduct($_POST)){
			echo $txtProductName." Updated successfully";
		}
		else{
			echo "Failed to Update Category. Try Again!";
		}
		header("location:http://localhost/cybercom/extra/mvc/admin/products");	
			
	}
}
?>