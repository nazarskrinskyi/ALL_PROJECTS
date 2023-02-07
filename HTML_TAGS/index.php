<?php

use OOP\HTML_TAGS\Form;
use OOP\HTML_TAGS\FormHelper;
use OOP\HTML_TAGS\Option;
use OOP\HTML_TAGS\Select;
use OOP\HTML_TAGS\TagHelper;


require "../../composer/vendor/autoload.php";

/*echo (new HtmlList())
    ->addItem((new ListItem())->setText('item1')->setAttr('class', 'li_1'))
    ->addItem((new ListItem())->setText('item2'))
    ->addItem((new ListItem())->setText('item3'));

$form = (new Form())
    ->setAttrs([
        'action' => '',
        'method' => 'GET'
    ]);
echo $form->open();
/*   echo (new Input)->setAttr(
       'name',
       'year'
   );
   echo (new Checkbox())
   ->setAttr(
           'name',
           'checkbox'
       );
echo (new Select)
    ->add((new Option())->setText('item1'))
    ->add((new Option())->setText('item2'))
    ->add((new Option())->setText('item3'))
    ->show();
*/
$th = new TagHelper();
echo $th->open(
    'form',
    [
        'action' => '',
        'method' => 'GET'
    ]
);
echo $th->open('input', ['name' => 'year']);
echo $th->open('input', ['type' => 'submit']);
echo $th->close('form');






