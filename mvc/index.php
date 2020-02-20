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
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router->add('admin/{controller}/{action}/{id:\d+}', ['namespace' => 'Admin']);

$router->add('admin/cms/{controller}', ['namespace' => 'Admin\Cms', 'action'
=> 'index']); $router->add('admin/cms/{controller}/{action}', ['namespace' =>
'Admin\Cms']);
$router->add('admin/cms/{controller}/{action}/{id}/{value:\d+}', ['namespace'
=> 'Admin\Cms']);

$router->add('{controller}/{action}/{value:[a-z0-9-]+}');

$router->add('{controller}/{action}');
$router->add('{controller}/{action}/{id:\d+}');
$router->add('{controller}', ['action' => 'index']);


$url = $_SERVER['QUERY_STRING'];

$router->dispatch($url);

?>