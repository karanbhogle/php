<?php

namespace App\Controllers\Admin;
use \Core\View;

class Products extends \Core\Controller
{
	public function manageProductAction(){
		View::renderTemplate('Admin/Products/manage_product.html');
	}

	public function addAction(){
		View::renderTemplate('Admin/Products/add_product.html');
	}
}
?>