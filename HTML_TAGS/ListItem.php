<?php

namespace OOP\HTML_TAGS;

class ListItem extends Tag
{
    public function __construct()
    {
        parent::__construct('li');
    }
    public function __toString(): string
    {
        return $this->show();
    }

}