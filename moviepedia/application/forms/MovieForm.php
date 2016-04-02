<?php

class Application_Form_MovieForm extends Zend_Form
{

    public function init()
    {

        $this->setName('saveMovie');
        $this->setMethod('post');

        $name =  $this->createElement('text', 'name',array('label' => 'Nome'  ));
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

        $plot =  $this->createElement('text','plot',array('label' => 'Enredo'  ));
        $plot ->setRequired(true)
            ->addValidator('StringLength', false,array(5,50))
            ->setValue('');


        $publisher =  $this->createElement('text','publisher',array('label' => 'Produtora'  ));
        $publisher->setRequired(true)
            ->addValidator('StringLength', false,array(5,50))
            ->setValue('');



        $submit =  $this->createElement('submit','save',array('label' => 'Cadastrar'));
        $submit->setRequired(false)
            ->setIgnore(true);

        $this->addElements(array(
            $name,
            $genre,
            $launchYear,
            $plot,
            $publisher,
            $submit,
        ));

    }





}

