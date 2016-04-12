<?php

class Application_Form_Copy extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */


        $this->setName('copy');
        $this->setMethod('post');

        $host = new Zend_Form_Element_Text('host');
        $host->setLabel("Host")
             ->setRequired(true)
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->setValue("10.11.10.2")    
             ->addValidator('NotEmpty');


        $username = new Zend_Form_Element_Text('username');
        $username->setLabel("Usuario")
             ->setRequired(true)
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->setValue("vagrant")    
             ->addValidator('NotEmpty');


        $password = new Zend_Form_Element_Text('password');
        $password->setLabel("Senha")
             ->setRequired(true)
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->setValue("vagrant")    
             ->addValidator('NotEmpty');


        $port = new Zend_Form_Element_Text('port');
        $port->setLabel("Porta")
             ->setRequired(true)
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->setValue("22")    
             ->addValidator('NotEmpty');



        $origin= new Zend_Form_Element_Text('origin');
        $origin->setLabel("Arquivo de origem (caminho completo)")
             ->setRequired(true)
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->setValue('/tmp/copyme.txt')
             ->addValidator('NotEmpty');


        $destination = new Zend_Form_Element_Text('destination');
        $destination->setLabel("Diretorio de destino (caminho completo)")
             ->setRequired(true)
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->setValue('/Users/gustavopereira/www/moviepedia/moviepedia/tmp/')
             ->addValidator('NotEmpty');



        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id','submitButton');
        $submit->setLabel('Cadastrar');



        $this->addElements(array(
            $host,
            $username,
            $password,
            $port,
            $origin,
            $destination,
            $submit
        ));

   
    }


}

