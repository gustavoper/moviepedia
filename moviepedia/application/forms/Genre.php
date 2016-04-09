<?php

class Application_Form_Genre extends Zend_Form
{

    public function init()
    {

        $this->setName('genre');
        $this->setMethod('post');

        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('int');


        $name = new Zend_Form_Element_Text('name');
        $name->setLabel("Nome");
        $name->setRequired(true);
        $name->addFilter('StripTags');
        $name->addFilter('StringTrim');
        $name->addValidator('NotEmpty');


        $description = new Zend_Form_Element_Text('description');
        $description->setLabel("Descrição")
             ->setRequired(true)
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty');


        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id','submitButton');
        $submit->setLabel('Cadastrar');



        $this->addElements(array(
            $id,
            $name,
            $description,
            $submit,
        ));

    }

}

