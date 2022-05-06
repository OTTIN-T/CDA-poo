<?php

$routes = [
    "/" => [
        "controller" => "Mii\\Invoice\\Controller\\AppController",
        "method" => "home"
    ],
    "/product/edit" => [
        "controller" => "Mii\\Invoice\\Controller\\ProductController",
        "method" => "getProduct"
    ],
    "/cart/add" => [
        "controller" => "Mii\\Invoice\\Controller\\CartController",
        "method" => "add"
    ],
    "/cart" => [
        "controller" => "Mii\\Invoice\\Controller\\CartController",
        "method" => "show"
    ],
    "/invoice" => [
        "controller" => "Mii\\Invoice\\Controller\\InvoiceController",
        "method" => "billing"
    ],
    '/404' => [
        "controller" => "Mii\\Invoice\\Controller\\AppController",
        "method" => "notFound"
    ]
];
