<?php

namespace Mii\Invoice\Service;

use Mii\Invoice\Model\Cart;

class CartService
{
     private $sessionStorage;
     public function __construct()
     {
          $this->sessionStorage = new SessionStorage;
          $cartFromSession = $this->sessionStorage->get(Cart::CART);
          if ($cartFromSession === null) {
               $this->sessionStorage->add(Cart::CART, new Cart);
          }
     }

     /**
      * Get the value of cart
      */
     public function get()
     {
          return clone $this->sessionStorage->get(Cart::CART);
     }

     public function update(Cart $cart)
     {
          $this->sessionStorage->add(Cart::CART, $cart);
     }

     public function getCount()
     {
          return count($this->sessionStorage->get(Cart::CART)->getCartItems());
     }

     public function reset()
     {
          $this->sessionStorage->add(Cart::CART, new Cart());
     }
}
