<?php

namespace Mii\Invoice\Service;


class TwigService
{
     public function render($template, $data = [])
     {
          $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../template');
          $twig = new \Twig\Environment($loader, []);

          return $twig->render($template, $data);
     }
}
