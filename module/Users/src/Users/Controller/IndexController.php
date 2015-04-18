<?php
namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Renderer\PhpRenderer;
use Zend\View\Model\ViewModel;
use Zend\Http\Header\SetCookie;
use Zend\Db\Adapter\Adapter;


use Users\Model\Users;
use Users\Model\UsersTable;
use Users\Model\RPAuthStorage;

use Users\Form\AddNewUserForm;

class IndexController extends AbstractActionController
{
    protected $adapter;
    protected $authservice;
    
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
        $headCookie = $this->getRequest()->getHeaders()->get('Cookie');
        
        if(isset($headCookie->email))
        {
        $email = $headCookie->email;    
        }
        else
        {
            $email = '';
        }

        $view = new ViewModel( array('email'=> $email ) );
        $view->setTerminal(true);
        return $view;
    }
    
    public function processLoginAction()
    {      
        $sm = $this->getServiceLocator();            
        $renderer = $sm ->get('Zend\View\Renderer\RendererInterface');
        $auth = $sm-> get('AuthService');
        
        if($auth-> hasIdentity())
        {
           $auth-> clearIdentity();
        }
            
        $request = $this->getRequest(); 
        if($request-> isPost())
        {
            $postData = $request-> getPost();
            
            $userEmail = $postData['email'];
            $userPassword = $postData['password'];

            $this->getAuthService()->getAdapter()
                    ->setIdentity($userEmail)
                    ->setCredential($userPassword);
            
            $result = $this->getAuthService()->authenticate();
            
            $helper = $sm->get('viewhelpermanager')->get('getValue');
            $userStatus = $helper('users', 'userStatus', 'userEmail', $userEmail);
                       
            if ($result->isValid() && $userStatus == 1)
            {

                $data = $auth -> getAdapter()-> getResultRowObject(null,'password');
                $auth->getStorage()->write($data);

                if( $postData['rememberMe'] == 'Yes' )
                {   
                    $cookieEmail = new  \Zend\Http\Header\SetCookie('email', $auth-> getIdentity()-> email, time() + 60 * 60 , '/');
                    $this->getResponse()->getHeaders()->addHeader($cookieEmail);
                }  
                else 
                {                    
                    $cookieEmail = new \Zend\Http\Header\SetCookie('email','',strtotime('-1 Year', time()), '/' );
                    $this->getResponse()->getHeaders()->addHeader($cookieEmail);
                }
                

                if( $auth-> getIdentity()-> userTypeId == 4 )
                {                    
                    $url = $renderer->basePath('users/index/dashboard-super-admin');
                    return $this->redirect()->toUrl( $url );
                }
            }
            else
            {                    
                $url = $renderer->basePath('users/index/login');
                return $this->redirect()->toUrl( $url );
            }
        }                
    }
    
    public function forgotPasswordAction()
    {
        return new ViewModel();
    }
    
    public function dashboardSuperAdminAction()
    {
        $sm = $this->getServiceLocator();            
        $renderer = $sm ->get('Zend\View\Renderer\RendererInterface');
        $auth = $sm-> get('AuthService');        
        if(! $auth-> hasIdentity())
        {
            $url = $renderer->basePath('users/index/login');
            return $this->redirect()->toUrl( $url );
        }                
        return new ViewModel( array() );
    }
    
    public function registerAction()
    {
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }
    
    public function logOutAction()
    {      
        $sm = $this->getServiceLocator(); 
        $renderer = $sm ->get('Zend\View\Renderer\RendererInterface');
        $auth = $sm-> get('AuthService');
        
        if($auth-> hasIdentity())
        {
           $auth-> clearIdentity();
        }
        
        $url = $renderer->basePath('users/index/login');
        return $this->redirect()->toUrl( $url );
    }
    
    public function listUsersAction()
    {      
        $sm = $this->getServiceLocator();
        $auth = $sm-> get('AuthService');        
        
        $userDetails = $sm->get('Users\Model\UsersTable')->getUsersDetails( '' );
        
        $view = new ViewModel(array( 'userDetails' => $userDetails ));
        return $view;
    }
    
    public function addNewUserAction()
    {      
        $sm = $this->getServiceLocator(); 
        $dbAdapter = $sm -> get('Zend\Db\Adapter\Adapter'); 
        $form = new AddNewUserForm($sm , $dbAdapter);
        
        $request = $this->getRequest();
        if ($request->isPost()) 
        {
            $form->setData($request->getPost());
            
            if ($form->isValid()) 
            {
                $data = $form->getData();
            }
            else 
            { 
                $messages = $form->getMessages();              
            }
        }
        
        $view = new ViewModel( array('form' => $form) );
        return $view;
    }       
    
    public function updateUserProfileAction()
    {      
        $sm = $this->getServiceLocator(); 
        $dbAdapter = $sm -> get('Zend\Db\Adapter\Adapter'); 
        
        $userEmail = $this->params()->fromPost('userEmail');
        
        $usersTable = $sm-> get('Users\Model\UsersTable');        
        $usersData = $usersTable->getUsersDetails($userEmail);        

        $form = new AddNewUserForm($sm , $dbAdapter);

        if($usersData)
        {
            $form->bind($usersData);   
        }        
        
        $view = new ViewModel( array('form' => $form) );
        return $view;
    }       
    
}