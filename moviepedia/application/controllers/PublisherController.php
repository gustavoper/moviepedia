<?php

class PublisherController extends Zend_Controller_Action
{


    /**
     * init action for this controller
     */
    public function init()
    {

        /* Initialize action controller here */
        $access = new Application_Model_Access();
        $access->save();
    }

    public function indexAction()
    {
        // action body
        $publishers = new Application_Model_DbTable_Publisher();
        $this->view->publishers = $publishers->getPublisher();
    }

    public function addAction()
    {
        // action body
        $form = new Application_Form_Publisher();
        $form->submit->setLabel('Adicionar');
        $this->view->form = $form;
        $formData = $this->getRequest()->getPost();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($formData)) {
                $publishers = new Application_Model_DbTable_Publisher();
                $publishers->addPublisher($formData);
                $this->_helper->redirector('index');
            }
        } else {
            $form->populate($formData);
        }
    }

    public function editAction()
    {   //action body
        $form = new Application_Form_Publisher();
        $form->submit->setLabel('Salvar');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $publishers = new Application_Model_DbTable_Publisher();
                $id = intval($form->getValue('id'));
                $publishers->editPublisher($id,$formData);
                $this->_helper->redirector('index');
            }
            else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id',0);
            if ($id >0) {
                $publishers = new Application_Model_DbTable_Publisher();
                $form->populate($publishers->getPublisher($id));

            }
        }
    }



    /**
    * delete action
    */
    public function deleteAction()
    {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Sim') {
                $publishers = new Application_Model_DbTable_Publisher();
                $id = intval($this->getRequest()->getPost('id'));
                $publishers->deletePublisher($id);
            }
                $this->_helper->redirector('index');
        } 
        else {
            $id = $this->_getParam('id',0);
            if ($id >0) {
                $publishers = new Application_Model_DbTable_Publisher();
                $this->view->publisher = $publishers->getPublisher($id);
            }
        }
    }

}







