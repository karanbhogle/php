<?php

// This is a Router Class
class Router{
    protected $routes = [];
    protected $params = [];

    // add routes to the routing table named '$routes'
    public function add($route, $params){
        $route = preg_replace('/\//', '\\', $route);
        $route = preg_replace('/\{([a-z]+)\}/', '(?<\1>[a-z-]+)', $route);
        $route = '/^'.$route.'$/i';

        $this->routes[$route] = $params;
    }

    public function getRoutes(){
        return $this->routes;
    }

    public function match($url){
        $regex = "/^(?<controller>[a-z-]+)\/(?<action>[a-z-]+)$/";
        if(preg_match($regex, $url, $matches)){
            foreach($matches as $key => $match){
                if(is_string($key)){
                   $params[$key] = $match;
                }
            }
            $this->params = $params;
            return true;
        }
        return false;
    }

    public function getParams(){
        return $this->params;
    }
}
?>