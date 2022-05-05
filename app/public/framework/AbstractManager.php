<?php

namespace Mii\Framework;

class AbstractManager
{
     protected $connection;

     public function __construct()
     {
          $this->connection = (new DAO)->getConnection();
     }
}
