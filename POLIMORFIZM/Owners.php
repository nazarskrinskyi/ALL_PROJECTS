<?php

namespace OOP\POLIMORFIZM;

class Owners extends Publications
{
    public function __construct(protected array $id)
    {
        $this->set_table('owners');
        parent::__construct($id);
    }

    public function do_print()
    {
        echo "<ul>";
        foreach ($this->get_all_data() as $key => $value)
        {
            echo "<li>$key: $value</li>";
        }
        echo "</ul>";
    }
}