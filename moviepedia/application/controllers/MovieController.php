<?php

class MovieController extends Zend_Controller_Action
{


    protected $movies;


    public function init()
    {
        /* Initialize action controller here */
        $access = new Application_Model_Access();
        $access->save();

        //nitializing dbtable for furhter use
        $this->movies = new Application_Model_DbTable_Movie();

    }


    public function indexAction()
    {
        // action body
        $this->view->movies = $this->movies->getMovie(null,true);
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
                $this->movies->addMovie($formData);
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
                $id = intval($form->getValue('id'));
                $this->movies->editMovie($id,$formData);
                $this->_helper->redirector('index');
            }
            else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id',0);
            if ($id >0) {
                $form->populate($this->movies->getMovie($id));

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
                $id = intval($this->getRequest()->getPost('id'));
                $this->movies->deleteMovie($id);
            }
                $this->_helper->redirector('index');
        } 
        else {
            $id = $this->_getParam('id',0);
            if ($id >0) {
                $this->view->movie = $this->movies->getMovie($id);
            }
        }
    }


}







