<?php

// This is a Router Class
class Router{
    protected $routes = [];
    protected $params = [];

    // add routes to the routing table named '$routes'
    public function add($route, $params){
        $this->routes[$route] = $params;
    }

    public function getRoutes(){
        return $this->routes;
    }

    public function match($url){
        foreach($this->routes as $route => $params){
            if($url == $route){
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function getParams(){
        return $this->params;
    }
}
?>