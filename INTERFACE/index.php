<?php
declare(strict_types=1);

use OOP\ABSTRACT\Quadrate;
use OOP\INTERFACE\Figure_collector;

require "../../composer/vendor/autoload.php";

$collector = new Figure_collector();
echo $collector
    ->addFigure(new Quadrate(3))
    ->addFigure(new Quadrate(5))
    ->getTotalSquare();