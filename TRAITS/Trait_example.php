<?php

namespace OOP\TRAITS;

require 'getters.php';
require 'setters.php';

use getters;
use setters;

class Trait_example
{
    use getters;
    use setters {
        setters::getAge  insteadof getters;
        setters::getName insteadof getters;
        setters::getAge as        setAge;
    }

    public function __construct(int $age, string $name)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function get_age_powered(int $age): int
    {
        return $age * $age;
    }
}