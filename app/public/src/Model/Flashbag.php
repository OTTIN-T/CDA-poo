<?php

namespace Mii\Invoice\Model;

use Mii\Framework\AbstractModel;

class Flashbag extends AbstractModel
{
     const FLASHBAG = "flashbag";

     private $flashItems = [];

     /**
      * Get the value of flashItems
      */
     public function getFlashItems()
     {
          return $this->flashItems;
     }

     /**
      * Set the value of flashItems
      *
      * @return  self
      */
     public function addFlashItem($flashItem)
     {
          $this->flashItems[] = $flashItem;

          return $this;
     }
}
