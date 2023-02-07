<?php

namespace OOP\HTML_TAGS;

/*require "Tag.php";
require "Select.php";*/
class Option extends Tag
{
    public function __construct()
    {
        parent::__construct('option');
    }

    public function setSelected(): self
    {
        $this->setAttr('selected');
        return $this;
    }


    public function __toString(): string
    {
        return parent::show();
    }

}
/*$option = new Option();
echo $option->getAttr('list');*/
