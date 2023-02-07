<?php

namespace OOP\HTML_TAGS;

class HtmlList extends Tag
{
    protected array $items;

    public function __construct()
    {
        parent::__construct("ul");
    }

    public function addItem(ListItem $listItem): self
    {
        $this->items[] = $listItem;
        return $this;
    }

    public function show(): string
    {
        $result = $this->open();
        foreach ($this->items as $item) {
            $result .= $item;
        }
        $result .= $this->close();
        return $result;
    }

    public function __toString(): string
    {
        return $this->show();
    }

}