<?php

namespace Mii\Framework;

class AbstractModel
{
     public function __construct($data = [])
     {
          foreach ($data as $property => $value) {
               $setter = 'set' . ucfirst($property);

               if (method_exists($this, $setter)) {
                    $this->$setter($value);
               }
          }
     }
}
