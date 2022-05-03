<?php

namespace Mii\Invoice;

class Kernel
{
     public function __construct()
     {
          $this->handleRequest();
     }

     public function handleRequest()
     {
          require_once __DIR__ . '/../config/routes.php';

          $route = isset($routes[$_SERVER['REQUEST_URI']]) ?
               $routes[$_SERVER['REQUEST_URI']] :
               $routes['/404'];

          $method = $route['method'];
          $controller = new $route['controller'];

          $controller->$method();
     }
}
