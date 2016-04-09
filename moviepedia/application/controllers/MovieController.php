<?php

class MovieController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->registerAccess();
    }

    public function indexAction()
    {
        // action body

        $movies = new Application_Model_DbTable_Movie();
        $this->view->movies = $movies->getMovie();
    }

    public function addAction()
    {
        // action body
        $form = new Application_Form_Movie();
        $form->submit->setLabel('Adicionar');
        $this->view->form = $form;
        $formData = $this->getRequest()->getPost();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($formData)) {
                $movies = new Application_Model_DbTable_Movie();
                $movies->addMovie($formData);
                $this->_helper->redirector('index');
            }
        } else {
            $form->populate($formData);
        }
    }

    public function editAction()
    {   //action body
        $form = new Application_Form_Movie();
        $form->submit->setLabel('Salvar');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $movies = new Application_Model_DbTable_Movie();
                $id = intval($form->getValue('id'));
                $movies->editMovie($id,$formData);
                $this->_helper->redirector('index');
            }
            else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id',0);
            if ($id >0) {
                $movies = new Application_Model_DbTable_Movie();
                $form->populate($movies->getMovie($id));

            }
        }
    }



    /**
    *
    */
    public function deleteAction()
    {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Sim') {
                $movies = new Application_Model_DbTable_Movie();
                $id = intval($this->getRequest()->getPost('id'));
                $movies->deleteMovie($id);
            }
                $this->_helper->redirector('index');
        } 
        else {
            $id = $this->_getParam('id',0);
            if ($id >0) {
                $movies = new Application_Model_DbTable_Movie();
                $this->view->movie = $movies->getMovie($id);
            }
        }
    }

    public function registerAccess() 
    {
        $access = new Application_Model_DbTable_Access();
        $access->addAccess();
    }

}







