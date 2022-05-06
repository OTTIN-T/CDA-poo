<?php

namespace Mii\Framework;

use Mii\Invoice\Service\TwigService;

abstract class AbstractController
{
    public function render($template, $data = [])
    {
        echo (new TwigService)->render($template, $data);
    }
}
