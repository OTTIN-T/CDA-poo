<?php

namespace Mii\Invoice\Model;

use Mii\Framework\AbstractModel;

class InvoiceLine extends AbstractModel
{
     private $id;
     private $productId;
     private $invoiceId;
     private $productName;
     private $productPrice;
     private $quantity;

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
     public function getProductId()
     {
          return $this->productId;
     }

     /**
      * Set the value of productId
      *
      * @return  self
      */
     public function setProductId($productId)
     {
          $this->productId = $productId;

          return $this;
     }

     /**
      * Get the value of name
      */
     public function getInvoiceId()
     {
          return $this->invoiceId;
     }

     /**
      * Set the value of invoiceId
      *
      * @return  self
      */
     public function setInvoiceId($invoiceId)
     {
          $this->invoiceId = $invoiceId;

          return $this;
     }

     /**
      * Get the value of name
      */
     public function getProductName()
     {
          return $this->productName;
     }

     /**
      * Set the value of productName
      *
      * @return  self
      */
     public function setProductName($productName)
     {
          $this->productName = $productName;

          return $this;
     }

     /**
      * Get the value of name
      */
     public function getPrice()
     {
          return $this->productPrice;
     }

     /**
      * Set the value of productPrice
      *
      * @return  self
      */
     public function setPrice($productPrice)
     {
          $this->productPrice = $productPrice;

          return $this;
     }

     /**
      * Get the value of name
      */
     public function getQuantity()
     {
          return $this->quantity;
     }

     /**
      * Set the value of quantity
      *
      * @return  self
      */
     public function setQuantity($quantity)
     {
          $this->quantity = $quantity;

          return $this;
     }
}
