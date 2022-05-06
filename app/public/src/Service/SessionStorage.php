<?php

namespace Mii\Invoice\Service;

class SessionStorage
{
     public function add($key, $value)
     {
          $_SESSION[$key] = $value;
     }

     public function get($key)
     {
          return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
     }
}
