<?php

namespace Mii\Framework;

abstract class AbstractController
{
     public function render($template, $data = [])
     {
          $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../src/template');
          $twig = new \Twig\Environment($loader, []);

          echo $twig->render($template, $data);
     }
}
