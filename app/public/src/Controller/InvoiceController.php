<?php

namespace Mii\Invoice\Controller;

use Mii\Framework\AbstractController;
use Mii\Invoice\Manager\InvoiceManager;
use Mii\Invoice\Manager\ProductManager;
use Mii\Invoice\Model\Invoice;
use Mii\Invoice\Model\InvoiceLine;
use Mii\Invoice\Service\CartService;
use Mii\Invoice\Service\TwigService;

class InvoiceController extends AbstractController
{
    public function billing()
    {

        $cartService = new CartService;
        $cart = $cartService->get();
        $cartItems = $cart->getCartItems();

        $total = 0;

        $invoice = new Invoice();

        foreach ($cartItems as $cartLine) {
            $product = (new ProductManager)->findOneBy($cartLine->getProduct()->getId());

            $invoiceLine = new InvoiceLine();
            $invoiceLine
                ->setProduct($product)
                ->setProductName($product->getName())
                ->setProductPrice($product->getPrice())
                ->setQuantity($cartLine->getQuantity());

            $invoice->addInvoiceLine($invoiceLine);

            $total += $product->getPrice() * $cartLine->getQuantity();
        }

        (new InvoiceManager)->create($invoice);

        $path = 'invoice/index.html';
        $data =  [
            "invoice" => $invoice,
            "total" => $total
        ];

        $this->render($path, $data);

        $content = (new TwigService)->render(
            $path,
            $data
        );
        exec("echo '$content' | wkhtmltopdf - " . __DIR__ . "/../../document/facture-" . $invoice->getId() . ".pdf");

        $cartService->reset();
    }
}
