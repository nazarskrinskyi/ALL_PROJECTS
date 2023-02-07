<?php

declare(strict_types=1);

namespace OOP\ABSTRACT;

abstract class Figure
{
    abstract function getPerimeter();

    abstract function getSquare();

    public function getRatio(): int|float
    {
        return $this->getSquare() / $this->getPerimeter();
    }
}