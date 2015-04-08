<?php
namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Renderer\PhpRenderer;
use Zend\View\Model\ViewModel;

use Zend\Http\Request;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;

use Users\Model\Users;
use Users\Model\UsersTable;

class IndexController extends AbstractActionController
{
    public function getAuthService() 
    {
        if (!$this->authservice) 
        {
            $this->authservice = $this->getServiceLocator()->get('AuthService');
        }
        return $this->authservice;
    }
    
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
            
            $email = $postData['email'];
            $password = $postData['password'];

//            $users = new Users();
//            $users-> exchangeArray($postData);
//
//            $usersTable = $this->getServiceLocator()-> get('Users\Model\UsersTable');
//            $row = $usersTable-> authenticate($email,$password);
            
            
            $sm = $this->getServiceLocator();
            
            $this->getAuthService()->getAdapter()
                    ->setIdentity($this->getRequest()->getPost('email'))
                    ->setCredential($this->getRequest()->getPost('password'));
            echo 'hello';
            $result = $this->getAuthService()->authenticate();
            
            var_dump($result);            
            echo '<br />';
            
            if ($result->isValid())
            {
                if( $postData['rememberMe'] == 'Yes')
                { 
                    setcookie('rp_email', $email, time() + 86400, '/');
                    setcookie('rp_password', $password, time() + 86400, '/');
                }  
                else 
                {
                    setcookie('rp_email', '', -1);
                    unset($_COOKIE['rp_email']);
                    setcookie('rp_password', '', -1);
                    unset($_COOKIE['rp_password']);
                }
            }

            $_COOKIE['rp_email'];
            echo '<br />';
            $_COOKIE['rp_password'];
            echo '<br />';
            
            
            $renderer = $this->serviceLocator->get('Zend\View\Renderer\RendererInterface');
            
            if( $row->userTypeId == 4 )
            {                    
                //$this->redirect()->toUrl($renderer->basePath('users/index/dashboard-super-admin'));
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
