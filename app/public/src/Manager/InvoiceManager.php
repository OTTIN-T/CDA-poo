<?php

namespace Mii\Invoice\Manager;

use Mii\Invoice\Model\Invoice;
use Mii\Framework\AbstractManager;

class InvoiceManager extends AbstractManager
{
    public function create(Invoice $invoice)
    {
        $sql = "INSERT INTO invoice VALUE ()";

        try {
            $this->connection->exec($sql);
        } catch(\PDOException $e) {
            dd($e);
        }
        
        $invoiceId = $this->connection->lastInsertId();

        $invoice->setId($invoiceId);

        foreach ($invoice->getInvoiceLines() as $invoiceLine) {
            $invoiceLine->setInvoice($invoice);

            (new InvoiceLineManager)->create($invoiceLine);
        }
    }
}