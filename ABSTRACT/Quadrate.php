<?php

declare(strict_types=1);

namespace OOP\ABSTRACT;

class Quadrate extends Figure
{
    public function __construct(protected int $side)
    {
    }

    function getPerimeter(): int
    {
        return $this->side * 4;
    }

    function getSquare(): int
    {
        return $this->side * $this->side;
    }
}