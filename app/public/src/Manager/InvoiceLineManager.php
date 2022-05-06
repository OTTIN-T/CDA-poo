<?php

namespace Mii\Invoice\Manager;


use Mii\Framework\AbstractManager;
use Mii\Invoice\Model\InvoiceLine;

class InvoiceLineManager extends AbstractManager
{

    public function create(InvoiceLine $invoiceLine)
    {
        $sql = "INSERT INTO invoiceLine (product, invoice, productName, productPrice, quantity) VALUE 
        (:product, :invoice, :productName, :productPrice, :quantity)";

        $request = $this->connection->prepare($sql);

        $request->bindValue('product', $invoiceLine->getProduct()->getId());
        $request->bindValue('invoice', $invoiceLine->getInvoice()->getId());
        $request->bindValue('productName', $invoiceLine->getProduct()->getName());
        $request->bindValue('productPrice', $invoiceLine->getProduct()->getPrice());
        $request->bindValue('quantity', $invoiceLine->getQuantity());

        if (!$request->execute()) {
            dd('Impossible to create');
        }

        $invoiceLine->setId($this->connection->lastInsertId());

        return $invoiceLine;
    }
}