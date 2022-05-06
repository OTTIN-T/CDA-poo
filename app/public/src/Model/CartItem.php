<?php

namespace Mii\Invoice\Model;

use Mii\Framework\AbstractModel;

class CartItem extends AbstractModel
{
     private $product;

     private $quantity = 0;

     public function getProduct()
     {
          return $this->product;
     }

     public function setProduct($product)
     {
          $this->product = $product;

          return $this;
     }

     public function getQuantity()
     {
          return $this->quantity;
     }

     public function setQuantity($quantity)
     {
          $this->quantity = $quantity;

          return $this;
     }
}
