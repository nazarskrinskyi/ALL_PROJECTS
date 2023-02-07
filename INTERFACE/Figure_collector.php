<?php

namespace OOP\INTERFACE;

use OOP\ABSTRACT\Figure;


class Figure_collector
{
    protected array $figures;

    public function addFigure(Figure $figure): self
    {
        $this->figures[] = $figure;
        return $this;
    }

    public function getTotalSquare(): int
    {
        $sum = 0;

        foreach ($this->figures as $figure) {
            $sum += $figure->getSquare();
        }

        return $sum;
    }
}