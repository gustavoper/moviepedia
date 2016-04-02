<?php

class Application_Form_GenreForm extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */


        $this->setName('saveGenre');
        $this->setMethod('post');

        $name =  $this->createElement('text', 'name',array('label' => 'Nome'  ));
        $name->addFilters(array('StringTrim'))
            ->addValidator('StringLength', false,array(5,50))
            ->setValue('')
            ->setRequired(true);

        $description =  $this->createElement('text','description',array('label' => 'Descrição'  ));
        $description ->setRequired(true)
            ->addValidator('StringLength', false,array(5,50))
            ->setValue('');

        $submit =  $this->createElement('submit','save',array('label' => 'Cadastrar'));
        $submit->setRequired(false)
            ->setIgnore(true);

        $this->addElements(array(
            $name,$description,$submit
        ));
    }


}

