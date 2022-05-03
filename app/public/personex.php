<?php

interface PersonInterface
{
     public function getName();
     public function getFirstName();
}

abstract class Animal
{
     public function __construct($data)
     {
          foreach ($data as $property => $value) {

               $methodName = 'set' . ucfirst($property);
               if (!method_exists($this, $methodName)) {
                    continue;
               }
               $this->$methodName($value);
          }
     }

     public function getNumberOfLegs()
     {
     }
     public function getFullName()
     {
          return $this->getName() . ' ' . $this->getFirstName();
     }
}

class Person extends Animal implements PersonInterface
{
     public $name;
     public $firstName;
     static $eyes = 2;

     public function getName()
     {
          return $this->name;
     }

     public function setName($name)
     {
          return $this->name = $name;
     }

     public function getFirstName()
     {
          return $this->firstName;
     }

     public function setFirstName($firstName)
     {
          return $this->firstName = $firstName;
     }
}

$person = new Person(["name" => "Ottin", "firstName" => "Tim"]);
var_dump($person);
var_dump($person->getFullName());

$eyeys = Person::$eyes;
var_dump($eyeys);
