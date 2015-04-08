<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

//use Zend\Session\Container;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        //$sm = $this->getServiceLocator();
        //$session = new Container('rp');
        //echo $session_id = $sm->get('SessionManager')->getId();
        return new ViewModel();
    }
}
