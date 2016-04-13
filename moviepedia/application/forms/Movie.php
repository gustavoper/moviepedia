<?php

class Application_Form_Movie extends Zend_Form
{

    public function init()
    {
        $this->setName('movie');
        $this->setMethod('post');

        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('int');


        $name = new Zend_Form_Element_Text('name');
        $name->setLabel("Nome");
        $name->setRequired(true);
        $name->addFilter('StripTags');
        $name->addFilter('StringTrim');
        $name->addValidator('NotEmpty');



        $sql = "select id, name from genre ORDER BY name ASC";
        $db =  Zend_Db_Table::getDefaultAdapter();
        $genre = new Zend_Form_Element_Select('genreId');
        $genre->setMultiOptions($db->fetchPairs($sql));

        $genre->setLabel("Genero");


        $launchYear = new Zend_Form_Element_Select('launchYear');
        $launchYear->setLabel("Ano Lançamento")
             ->setRequired(true)
             ->addValidator('NotEmpty');
        for ($year = '2016'; $year>=date("1900");$year--) {
            $launchYear->addMultiOption($year."-01-01",$year);
        }


        $plot = new Zend_Form_Element_Text('plot');
        $plot->setLabel("Sinopse")
             ->setRequired(true)
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty');


        $sql = "select id, name from publisher ORDER BY name ASC";
        $db =  Zend_Db_Table::getDefaultAdapter();
        $publisher = new Zend_Form_Element_Select('publisherId');


        $publisher->setMultiOptions($db->fetchPairs($sql));


        $publisher->setLabel("Produtora")
             ->setRequired(true)
             ->addValidator('NotEmpty');



        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id','submitButton');
        $submit->setLabel('Cadastrar');



     

        $this->addElements(array(
            $id,
            $name,
            $genre,
            $launchYear,
            $plot,
            $publisher,
            $submit,
        ));

    }

}

