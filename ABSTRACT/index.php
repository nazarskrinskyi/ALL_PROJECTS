<?php
declare(strict_types=1);

use OOP\ABSTRACT\Quadrate;

require "../../composer/vendor/autoload.php";

$figure = new Quadrate(3);
echo $figure->getPerimeter() . "<br>";
echo $figure->getSquare()    . "<br>";
echo $figure->getRatio();