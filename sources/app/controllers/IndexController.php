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

        if ($this->request->isPost()) {
            if (empty($this->request->getPost("call_action"))) {
                // nothing to do
            } else {
                $callAction = $this->request->getPost("call_action");
                switch ($callAction) {
                    case 'generate_all':
                        $this->generateNormalNameAction();
                        $this->generateAnotherNameAction();
                        $this->generatePersonalityAction();
                        break;
                    default:
                        // nothing to do.
                }
            }
        }
    }

    private function generateNormalNameAction()
    {
        $model = new MasterNormalNames();
        $nation = (empty($this->request->getPost("nation")) ? '' : $this->request->getPost("nation"));
        $gender = (empty($this->request->getPost("gender")) ? '' : $this->request->getPost("gender"));
        $this->view->setVar('normalNames', $model->findNormalNames(1, $nation, $gender));
    }

    private function generateAnotherNameAction()
    {
        $model = new MasterAnotherNames();
        $this->view->setVar('anotherNames', $model->findAnotherNames(1));
    }

    private function generatePersonalityAction()
    {
        $model = new MasterPersonalities();
        $this->view->setVar('personalities', $model->findPersonalities(1));
    }

}

