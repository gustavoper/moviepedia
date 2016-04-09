<?php

class GenreController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $access = new Application_Model_DbTable_Access();
        $access->addAccess();

    }

    public function indexAction()
    {
        // action body
        $genres = new Application_Model_DbTable_Genre();
        $this->view->genres = $genres->getGenre();
    }

    public function addAction()
    {
        // action body
        $form = new Application_Form_Genre();
        $form->submit->setLabel('Adicionar');
        $this->view->form = $form;
        $formData = $this->getRequest()->getPost();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($formData)) {
                $genres = new Application_Model_DbTable_Genre();
                $genres->addGenre($formData);
                $this->_helper->redirector('index');
            }
        } else {
            $form->populate($formData);
        }
    }

    public function editAction()
    {   //action body
        $form = new Application_Form_Genre();
        $form->submit->setLabel('Salvar');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $genres = new Application_Model_DbTable_Genre();
                $id = intval($form->getValue('id'));
                $genres->editGenre($id,$formData);
                $this->_helper->redirector('index');
            }
            else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id',0);
            if ($id >0) {
                $genres = new Application_Model_DbTable_Genre();
                $form->populate($genres->getGenre($id));

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
                $genres = new Application_Model_DbTable_Genre();
                $id = intval($this->getRequest()->getPost('id'));
                $genres->deleteGenre($id);
            }
                $this->_helper->redirector('index');
        } 
        else {
            $id = $this->_getParam('id',0);
            if ($id >0) {
                $genres = new Application_Model_DbTable_Genre();
                $this->view->genre = $genres->getGenre($id);
            }
        }
    }




}







