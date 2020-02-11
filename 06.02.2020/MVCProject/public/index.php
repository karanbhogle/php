<?php

// This is a Front Controller

// require_once '../Core/Router.php';
// require_once '../App/Controllers/Posts.php';

require_once dirname(__DIR__).'/vendor/autoload.php';

spl_autoload_register(function ($class){
    $root = dirname(__DIR__);
    $file = $root.'/'.str_replace('\\', '/', $class).'.php';

    if(is_readable($file)){
        require $root.'/'.str_replace('\\', '/', $class).'.php';
    }
});

$router = new Core\Router();

$url = $_SERVER['QUERY_STRING'];

$router->add('', ['controller'=>'Home', 'action'=>'index']);
// $router->add('posts', ['controller'=>'Posts', 'action'=>'index']);
// $router->add('posts/new', ['controller'=>'Posts', 'action'=>'new']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
// $router->add('admin/{action}/{controller}');

// echo '<pre>';
// print_r($router->getRoutes());
// echo '</pre>';

$router->dispatch($url);

// if($router->match($url)){
//     echo '<pre>';
//     var_dump($router->getParams());
//     echo '</pre>';
// }
// else{
//     echo '<br>No route found for '.$url;
// }

?>