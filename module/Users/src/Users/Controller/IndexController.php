<?php
namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Renderer\PhpRenderer;
use Zend\View\Model\ViewModel;

use Users\Model\Users;
use Users\Model\UsersTable;
use Users\Model\RPAuthStorage;

use Zend\Http\Header\SetCookie;

class IndexController extends AbstractActionController
{
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
        $email = $headCookie->email;

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
            
            $email = $postData['email'];
            $password = $postData['password'];

            $this->getAuthService()->getAdapter()
                    ->setIdentity($email)
                    ->setCredential($password);
            
            $result = $this->getAuthService()->authenticate();
            
            $helper = $sm->get('viewhelpermanager')->get('getValue');
            $status = $helper('users', 'status', 'email', $email);
                       
            if ($result->isValid() && $status == 1)
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
                    /*delete cookie*/
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
        
        /*$name = $auth-> getIdentity()-> name;
        $image = $auth-> getIdentity()-> image;
        $userTypeId = $auth-> getIdentity()-> userTypeId;
        $addressId = $auth-> getIdentity()-> addressId;
        $helper = $sm->get('viewhelpermanager')->get('getValue');
        $addressDetails = $helper('addresses', 'address', 'id', $addressId);         */
        
        return new ViewModel( array('userDetails' => $auth-> getIdentity()) );
    }
    
    public function registerAction()
    {
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }
    
}