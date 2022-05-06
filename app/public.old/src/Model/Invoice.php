<?php

namespace Mii\Invoice\Model;

use Mii\Framework\AbstractModel;

class Invoice extends AbstractModel
{
     private $id;
     private $createdAt;

     /**
      * Get the value of id
      */
     public function getId()
     {

          return $this->id;
     }

     /**
      * Set the value of id
      *
      * @return  self
      */
     public function setId($id)
     {
          $this->id = $id;
          return $this;
     }

     /**
      * Get the value of name
      */
     public function getCreatedAt()
     {
          return $this->createdAt;
     }

     /**
      * Set the value of createdAt
      *
      * @return  self
      */
     public function setCreatedAt($createdAt)
     {
          $this->createdAt = $createdAt;

          return $this;
     }
}
