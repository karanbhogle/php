<?php
session_start();
// this is a front controller
require_once 'vendor/autoload.php';

spl_autoload_register(function ($class){
	//$root = dirname(__DIR__);
	$file = str_replace('\\', '/', $class).'.php';
	if(is_readable($file)){
		require_once str_replace('\\', '/', $class).'.php';
	}
});
$_SESSION['base_url'] = "http://localhost/cybercom/extra/mvc/";

$router = new Core\Router();

$router->add('', ['controller' => 'home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router->add('{controller}/{action}/{id:\d+}');
$router->add('admin/{controller}/{action}/{id:\d+}', ['namespace' => 'Admin']);

$url = $_SERVER['QUERY_STRING'];

$router->dispatch($url);

?>