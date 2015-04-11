<?php

namespace Authorization\Model;

use Zend\Db\Sql\Sql;

class AccessControl 
{    
    private $serviceManager;
    
    public function __construct($sm) 
    {
        $this-> serviceManager = $sm;
    }
    
    public function checkAccess($action,$userTypeId)
    {   
        $sm = $this->serviceManager;

        $dbAdapter = $sm-> get('Zend\Db\Adapter\Adapter');
        $sql = new Sql($dbAdapter); 
        $select = $sql-> select();
        $select-> from(array("s" => "services"));
        $select-> join(array("ac" => "access_control"),"s.id = ac.serviceId",array(),"INNER");        
        $select-> where(array( "action"=> $action , "userTypeId" => $userTypeId ));
        $statement = $sql-> prepareStatementForSqlObject($select);
        //$select->getSqlString($dbAdapter-> getPlatform());
        $result = $statement->execute();        
        return $result->count();        
    }
}

?>
