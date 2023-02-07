<?php

trait getters
{
    private int $age;
    private string $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }
}