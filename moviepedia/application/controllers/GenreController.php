<?php

class GenreController extends Zend_Controller_Action
{


    protected $genres;

    public function init()
    {
        /* Initialize action controller here */

        $this->genres = new Application_Model_DbTable_Genre();
        $access = new Application_Model_Access();
        $access->save();
    }

    public function indexAction()
    {
        // action body
        $this->view->genres = $this->genres->getGenre();
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
                $this->genres->addGenre($formData);
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
                $id = intval($form->getValue('id'));
                $this->genres->editGenre($id,$formData);
                $this->_helper->redirector('index');
            }
            else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id',0);
            if ($id >0) {
                $form->populate($this->genres->getGenre($id));

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







