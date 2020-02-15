<?php

// This is a Core Controller

namespace Core;
abstract class Controller
{
	protected $route_params;

	public function __construct($route_params){
		$this->route_params = $route_params;
	}

	public function __call($name, $args){

		$method = $name."Action";
		if(method_exists($this, $method)){
			call_user_func_array([$this, $method], $args);
		}
		else{
			echo "Please check your URL for mistakes";
		}
	}

}

?>