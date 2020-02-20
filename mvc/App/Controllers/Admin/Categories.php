<?php

namespace App\Controllers\Admin;
use \Core\View;
use App\Models\Admin\CategoryModel;

class Categories extends \Core\Controller
{
	public function addAction(){
		if(isset($_POST['btnSubmitCategory'])){
			if($txtCategoryName = CategoryModel::addCategory($_POST)){
				echo $txtCategoryName." inserted successfully";
			}
			else{
				echo "Category already exists!";
			}
		}
		if(!$categoriesNames = CategoryModel::getCategoryNames()){
			$categoriesNames[0]['categories_id'] = 0;
			$categoriesNames[0]['categories_categoryname'] = 'No Category Available';
		}
		View::renderTemplate('Admin/Categories/add_category.html',
		[
			'name' => 'static',
			'base_url' => $_SESSION['base_url'],
			'allCategories' => $categoriesNames
		]);

	}

	public function edit(){
		$toBeUpdated = $this->route_params['id'];
		
		$categories = CategoryModel::getSpecificCategories($toBeUpdated);
		if(!$categoriesNames = CategoryModel::getCategoryNames()){
			$categoriesNames[0]['categories_id'] = 0;
			$categoriesNames[0]['categories_categoryname'] = 'No Category Available';
		}
		View::renderTemplate("Admin/Categories/update_category.html",
		[
			'name' => 'static',
			'base_url' => $_SESSION['base_url'],
			'categories' => $categories,
			'allCategories' => $categoriesNames
		]);
	}

	public function delete(){
		$toBeDeleted = $this->route_params['id'];
		
		CategoryModel::deleteCategory($toBeDeleted);
		header("location:http://localhost/cybercom/extra/mvc/admin/categories");
	}

	public function update(){
		
		if($txtCategoryName = CategoryModel::updateCategory($_POST)){
			echo $txtCategoryName." Updated successfully";
		}
		else{
			echo "Failed to Update Category. Try Again!";
		}
		header("location:http://localhost/cybercom/extra/mvc/admin/categories");	
			
	}
}
?>