<?php

namespace Mii\Invoice\Manager;

use Mii\Framework\AbstractManager;
use Mii\Invoice\Model\Invoice;
use Mii\Invoice\Model\InvoiceLine;

class InvoiceManager extends Abstractmanager
{

     public function createInvoice()
     {
          $invoice = $this->connection->prepare("INSERT INTO `invoice` VALUES ()");

          $invoice->execute();

          if (!$invoice) {
               throw new \Exception('Erreur de commande');
          }

          new Invoice($invoice);
          return $this->connection->lastInsertId();
     }

     public function getLastInvoice()
     {
          return $this->createInvoice();
     }

     public function createInvoiceList($orderLines)
     {
          $invoice = $this->getLastInvoice();

          $invoiceLine = $this->connection->prepare("INSERT INTO `invoice_line` (invoiceId, productId, product_name, product_price, quantity) VALUES (:invoiceId, :productId, :product_name, :product_price, :quantity)");

          foreach ($orderLines as $order) {

               $invoiceLine->bindValue('invoiceId', $invoice);
               $invoiceLine->bindValue('productId',  $order['product']->getId());
               $invoiceLine->bindValue('product_name', $order['product']->getName());
               $invoiceLine->bindValue('product_price', $order['product']->getPrice());
               $invoiceLine->bindValue('quantity', $order['quantity']);

               try {
                    $invoiceLine->execute();
               } catch (\Throwable $th) {
                    dump($th);
               }

               if (!$invoiceLine) {
                    throw new \Exception('Erreur de commande');
               }
               new InvoiceLine($invoiceLine);
          }
          return $this->connection->lastInsertId();
     }

     public function getLastInvoiceList($orderLines)
     {
          $invoiceLineListId = $this->createInvoiceList($orderLines);

          $invoiceLine = $this->connection->query("SELECT * FROM `invoice_line` WHERE `id`=" . $invoiceLineListId)->fetch(\PDO::FETCH_ASSOC);

          $invoiceLineList = $this->connection->query("SELECT * FROM `invoice_line` WHERE `invoiceId`=" . $invoiceLine['invoiceId'])->fetchAll(\PDO::FETCH_ASSOC);

          return $invoiceLineList;
     }
}
