<?php

/**
 * This is a Router Class of the framework
 */
namespace Core;


class Router
{
	protected $route = [];
	protected $params = [];

	public function add($route, $params = []){
		$route = preg_replace('/\//', '\\/', $route);
		$route = preg_replace('/\{([a-z-]+)\}/', '(?<\1>[a-z-]+)', $route);
		$route = preg_replace('/\{([a-z-]+):([^\}]+)\}/', '(?<\1>\2)', $route);
		$route = '/^'.$route.'$/i';

		$this->routes[$route] = $params;
	}

	
	public function dispatch($url){
        $url = $this->removeQueryStringVariables($url);

        if($this->match($url)){
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            // $controller = "App\Controllers\\$controller";
            $controller = $this->getNamespace().$controller;

            if(class_exists($controller)){
                $controller_object = new $controller($this->params);

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);
                if(is_callable([$controller_object, $action])){
                    $controller_object->$action();
                }
            }
            else{
                echo $controller." doesn't exists";
            }
        }
        else{
            echo "<br>No such URL exists:".$url;
        }
    }


	public function match($url){
		$url = $this->removeQueryStringVariables($url);
		foreach ($this->routes as $route => $params) {
			if(preg_match($route, $url, $matches)){
				foreach ($matches as $key => $match) {
					if(is_string($key)){
						$params[$key] = $match;
					}
				}
				$this->params = $params;
				return true;
			}
		}
		return false;
	}


	public function removeQueryStringVariables($url){
		if($url != ''){
			$parts = explode('&', $url, 2);

			if(strpos($parts[0], '=') === false){
				$url = $parts[0];
			}
			else{
				$url = '';
			}
		}
		return $url;
	}


	public function convertToStudlyCaps($string){
		return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
	}

	public function convertToCamelCase($string){
		return lcfirst($this->convertToStudlyCaps($string));
	}

	public function getNamespace(){
		$namespace = "App\Controllers\\";

		if(array_key_exists('namespace', $this->params)){
			$namespace = "App\Controllers\Admin\\";
		}
		return $namespace;
	}
}

?>