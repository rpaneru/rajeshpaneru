<?php
namespace Authorization\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Renderer\PhpRenderer;
use Zend\View\Model\ViewModel;
use Zend\Http\Header\SetCookie;
use Zend\Db\Adapter\Adapter;

use Authorization\Model\Services;
use Authorization\Model\ServicesTable;

class ServicesController extends AbstractActionController
{
    protected $adapter;
    protected $authservice;
    
    public function listServicesAction()
    {      
        $sm = $this->getServiceLocator();      
        
        $serviceDetails = $sm->get('Authorization\Model\ServicesTable')->getServiceDetails( '' );
        
        $view = new ViewModel(array( 'serviceDetails' => $serviceDetails ));
        return $view;
    }        
}