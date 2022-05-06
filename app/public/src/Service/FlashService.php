<?php

namespace Mii\Invoice\Service;

use Mii\Invoice\Model\Flashbag;

class FlashService
{
     private $sessionStorage;

     public function __construct()
     {
          $this->sessionStorage = new SessionStorage;
          $flFromSession = $this->sessionStorage->get(Flashbag::FLASHBAG);
          if ($flFromSession === null) {
               $this->sessionStorage->add(Flashbag::FLASHBAG, new Flashbag());
          }
     }

     public function get()
     {
          return clone $this->sessionStorage->get(Flashbag::FLASHBAG);
     }

     public function display()
     {
          $flashe = clone $this->sessionStorage->get(Flashbag::FLASHBAG);
          $this->reset();
          return  $flashe;
     }

     public function update(Flashbag $cart)
     {
          $this->sessionStorage->add(Flashbag::FLASHBAG, $cart);
     }

     public function reset()
     {
          $this->sessionStorage->add(Flashbag::FLASHBAG, new Flashbag());
     }
}
