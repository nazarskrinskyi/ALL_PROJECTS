<?php

namespace OOP\HTML_TAGS;

require "Tag.php";

class Img extends Tag
{
    public function __construct()
    {
        $this->setAttributes
        (
            [
                "src" => "../../image/php.png",
                "alt" => "wrong root",
                "width" => 300,
                "height" => 200
            ]
        );
        parent::__construct('img');
    }

    public function __toString(): string
    {
        return $this->open();
    }
}
