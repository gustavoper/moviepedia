<?php

class MovieController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $movie = new Application_Model_MovieMapper();
        $this->view->entries = $movie->fetchAll();

    }

    public function newAction() {
        $newMovie = new Application_Form_MovieForm();
        $this->view->form= $newMovie;

    }


}

