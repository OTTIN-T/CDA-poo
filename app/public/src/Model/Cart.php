<?php

namespace Mii\Invoice\Model;

use Mii\Framework\AbstractModel;
use Mii\Invoice\Service\FlashService;
use Mii\Invoice\Service\SessionStorage;

class Cart extends AbstractModel
{
     const CART = "cart";

     private $cartItems = [];

     private $total = 0;

     public function getCartItems()
     {
          return $this->cartItems;
     }

     public function addCartItem($cartItem)
     {
          $foundItem = array_filter($this->cartItems, function ($element) use ($cartItem) {
               if ($element->getProduct()->getId() === $cartItem->getProduct()->getId()) {
                    $element->setQuantity((int) $element->getQuantity() + 1);
               }

               return $element->getProduct()->getId() === $cartItem->getProduct()->getId();
          });
          $flashService = new FlashService;
          $flashbag = $flashService->get();
          $flashbag->addFlashItem(
               (new FlashItem())->setMessage("Votre produit a bien été ajouté")
          );
          $flashService->update($flashbag);

          if (empty($foundItem)) {
               $this->cartItems[] = $cartItem;
          }

          return $this;
     }

     public function getTotal()
     {
          return $this->total;
     }

     public function setTotal($total)
     {
          $this->total = $total;

          return $this;
     }
}
