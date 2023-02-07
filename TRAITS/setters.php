<?php

trait setters
{
    private int $age;
    private string $name;

    public function getName(): string
    {
        return $this->name . "(from setters)";
    }

    public function getAge(): int
    {
        return $this->age * 2;
    }

    /**Абстрактные методы трейтов*/
    /**абстрактные методы трейта не могут быть приватными.*/
    /**Трейты, подобно классам, также могут использовать другие трейты.*/

    abstract public function get_age_powered(int $age):int;
}