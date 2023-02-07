<?php


namespace OOP\HTML_TAGS;

class Input extends Tag
{

    public function __construct()
    {
        parent::__construct('textarea');
    }

    public function __toString(): string
    {
        return $this->show();
    }

    public function show(): string
    {
        $result = $this->open();
        $result .= $this->getAttr('value');
        $result .= $this->close();
        return $result;
    }


    public function open()
    {
        $inputName = $this->getAttr('name'); // имя инпута
        if (isset($_REQUEST[$inputName])) {
            $value = $_REQUEST[$inputName]; // получаем значение инпута по его имени

            $this->setAttr('value', $value); // записываем в value инпута
        }
        return parent::open(); // вызываем метод open родителя

    }
}