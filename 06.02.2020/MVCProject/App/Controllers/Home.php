<?php
namespace App\Controllers;

use \Core\View;
// Home Controller
class Home extends \Core\Controller{
    public function indexAction(){
        // echo "Hello from the Home Controller";
        // View::render('Home/index.php', ['name' => 'Dave', 'colors' => ['red', 'green', 'blue']]);

        View::renderTemplate('Home/index.html', ['name' => 'Dave', 'colors' => ['red', 'green', 'blue']]);
    }

    public function before(){
        echo "((before))";
    }

    public function after(){
        echo "((after))";
    }
}
?>