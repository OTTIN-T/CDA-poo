<?php

namespace Mii\Invoice;


class Kernel
{
    public function __construct()
    {
        session_start();
        $this->handlRequest();
    }

    public function handlRequest()
    {
        require_once __DIR__ . "/../config/routes.php";

        $uri = mb_split("\?", $_SERVER['REQUEST_URI'])[0];

        if ($uri !== '/') {
            $uri = rtrim($uri, '/');
        }

        $route = isset($routes[$uri]) ?
            $routes[$uri] :
            $routes['/404'];

        $method = $route['method'];
        $controller = new $route['controller'];

        $controller->$method();
    }
}
