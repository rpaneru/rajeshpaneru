<?php
namespace Authorization\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Renderer\PhpRenderer;
use Zend\View\Model\ViewModel;
use Zend\Http\Header\SetCookie;
use Zend\Db\Adapter\Adapter;

use Authorization\Model\ServiceGroups;
use Authorization\Model\ServiceGroupsTable;

class ServiceGroupsController extends AbstractActionController
{
    protected $adapter;
    protected $authservice;
      
    public function listServiceGroupsAction()
    {      
        $sm = $this->getServiceLocator();      
        
        $serviceGroupDetails  = $sm->get('Authorization\Model\ServiceGroupsTable')->getServiceGroupDetails( '' );
        
        $view = new ViewModel(array( 'serviceGroupDetails' => $serviceGroupDetails  ));
        return $view;
    }
}