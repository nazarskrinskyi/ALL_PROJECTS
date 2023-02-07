<?php

use OOP\TRAITS\Trait_example;

require "Trait_example.php";

$trait = new Trait_example(22, 'name');
echo $trait->getName();
echo $trait->setAge();