<?php

namespace Mii\Invoice\Model;

use Mii\Framework\AbstractModel;

class FlashItem extends AbstractModel
{
     private $message;

     /**
      * Get the value of message
      */
     public function getMessage()
     {
          return $this->message;
     }

     /**
      * Set the value of message
      *
      * @return  self
      */
     public function setMessage($message)
     {
          $this->message = $message;

          return $this;
     }
}
