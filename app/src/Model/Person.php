<?php

namespace App\Model;

class Person {

    private $name = 'zoleikha';
    private $age = 41;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getName() 
    {
        return $this->name;
    }
    
    public function getAge() 
    {
        return $this->name;
    }
}