<?php

namespace OOP\HTML_TAGS;

class Link extends Tag
{
    public function __construct()
    {
        $this
            ->setAttr('href', '/OOP/HTML_TAGS/connection.php')
            ->setText('Link');
        parent::__construct('a');
    }

    public function open(): string
    {
        $this->activateSelf();
        return parent::open(); // TODO: Change the autogenerated stub
    }

    private function activateSelf(): void
    {
        if ($this->getAttr('href') === $_SERVER['REQUEST_URI']) {
            $this->addClass('active');
        }
    }

    public function __toString(): string
    {
        return $this->show();
    }
}