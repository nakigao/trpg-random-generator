<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    protected $config;

    public function initialize()
    {
        $this->config = $this->di->get('config');
        $this->view->setVar("siteTitle", $this->config->general->siteTitle);
        $this->view->setVar("pageTitle", $this->config->general->pageTitle);
    }
}
