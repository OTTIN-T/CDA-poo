<?php

namespace Mii\Invoice\Controller;

class AppController
{
     public function home()
     {
          $name = 'Tim';
          require_once __DIR__ . "/../template/app/index.php";
     }

     // sur /invoice
     public function billing()
     {
          echo "invoice page";
     }

     public function notFound()
     {
          echo "Error 404";
     }
}
