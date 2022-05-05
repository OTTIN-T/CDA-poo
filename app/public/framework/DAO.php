<?php

namespace Mii\Framework;

class DAO
{
     private $connection = null;
     public function getConnection()
     {

          $this->connection = new \PDO(
               "mysql:host=mysql;port=3306;dbname=" . $_ENV['MYSQL_DATABASE'] . ";charset=utf8mb4",
               $_ENV['MYSQL_USER'],
               $_ENV['MYSQL_PASSWORD']
          );

          return $this->connection;
     }
}
