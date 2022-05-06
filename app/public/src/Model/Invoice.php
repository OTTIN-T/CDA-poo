<?php

namespace Mii\Invoice\Model;

use Mii\Framework\AbstractModel;

class Invoice extends AbstractModel
{
    private $id;

    private $createdAt;

    private $invoiceLines = [];

    /**
     * Get the value of createdAt
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
     * Get the value of invoiceLines
     */ 
    public function getInvoiceLines()
    {
        return $this->invoiceLines;
    }

    /**
     * Add an invoiceLine to invoiceLines
     *
     * @return  self
     */ 
    public function addInvoiceLine($invoiceLine)
    {
        $this->invoiceLines[] = $invoiceLine;

        return $this;
    }
}