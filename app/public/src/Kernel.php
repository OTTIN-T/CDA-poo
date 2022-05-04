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

          $uri = $_SERVER['REQUEST_URI'];

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
