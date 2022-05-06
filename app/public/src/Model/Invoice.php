<?php

namespace Mii\Invoice\Model;

use Mii\Framework\AbstractModel;

class Invoice extends AbstractModel
{
    private $id;

    private $createdAt;

    private $invoiceLines = [];

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getInvoiceLines()
    {
        return $this->invoiceLines;
    }

    public function addInvoiceLine($invoiceLine)
    {
        $this->invoiceLines[] = $invoiceLine;

        return $this;
    }
}
