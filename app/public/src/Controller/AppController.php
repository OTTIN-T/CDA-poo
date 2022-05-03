<?php

namespace Mii\Invoice\Controller;

class AppController
{
     public function home()
     {
          $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../template');
          $twig = new \Twig\Environment($loader, []);

          echo $twig->render('app/index.php', ['name' => 'Tim']);
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
