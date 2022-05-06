<?php

namespace Mii\Framework;


abstract class AbstractManager
{
    protected $connection;

    public function __construct()
    {
        $this->connection = (new DAO)->getConnection();
    }
}
