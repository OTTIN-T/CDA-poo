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
          // $invoice->bindValue('created_at', date('Y-m-d H:i:s'));
          $invoice->execute();
          // dd($invoice);

          if (!$invoice) {
               throw new \Exception('Erreur de commande');
          }

          new Invoice($invoice);
          // dd($this->connection->lastInsertId());
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
          // dump($orderLines['product']['id']);


          // dump('invoiceLine dans InvoiceManager createInvoiceList');
          // dump($invoiceLine);


     }
}
