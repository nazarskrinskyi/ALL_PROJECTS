<?php

namespace OOP\HTML_TAGS;

class Hidden extends Tag
{

    public function __construct()
    {
        parent::__construct('input');
        $this->setAttr('type','hidden');
    }

}