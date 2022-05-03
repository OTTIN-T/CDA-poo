<?php

$routes = [
     "/" => [
          "controller" => "Mii\\Invoice\\Controller\\AppController",
          "method" => "home"
     ],
     "/invoice" => [
          "controller" => "Mii\\Invoice\\Controller\\AppController",
          "method" => "billing"
     ],
     "/404" => [
          "controller" => "Mii\\Invoice\\Controller\\AppController",
          "method" => "notFound"
     ]
];
