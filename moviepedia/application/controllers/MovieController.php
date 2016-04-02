<?php

class MovieController extends Zend_Controller_Action
{


    public function init()
    {
        /* Initialize action controller here */
        $this->_db = new Application_Model_DbTable_Movie();

    }

    public function indexAction()
    {
        // action body
        $movie = new Application_Model_MovieMapper();
        $this->view->entries = $movie->fetchAll();

    }

    public function newAction() {
        $newMovie = $this->getForm();
        $this->view->form= $newMovie;
    }


    public function saveAction() {
        $newMovieMapper = new Application_Model_MovieMapper();
        $formData = $this->getRequest();
        $movie = new Application_Model_Movie();
        //$form = $this->getForm();
            $movie->setGenre($formData->getParam("genre"));
            $movie->setLaunchYear($formData->getParam("launchyear"));
            $movie->setName($formData->getParam("name"));
            $movie->setPlot($formData->getParam("plot"));
            $movie->setPublisher($formData->getParam("publisher"));
            $newMovieMapper->insert($movie);
        //$this->view->form = $form;
        $this->_helper->redirector('index', 'movie');
    }


    public function getForm() {
        return new Application_Form_MovieForm();

    }

}

