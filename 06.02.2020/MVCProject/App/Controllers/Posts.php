<?php
namespace App\Controllers;

class Posts extends \Core\Controller{
    public function indexAction(){
        echo "Hello from the Post Page<br>";
        echo "<p>Query String Parameters:<pre>".
                htmlspecialchars(print_r($_GET, true)).
                "</pre></p>";
    }

    protected function addNewAction(){
        echo "addNew() method of Post Class is called";
    }

    protected function editAction(){
        echo 'edit() method of Post Class is called';
        echo '<p>Route Parameters: <pre>'.
                htmlspecialchars(print_r($this->route_params, true)).'</pre></p>';
    }

    
}
?>