<?php

namespace Mii\Invoice\Controller;


use Mii\Framework\AbstractController;
use Mii\Invoice\Manager\ProductManager;

class ProductController extends AbstractController
{
     public function getProduct()
     {
          $productId = $_GET['id'];

          $product = (new ProductManager)->findOneBy($productId);

          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               (new ProductManager)->updateProduct($_POST, $productId);
               $product->setName($_POST['name']);
               $product->setPrice($_POST['price']);

               header('Location: ' . $_SERVER['REQUEST_URI']);
               exit;
          }

          $this->render('product/product.html', ["product" => $product]);
     }

     public function notFound()
     {
          echo "Not found";
     }
}
