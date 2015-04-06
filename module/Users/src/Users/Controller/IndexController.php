<?php
namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Renderer\PhpRenderer;
use Zend\View\Model\ViewModel;

use Users\Model\Users;
use Users\Model\UsersTable;

class IndexController extends AbstractActionController
{
    public function loginAction()
    {
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }
    public function processLoginAction()
    {        
        $request = $this->getRequest(); 
        if($request-> isPost())
        {
            $postData = $request-> getPost();
            if( $postData['rememberMe'] == 'Yes')
            {
                $email = $postData['email'];
                $password = $postData['password'];
                
                $users = new Users();
                $users-> exchangeArray($postData);
                      
                $usersTable = $this->getServiceLocator()-> get('Users\Model\UsersTable');
                $row = $usersTable-> authenticate($email,$password);
                
                $renderer = $this->serviceLocator->get('Zend\View\Renderer\RendererInterface');
                
                if( $row->userTypeId == 4 )
                {                    
                    $this->redirect()->toUrl($renderer->basePath('users/index/dashboard-super-admin'));
                }
            }
        }
    }
    public function forgotPasswordAction()
    {
        return new ViewModel();
    }
    public function dashboardSuperAdminAction()
    {
        return new ViewModel();
    }
    public function registerAction()
    {
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }
    
}
