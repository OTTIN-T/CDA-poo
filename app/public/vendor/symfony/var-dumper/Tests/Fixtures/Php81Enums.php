<?php

namespace Symfony\Component\VarDumper\Tests\Fixtures;

class Php81Enums
{
    public $e1;
    public $e2;

    public function __construct()
    {
        $this->e1 = UnitEnumFixture::Hearts;
        $this->e2 = BackedEnumFixture::Diamonds;
    }
}
