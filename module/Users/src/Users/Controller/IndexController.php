<?php
namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function loginAction()
    {
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }
    public function registerAction()
    {
        return new ViewModel();
    }
    public function dashboardAction()
    {
        return new ViewModel();
    }
}
