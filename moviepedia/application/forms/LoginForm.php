<?php

class Application_Form_LoginForm extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */

        $this->setName('login');
        $this->setMethod('post');

        $userName =  $this->createElement('text', 'userName',array('label' => 'usuario'  ));
        $userName->addFilters(array('StringTrim'))
            ->addValidator('StringLength', false,array(5,50))
            ->setValue('')
            ->setRequired(true);

        $password =  $this->createElement('password','password',array('label' => 'senha'  ));
        $password ->setRequired(true)
            ->addValidator('StringLength', false,array(5,50))
            ->setValue('');

        $submit =  $this->createElement('submit','save',array('label' => 'login'));
        $submit->setRequired(false)
            ->setIgnore(true);

        $this->addElements(array(
            $userName,
            $password,
            $submit,
        ));
    }





}

