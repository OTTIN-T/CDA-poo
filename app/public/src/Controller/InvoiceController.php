<?php

namespace Mii\Invoice\Controller;

use Mii\Framework\AbstractController;

class InvoiceController extends AbstractController
{
     public function billing()
     {
          $this->render('invoice/index.html');
     }
}
