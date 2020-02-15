<?php

namespace App\Controllers\Admin;
use \Core\View;
use App\Models\Admin\Category;

class Categories extends \Core\Controller
{
	public function addAction(){
		if(isset($_POST['btnSubmitCategory'])){
			if($txtCategoryName = Category::addCategory($_POST)){
				echo $txtCategoryName." inserted successfully";
			}
			else{
				echo "Failed to insert Category. Try Again!";
			}
		View::renderTemplate('Admin/Categories/add_category.html');	
		}
		else{
			View::renderTemplate('Admin/Categories/add_category.html');	
		}
	}

	public function edit(){
		$toBeUpdated = $this->route_params['id'];
		
		$categories = Category::getSpecificCategories($toBeUpdated);
		View::renderTemplate("Admin/Categories/update_category.html",
		[
			'name' => 'static',
			'base_url' => $_SESSION['base_url'],
			'categories' => $categories
		]);
	}

	public function delete(){
		$toBeDeleted = $this->route_params['id'];
		
		Category::deleteCategory($toBeDeleted);
		$categories = Category::getAllCategories();
		View::renderTemplate("Admin/Categories/manage_category.html",
		[
			'name' => 'static',
			'base_url' => $_SESSION['base_url'],
			'categories' => $categories
		]);
	}

	public function update(){
		// echo "Update Called";
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";

		if($txtCategoryName = Category::updateCategory($_POST)){
			echo $txtCategoryName." Updated successfully";
		}
		else{
			echo "Failed to Update Category. Try Again!";
		}
		header("location:http://localhost/cybercom/extra/mvc/admin/categories");	
			
	}
}
?>