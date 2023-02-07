<?php

namespace OOP\HTML_TAGS;

class FormHelper extends TagHelper
{

    public function openForm(array $attrs): string
    {
        return $this->open('form', $attrs);
    }

    public function closeForm(): string
    {
        return $this->close('form');
    }

    public function password(array $attrs): string
    {
        $attrs['type'] = 'password';
        return $this->input($attrs);
    }

    public function input(array $attrs): string
    {
        if (isset($attrs['name'])) {
            $name = $attrs['name'];
            if (isset($_REQUEST[$name])) {
                $attrs['value'] = $_REQUEST[$name];
            }
        }
        return $this->open('input', $attrs);
    }

    public function hidden($attrs = [])
    {
        $attrs['type'] = 'hidden';
        return $this->open('input', $attrs);
    }

    public function submit($attrs = [])
    {
        $attrs['type'] = 'submit';
        return $this->open('input', $attrs);
    }

    public function checkbox(array $attrs): string
    {
        $attrs['type'] = 'checkbox';
        $attrs['value'] = 1;

        if (isset($attrs['name'])) {
            $name = $attrs['name'];

            if (isset($_REQUEST[$name]) and $_REQUEST[$name] == 1) {
                $attrs['checked'] = true;
            }

            $hidden = $this->hidden(['name'
            => $name, 'value' => '0']);
        } else {
            $hidden = '';
        }

        return $hidden . $this->open('input', $attrs);
    }
}