<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {

    }

    public function loginAction()
    {
        // action body
        $form= new Application_Form_LoginForm();
        $this->view->form= $form;
    }


}



