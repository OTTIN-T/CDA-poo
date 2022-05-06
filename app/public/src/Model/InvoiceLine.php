<?php

namespace Mii\Invoice\Model;

use Mii\Framework\AbstractModel;

class InvoiceLine extends AbstractModel
{
    private $id;

    private Product $product;

    private Invoice $invoice;

    private $productName;

    private $productPrice;

    private $quantity;

    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    public function getInvoice()
    {
        return $this->invoice;
    }

    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;

        return $this;
    }

    public function getProductName()
    {
        return $this->productName;
    }

    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    public function getProductPrice()
    {
        return $this->productPrice;
    }

    public function setProductPrice($productPrice)
    {
        $this->productPrice = $productPrice;

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
