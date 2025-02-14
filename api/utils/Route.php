<?php

namespace utils;

use Exception;

class Route
{
    private $path;
    private $controller;
    private $action;
    private $method;
    private array $params;

    public function __construct($route){
        $this->path = $route->path;
        $this->controller = $route->controller;
        $this->action = $route->action;
        $this->method = $route->method;
        $this->params = $route->params;
    }

    public function getPath(){
        return $this->path;
    }

    public function getController(){
        return $this->controller;
    }

    public function getAction(){
        return $this->action;
    }

    public function getMethod(){
        return $this->method;
    }

    public function getParams(): array {
        return $this->params;
    }

    /**
     * @throws Exception
     */
    public function run($httpRequest, $config){
        $controllerName = "{$this->controller}Controller";
        if(class_exists($controllerName)){
            $controller = new $controllerName($httpRequest, $config);
            if(method_exists($controller, $this->action)){
                $controller->{$this->action}(...$httpRequest->getParams());
            }else{
                throw new Exception("La méthode n'existe pas.");
            }
        }else{
            throw new Exception("La classe n'existe pas.");
        }
    }

}