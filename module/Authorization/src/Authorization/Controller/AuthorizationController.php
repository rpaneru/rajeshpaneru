<?php
namespace Authorization\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Renderer\PhpRenderer;
use Zend\View\Model\ViewModel;
use Zend\Http\Header\SetCookie;
use Zend\Db\Adapter\Adapter;

use Authorization\Model\Services;
use Authorization\Model\ServicesTable;

class AuthorizationController extends AbstractActionController
{
    protected $adapter;
    protected $authservice;
    
    public function listAuthorizationAction()
    {      
        $sm = $this->getServiceLocator(); 
        $authorizationDetails = $sm->get('Authorization\Model\AuthorizationTable')->getAuthorizationDetails( '' );
                
        $view = new ViewModel(array( 'authorizationDetails' => $authorizationDetails ));
        return $view;
    }        
}