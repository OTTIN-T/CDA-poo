<?php

namespace Mii\Invoice\Controller;


use Mii\Framework\AbstractController;
use Mii\Invoice\Manager\ProductManager;
use Mii\Invoice\Model\Cart;
use Mii\Invoice\Model\CartItem;
use Mii\Invoice\Service\CartService;
use Mii\Invoice\Service\SessionStorage;

class CartController extends AbstractController
{
     public function add()
     {
          if (
               strtolower($_SERVER["REQUEST_METHOD"]) !== "post" ||
               (!isset($_POST["product"]) && $_POST["product"] !== "")
          ) {
               header('Location: /404');
               exit;
          }

          $product = (new ProductManager)->findOneBy($_POST["product"]);

          $cartService = new CartService;
          $cart = $cartService->get();
          $cartItem = new CartItem();
          $cartItem->setProduct($product);
          $cartItem->setQuantity(1);

          // $total = 0;
          $cart->addCartItem($cartItem);


          $cartService->update($cart);

          header('Location: /');
          exit;
     }

     public function show()
     {
          $cartService = new CartService;
          $cart = $cartService->get();
          $total = 0;
          foreach ($cart->getCartItems() as $item) {
               $total += $item->getProduct()->getPrice();
          }
          $cart->setTotal($total);
          $this->render('cart/cart.html', ["cart" =>  $cart]);
     }
}
