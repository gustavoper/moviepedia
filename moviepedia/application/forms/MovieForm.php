<?php

class Application_Form_MovieForm extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */

        $this->setName('newMovie');
        $this->setMethod('post');

        $name =  $this->createElement('text', 'nome',array('label' => 'Nome'  ));
        $name->addFilters(array('StringTrim'))
            ->addValidator('StringLength', false,array(5,50))
            ->setValue('')
            ->setRequired(true);

        $genre =  $this->createElement('text','genre',array('label' => 'Genero'  ));
        $genre ->setRequired(true)
            ->addValidator('StringLength', false,array(5,50))
            ->setValue('');

        $launchYear =  $this->createElement('text','launchyear',array('label' => 'Ano'  ));
        $launchYear ->setRequired(true)
            ->addValidator('StringLength', false,array(5,50))
            ->setValue('');



        $submit =  $this->createElement('submit','save',array('label' => 'Cadastrar'));
        $submit->setRequired(false)
            ->setIgnore(true);

        $this->addElements(array(
            $name,
            $genre,
            $launchYear,
            $submit,
        ));

    }





}

