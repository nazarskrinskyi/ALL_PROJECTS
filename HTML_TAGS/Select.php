<?php

namespace OOP\HTML_TAGS;

class Select extends Tag
{
    protected array $options;
    public function __construct()
    {
        $this->setAttr('name', 'list');
        parent::__construct('Select');
    }

    public function add(Option $option):self
    {
        $this->options[] = $option;
        return $this;
    }

    public function show():string
    {

        $result = $this->open();
        foreach ($this->options as $option){
            $result .= $option;
        }
        $result.=$this->close();
        return $result;
    }

    public function __toString(): string
    {
        return $this->show();
    }
}