<?php

namespace Mii\Invoice\Manager;

use Mii\Framework\AbstractManager;
use Mii\Invoice\Model\Product;

class ProductManager extends Abstractmanager
{
     public function findOneBy($id)
     {
          $product = $this->connection->query("SELECT * FROM product WHERE `id`=" . $id)->fetch(\PDO::FETCH_ASSOC);

          if (!$product) {
               throw new \Exception('Erreur de produit');
          }
          return new Product($product);
     }
}
