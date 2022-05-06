<?php

namespace Mii\Invoice\Model;

use Mii\Framework\AbstractModel;

class Flashbag extends AbstractModel
{
     const FLASHBAG = "flashbag";

     private $flashItems = [];

     public function getFlashItems()
     {
          return $this->flashItems;
     }

     public function addFlashItem($flashItem)
     {
          $this->flashItems[] = $flashItem;

          return $this;
     }
}
