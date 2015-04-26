<?php
namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Renderer\PhpRenderer;
use Zend\View\Model\ViewModel;
use Zend\Http\Header\SetCookie;
use Zend\Db\Adapter\Adapter;


use Zend\Mail\Message;
use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Part as MimePart;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;


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
        
        if(isset($headCookie->userEmail))
        {
            $userEmail = $headCookie->userEmail;    
        }
        else
        {
            $userEmail = '';
        }

        $view = new ViewModel( array('userEmail'=> $userEmail ) );
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
            
            $getValueHelper = $sm->get('viewhelpermanager')->get('getValue');
            $userStatus = $getValueHelper('users', 'userStatus', 'userEmail', $userEmail);
                       
            if ($result->isValid() && $userStatus == 'Active')
            {
                $data = $auth -> getAdapter()-> getResultRowObject(null,'userPassword');
                $auth->getStorage()->write($data);
                
                if( $postData['rememberMe'] == 'Yes' )
                {   
                    $cookieEmail = new  \Zend\Http\Header\SetCookie('userEmail', $auth-> getIdentity()-> userEmail, time() + 60 * 60 , '/');
                    $this->getResponse()->getHeaders()->addHeader($cookieEmail);
                }  
                else 
                {                    
                    $cookieEmail = new \Zend\Http\Header\SetCookie('userEmail','',strtotime('-1 Year', time()), '/' );
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
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }
    
    public function processForgotPasswordAction()
    {
        $sm = $this->getServiceLocator(); 
        $renderer = $sm ->get('Zend\View\Renderer\RendererInterface');        
            
        $request = $this->getRequest(); 
        if($request-> isPost())
        {
            $postData = $request-> getPost();           
            $toEmail = $postData['userEmail'];
            $fromEmail = 'support@rajeshpaneru.com';
 
            $getRowCountHelper = $sm->get('viewhelpermanager')->get('getRowCount');
            $count = $getRowCountHelper('users', 'id', 'userEmail', $toEmail);
            
            if($count == 1)
            {
                $emailRelayerTable = $sm-> get('Application\Model\EmailRelayerTable');        
                $emailRelayerData = $emailRelayerTable->getRelaierData($fromEmail);                                
                        
                $emailSubject = 'Reset Password';            
                $emailBody = 'hello';
            
                $relayerHost = $emailRelayerData->relayerHost;
                $relayerSsl = $emailRelayerData->relayerSsl;
                $relayerUserName = $emailRelayerData->fromEmail;
                $relayerPassword = $emailRelayerData->relayerPassword;
                $relayerPort = $emailRelayerData->relayerPort;
                            
                $message = new Message();
                $message->addTo($toEmail)
                        ->addFrom($fromEmail)
                        ->setSubject($emailSubject);

                // Setup SMTP transport using LOGIN authentication
                $transport = new SmtpTransport();

                $options = new SmtpOptions(array(
                    'host' => $relayerHost,
                    'connection_class' => 'login',
                    'connection_config' => array(
                        'ssl' => $relayerSsl,
                        'username' => $relayerUserName,
                        'password' => $relayerPassword
                    ),
                    'port' => $relayerPort,
                ));

                $html = new MimePart($emailBody);
                $html->type = "text/html";

                $body = new MimeMessage();
                $body->addPart($html);

                $message->setBody($body);

                $transport->setOptions($options);
                $transport->send($message);            
            }
        }    
        
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }
    
    public function resetPasswordAction()
    { 
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }
    
    public function processResetPasswordAction()
    {               
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
        $form = new AddNewUserForm($sm , $dbAdapter, 'process-add-new-user');
        
        $form->setValidationGroup('name', 'email', 'subject', 'message');
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

        $dateFormatUs = $sm->get('viewhelpermanager')->get('DateFormatIndia');
        $usersData->userDob = $dateFormatUs( $usersData->userDob );
                
        $form = new AddNewUserForm($sm , $dbAdapter, 'process-update-user-profile' );
        if($usersData)
        {
            $form->bind($usersData);   
        }        
        
        $view = new ViewModel( array('form' => $form) );
        return $view;
    }       
    
}