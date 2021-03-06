<?php

namespace Mii\Invoice\Model;


use Mii\Framework\AbstractModel;

class Product extends AbstractModel
{
    private $id;

    private $name;

    private $price;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice()
    {
        return (float) $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }
}
