<?php

class AccessController extends Zend_Controller_Action
{

    public function indexAction()
    {
        $access = new Application_Model_DbTable_Access();
        $this->view->accesses = $access->getAccess();
    }

}

