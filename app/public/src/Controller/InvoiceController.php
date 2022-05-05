<?php

namespace Mii\Invoice\Controller;

use Mii\Framework\AbstractController;
use Mii\Invoice\Manager\ProductManager;
use Mii\Invoice\Manager\InvoiceManager;

class InvoiceController extends AbstractController
{
     public function billing()
     {
          $order = [
               ["product" => 1, "quantity" => 3],
               ["product" => 2, "quantity" => 2],
               ["product" => 3, "quantity" => 1],
          ];

          $orderLines = [];
          $total = 0;

          foreach ($order as $orderLine) {
               $product = (new ProductManager)->findOneBy($orderLine["product"]);

               $orderLines[] = ["product" => $product, "quantity" => $orderLine["quantity"], "total" => $product->getPrice() * $orderLine["quantity"]];

               $total += $product->getPrice() * $orderLine["quantity"];
          }

          $this->render('invoice/index.html', ["orderLines" => $orderLines, "total" => $total]);

          return (new InvoiceManager)->createInvoiceList($orderLines);
     }
}
