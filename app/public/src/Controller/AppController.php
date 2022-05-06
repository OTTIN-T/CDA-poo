<?php

namespace Mii\Invoice\Controller;


use Mii\Framework\AbstractController;
use Mii\Invoice\Manager\ProductManager;
use Mii\Invoice\Model\Cart;
use Mii\Invoice\Service\CartService;
use Mii\Invoice\Service\FlashService;
use Mii\Invoice\Service\TwigService;

class AppController extends AbstractController
{
    public function home()
    {
        $products = (new ProductManager)->getAllProduct();

        $content = (new TwigService)->render(
            'app/index.php',
            [
                "products" => $products,
                "cartLength" => (new CartService)->getCount(),
                "flashbag" => (new FlashService)->display()
            ]
        );

        // exec("echo sdf | wkhtmltopdf - /var/www/app/public/document/home.pdf");

        $this->render(
            'app/index.php',
            [
                "products" => $products,
                "cartLength" => (new CartService)->getCount(),
                "flashbag" => (new FlashService)->display()
            ]
        );
    }

    // sur /invoice
    public function billing()
    {
    }

    public function notFound()
    {
        echo "Not found";
    }
}
