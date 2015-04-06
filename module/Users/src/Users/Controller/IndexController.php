<?php
namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
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
                echo $email = $postData['email'];
                echo $password = $postData['password'];
                
                $users = new Users();
                $users-> exchangeArray($postData);
                      
                $usersTable = $this->getServiceLocator()-> get('Users\Model\UsersTable');
                echo $row = $usersTable-> authenticate($email,$password);
                die;
            }
        }
        
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }
    public function forgotPasswordAction()
    {
        return new ViewModel();
    }
    public function dashboardAction()
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
