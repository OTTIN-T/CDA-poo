<?php

namespace Mii\Invoice\Controller;


use Mii\Framework\AbstractController;
use Mii\Invoice\Manager\ProductManager;
use Mii\Invoice\Service\CartService;
use Mii\Invoice\Service\FlashService;

class AppController extends AbstractController
{
    public function home()
    {
        $products = (new ProductManager)->getAllProduct();

        $this->render(
            'app/index.php',
            [
                "products" => $products,
                "cartLength" => (new CartService)->getCount(),
                "flashbag" => (new FlashService)->display()
            ]
        );
    }

    public function notFound()
    {
        echo "Not found";
    }
}
