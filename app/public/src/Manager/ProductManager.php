<?php

namespace Mii\Invoice\Manager;


use Mii\Framework\AbstractManager;
use Mii\Invoice\Model\Product;

class ProductManager extends AbstractManager
{
    public function findOneBy($id)
    {
        $product = $this->connection->query(
            "SELECT * FROM product WHERE id=" . $id
        )->fetch(\PDO::FETCH_ASSOC);

        if (!$product) {
            throw new \Exception("Erreur de produit");
            die;
        }

        return $this->setProduct($product);
    }

    public function getAllProduct()
    {
        $products = $this->connection->query("SELECT * from product")->fetchAll(\PDO::FETCH_ASSOC);


        if (!$products) {
            throw new \Exception("Erreur de produit");
            die;
        }

        $productList = [];
        foreach ($products as $product) {
            $productList[] = $this->setProduct($product);
        }


        return $productList;
    }

    public function updateProduct($product, $productId)
    {
        $productUpdate = $this->connection->prepare(
            "UPDATE `product` SET
                    name=:name, price=:price, name=:name WHERE id=:id"
        );

        $productUpdate->bindValue('name', $product['name']);
        $productUpdate->bindValue('price', $product['price']);
        $productUpdate->bindValue('id', $productId);
        $productUpdate->execute();
    }

    public function setProduct($product)
    {
        return new Product($product);
    }
}
