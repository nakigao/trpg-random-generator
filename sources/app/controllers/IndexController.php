<?php

class IndexController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $this->view->setVar("pageTitle", 'INDEX');
    }

    public function indexAction()
    {

    }

}

