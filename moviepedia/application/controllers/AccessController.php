<?php

class AccessController extends Zend_Controller_Action
{


    public function indexAction()
    {
        $access = new Application_Model_Access();
        $this->view->accesses = $access->getAll();
    }

}

