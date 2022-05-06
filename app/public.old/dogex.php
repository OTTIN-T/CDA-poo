<?php

class Dog
{
     public $name = "Pilote";
     public $firstName = "Coco";

     // public function __construct($name) {
     //      $this->name = $name;
     // }

     public function __toString()
     {
          return "something\n";
     }

     public function __sleep()
     {
          return ["name", "firstName"];
     }

     public function __set($name, $value)
     {
          echo "setting $name to $value\n";
     }

     public function __get($name)
     {
          echo "getting\n" . $name;
     }
}

echo new Dog;

$dog = new Dog();
echo $dog->paws;
// $dog->paws = 4;
// $dog = serialize($dog);
// var_dump($dog);

// $dog = unserialize($dog);
// var_dump($dog);
