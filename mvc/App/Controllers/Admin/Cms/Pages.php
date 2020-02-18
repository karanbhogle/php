<?php

namespace App\Controllers\Admin\Cms;
use \Core\View;
use App\Models\Admin\Page;

class Pages extends \Core\Controller
{
	public function indexAction(){
		$pages = Page::getAllPages();
		$pages = Page::getPagesWithStatus($pages);

		View::renderTemplate('Admin/Cms/manage_cms.html',
		[
			'name' => 'static',
			'base_url' => $_SESSION['base_url'],
			'allPages' => $pages
		]);
	}

	public function addAction(){
		if(isset($_POST['btnSubmitCMS'])){
			if($txtPageTitle = Page::addPage($_POST)){
				echo $txtPageTitle." inserted successfully";
			}
			else{
				echo "Page already exists!";
			}
		}
		View::renderTemplate('Admin/Cms/add_cms.html',
		[
			'name' => 'static',
			'base_url' => $_SESSION['base_url']
		]);
	}

	public function editAction(){
		$toBeUpdated = $this->route_params['value'];
		$pages = Page::getSpecificPage($toBeUpdated);
		
		View::renderTemplate("Admin/Cms/update_cms.html",
		[
			'name' => 'static',
			'base_url' => $_SESSION['base_url'],
			'allPages' => $pages
		]);
	}

	public function deleteAction(){
		$toBeDeleted = $this->route_params['value'];
		$pages = Page::deletePage($toBeDeleted);
		
		header("location:http://localhost/cybercom/extra/mvc/admin/cms/pages");
	}

	public function update(){
		if($txtPageTitle = Page::updatePage($_POST)){
			echo $txtPageTitle." Updated successfully";
		}
		else{
			echo "Failed to Update Page. Try Again!";
		}
		header("location:http://localhost/cybercom/extra/mvc/admin/cms/pages");
	}
}
?>