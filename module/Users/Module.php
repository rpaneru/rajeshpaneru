<?php
namespace Users;

use Zend\Mvc\MvcEvent;
use Zend\Mvc\ModuleRouteListener;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;

use Users\Model\Users;
use Users\Model\UsersTable;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface
{
    public function onBootstrap(MvcEvent $e)
    {
        $e->getApplication()->getServiceManager()->get('MvcTranslator');
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        
        	$helperPluginManger = $e->getApplication()->getServiceManager()->get('ViewHelperManager');

        
        $e->getApplication()->getEventManager()->getSharedManager()
        ->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
          $controller = $e->getTarget();
          $controllerClass = get_class($controller);
          $ar = explode('\\',$controllerClass);
          $controllerStr = str_replace('Controller','',$ar[count($ar) -1]);
          
          if($controllerStr == 'Redesign')
          {
                /*$totalAmount = 0;
                $totalGeneral = 0;
                $totalHigh = 0;
                $totalTicket = 0;*/
                $totalCount = 0;               
                
                $serviceManager     = $e->getApplication()->getServiceManager();
                $config = $serviceManager->get('config');
                $dbAdapter = $serviceManager->get('Zend\Db\Adapter\Adapter');
                                
                
                $session_id = $serviceManager->get('SessionManager')->getId();
                $userid = $serviceManager->get('AuthService')-> getIdentity()->userid;
                $config = $serviceManager->get('Config');
                $basePath = $config['view_manager']['base_path'];
                     
                
                
                if($userid == '')
                {
                    $arr = unserialize($_COOKIE['gcrgb']);
//                    echo 'from module';
//                    echo '<br />';
//                    print_r($arr);
//                    echo '<br />';
                    if($arr === false)
                    {
                        $totalCount = 0;
                    }
                    else
                    {
                        if(is_array($arr))
                        {
                            $totalCount = count($arr);
                        }
                        else 
                        {
                            $totalCount = 0;
                        }
                    }
                }
                else
                {
                    $sql = new Sql($dbAdapter);
                    $select2 = $sql-> select(); 
                    $select2-> columns(array('type','payment_frequency','start_date','end_date','pledge_amount','installment_amount','no_of_tickets'));
                    $select2->from(array('gb'=>'gift_box'));              
                    $where2 = new  Where();
                    $where2->equalTo('gb.userid', $userid) ;
                    $where2->equalTo('gb.status', 'Pending') ;
                    $select2->where($where2);        

                    //echo $select2->getSqlString($dbAdapter-> getPlatform());
                    $statement2 = $sql->prepareStatementForSqlObject($select2);
                    $result2 = $statement2->execute();
                    
                    $totalCount = $result2->count();

                    /*if($result2->count() > 0 )
                    {

                            if ($result2 instanceof ResultInterface && $result2->isQueryResult())
                            {
                                $resultSet2 = new ResultSet();
                                $resultSet2->initialize($result2);
                            }

                            foreach ($result2 as $res)
                            {                             
                                if( $res['type'] == 'General' )
                                {   
                                    $query = "select makeIntervals ( 'General', '".$res['payment_frequency']."', '".$res['end_date']."', '".$res['start_date']."', '', '".$res['installment_amount']."' ) as noOfSchedules";                                
                                    $result = $dbAdapter->query($query, \Zend\Db\Adapter\Adapter::QUERY_MODE_EXECUTE);

                                    foreach($result as $res1);
                                    {
                                        $schedules = $res1['noOfSchedules'];
                                    }

                                    $noOfSchedules = count( explode( ',', $schedules ));
                                    $res['installment_amount'] = $res['installment_amount'] * $noOfSchedules;
                                    $totalGeneral = $totalGeneral + $res['installment_amount'];
                                }

                                if( $res['type'] == 'High Value' )
                                {
                                    if( $res['pledge_amount'] >= $res['installment_amount'] )
                                    {
                                        $totalHigh = $totalHigh + $res['pledge_amount'];
                                    }
                                    elseif( $res['pledge_amount'] < $res['installment_amount'] && $res['payment_frequency'] == 'One-Time' )
                                    {
                                        $totalHigh = $totalHigh + $res['installment_amount'];
                                    }                                       
                                }

                                if( $res['type'] == 'Ticket Value' )
                                {                                
                                    $totalTicket = $totalTicket + $res['pledge_amount'];
                                }
                            }

                            $totalCount = $result2->count();
                    }

                    $output = array();
                    $output['totalAmount'] = $totalGeneral + $totalHigh +  $totalTicket;
                    $output['totalGeneral'] = $totalGeneral;
                    $output['totalHigh'] = $totalHigh;
                    $output['totalTicket'] = $totalTicket;
                    $output['totalCount'] = $totalCount;
                    $this->layout->output = $output;*/
                }
                
                $sqlUsers = new Sql($dbAdapter);
                $selectUsers = $sqlUsers-> select(); 
                $selectUsers-> columns(array('name'));
                $selectUsers->from(array('u'=>'users'));              
                $whereUsers = new  Where();                
                $whereUsers->equalTo('u.userid', $userid) ;
                $selectUsers->where($whereUsers);        
                $selectUsers->getSqlString($dbAdapter-> getPlatform());
                $statementUsers = $sqlUsers->prepareStatementForSqlObject($selectUsers);
                $resultUsers = $statementUsers->execute();
                
                if($resultUsers->count() > 0 )
                {
                    foreach ($resultUsers as $resUsers)
                    { 
                        $name = $resUsers['name'];
                    }
                    
                    $nameArr = explode( ' ', trim($name) );
                    if(is_array($nameArr))
                    {
                        $name = $nameArr[0];
                    }
                    if($name == '')
                    {
                       $name = $userid;
                    }                    
                }
                                
                
                $menu = '<div class="top-bar">
                        <div class="container">
                          <ul class="topnav">
                          <li class="drop gift-box"> <a title="View your shopping cart" href="'.$basePath.'gift-box"> MY GIFT BASKET<span id="basketCount"> ('.$totalCount.')</span></a></li>';
                            
                        if($userid != '' || $userid != null)
                        {                            
                            $menu.='<li><a href="'.$basePath.'logoff"><span class="glyphicon glyphicon-off"></span>LOG OUT</a></li>';

                        }
                            
                    $menu.='</ul>';
//                          <ul class="topnav">
//                            <li class="languages drop"><a href="#"><span class="glyphicon glyphicon-globe"></span>LANGUAGES</a>
//                              <div class="pPanel">
//                                <ul class="inner">
//                                  <li class="active"><a href="#">English <span class="glyphicon glyphicon-ok"></span></a></li>
//                                  <li><a href="#">Spanish</a></li>
//                                  <li><a href="#">Polish</a></li>
//                                </ul>
//                              </div>
//                            </li>
//                          </ul>
                    $menu.='<ul class="topnav">';
                            
                            if($userid == '' || $userid == null)
                            {                            
                                $menu.='<li><a href="'.$basePath.'login"><span class="glyphicon glyphicon-user"></span>LOG IN</a></li>';
                            
                            }
                            else
                            {
                            
//                            $menu.='<li class="drop"><a href="#"><span class="glyphicon glyphicon-user"></span>Welcome, '.$name.' <i class="fa fa-caret-down"></i></a>
//                              <div class="pPanel">
//                                <ul class="inner">
//                                  <li class="active"><a href="'.$basePath.'donor-dashboard">My Account <span class="glyphicon glyphicon-ok"></span></a></li>
//                                  <li><a href="'.$basePath.'logoff">Logout</a></li>
//                                </ul>
//                              </div>
//                            </li>';  
                            

                            $menu.='<li><a href="'.$basePath.'donor-dashboard"><span class="glyphicon glyphicon-user"></span>MY ACCOUNT</a></li>';
                            }                                    
                          $menu.='</ul>
                        </div>
                    </div>';
                
                $controller->layout()->setVariable('menu',$menu);
                                
          }

          $config = $e->getApplication()->getServiceManager()->get('config');

          if (isset($config['controller_layouts'][$controllerStr])) {
              $controller->layout($config['controller_layouts'][$controllerStr]);
              
          }          
           
          if($controllerStr == 'Redesign')
          {
           
          $metaData['title'] = 'GiveCentral';
          $metaData['meta_key'] = 'GiveCentral, donate';
          $metaData['meta_desc'] = 'GiveCentral, donate';
          
          $routeMatch = $e->getRouteMatch();
          $actionName = $routeMatch->getParam('action');
     
            $sqlPagetype = new Sql($dbAdapter);
                $selectPagetype = $sqlPagetype-> select(); 
                $selectPagetype-> columns(array('id','page_key'));
                $selectPagetype->from(array('pt'=>'gc_page_type'));              
                $wherePagetype = new  Where();                
                $wherePagetype->equalTo('pt.page_route', $actionName) ;
                $selectPagetype->where( $wherePagetype);        
                $selectPagetype->getSqlString($dbAdapter-> getPlatform());
              $statementPagetype =  $sqlPagetype->prepareStatementForSqlObject($selectPagetype);
                $resultPagetype = $statementPagetype->execute();
                $resultPagetype->count();
                if($resultPagetype->count() > 0 )
                {
                    foreach ($resultPagetype as $resUsers)
                    { 
                        $page_key = $resUsers['page_key'];
                        $page_type_id = $resUsers['id'];
                    
                    }
                    
               $page_id =  $routeMatch->getParam( $page_key) != ''?$routeMatch->getParam( $page_key):0; 
                 
                $sqlMetadata = new Sql($dbAdapter);
                $selectMetadata = $sqlPagetype-> select(); 
                $selectMetadata-> columns(array('meta_title','meta_keyword','meta_desc','meta_string'=>new Expression("concat(page_type_id,page_id)")));
                $selectMetadata->from(array('pt'=>'gc_meta_data'));              
                $whereMetatype = new  Where();                
                $whereMetatype->equalTo('pt.page_type_id', $page_type_id) ;
                 $whereMetatype->equalTo('pt.page_id', new Expression("IF((SELECT count(*) FROM `gc_meta_data` WHERE page_type_id = ".$page_type_id." and page_id =".$page_id.") > 0, ".$page_id.", 0)")) ;
                $selectMetadata->where($whereMetatype);
                 
             $selectMetadata->getSqlString($dbAdapter-> getPlatform());
            $statementMetadata =  $sqlPagetype->prepareStatementForSqlObject($selectMetadata);
                $resultMetadata = $statementMetadata->execute();
                
                if($resultPagetype->count() > 0 )
                {
                    foreach ( $resultMetadata as $meta)
                    { 
                        $metaData['title'] = $meta['meta_title'];
                        $metaData['meta_key'] = $meta['meta_keyword'];
                        $metaData['meta_desc'] = $meta['meta_desc'];

                    
                    }
                    
                    
              //    $routeMatch->getParam( $page_key);                    
                }
                
                }
                
                
                
         $controller->layout()->setVariable('metaData',  $metaData);  
                         }

      }, 100);
	
    }
    }
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig()
    {
        return array(
           'factories' => array( 
               
                'AuthService' => function($sm)
                {
                    $dbAdapter = $sm-> get('Zend\Db\Adapter\Adapter');
                    
                    $dbTableAuthAdapter = new DbTableAuthAdapter($dbAdapter,'users','email','password','MD5(?)');
                    $authService = new AuthenticationService();
                    $authService-> setAdapter($dbTableAuthAdapter);

                    return $authService;
                },
                'Users\Model\UsersTable' => function($sm)
                {
                    $tableGateway = $sm->get('UsersTableGateway');
                    $table = new UsersTable($tableGateway);
                    return $table;
                },
                'UsersTableGateway' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Users());
                    return new TableGateway('users',$dbAdapter,null,$resultSetPrototype);
                }
           ),
        );
    }
}