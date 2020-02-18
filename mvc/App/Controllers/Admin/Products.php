<?php

namespace App\Controllers\Admin;
use \Core\View;
use App\Models\Admin\Product;
use App\Models\Admin\Category;

class Products extends \Core\Controller
{
	public function addAction(){
		if(isset($_POST['btnSubmitProduct'])){
			if($txtProductName = Product::addProduct($_POST)){
				echo $txtProductName." inserted successfully";
			}
			else{
				echo "Product already exists!";
			}
		}
		$categories = Category::getAllCategories();
		View::renderTemplate('Admin/Products/add_product.html',
		[
			'name' => 'static',
			'base_url' => $_SESSION['base_url'],
			'allCategories' => @$categories
		]);
	}

	public function edit(){
		$toBeUpdated = $this->route_params['id'];
		
		$products = Product::getSpecificProduct($toBeUpdated);
		$categories = Category::getCategoryNames();
		$selectedCategories = Category::getSelectedCategories($toBeUpdated);

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
		
		Product::deleteProduct($toBeDeleted);
		header("location:http://localhost/cybercom/extra/mvc/admin/products");
	}

	public function update(){	
		if($txtProductName = Product::updateProduct($_POST)){
			echo $txtProductName." Updated successfully";
		}
		else{
			echo "Failed to Update Category. Try Again!";
		}
		header("location:http://localhost/cybercom/extra/mvc/admin/products");	
			
	}
}
?>