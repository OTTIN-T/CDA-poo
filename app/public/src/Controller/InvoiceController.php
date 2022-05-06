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


        $content = (new TwigService)->render(
            $path,
            $data
        );
        exec("echo '$content' | wkhtmltopdf - " . __DIR__ . "/../../document/facture-" . $invoice->getId() . ".pdf");

        /**
         * If you want dl the pdf, but we can't use  $this->render($path, $data);
         */
        // header('Content-Type: application/pdf');
        // header("Content-Disposition:attachment;filename=" . $invoice->getId() . ".pdf");

        // readfile(__DIR__ . "/../../document/invoice-" . $invoice->getId() . ".pdf");
        // exit;

        $this->render($path, $data);
        $cartService->reset();
    }
}
