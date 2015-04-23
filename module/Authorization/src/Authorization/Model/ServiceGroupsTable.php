<?php
namespace Authorization\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;

class ServiceGroupsTable 
{
    protected $dbAdapter;
    protected $tableGateway;

    public function __construct(Adapter $dbAdapter, TableGateway $tableGateway) 
    {
        $this-> dbAdapter = $dbAdapter;
        $this-> tableGateway = $tableGateway;
    }
    public function getServiceGroupDetails($id)
    {
        $id = (string) $id;  
        $sql = new Sql($this-> dbAdapter);
        $select = $sql->select();
        $select->columns(array('serviceGroupName','serviceGroupDescription','serviceGroupStatus'));
        $select->from(array('sg' => 'service_groups'));
       
       // echo $select->getSqlString($this-> tableGateway->getAdapter()->getPlatform());
        
        $statement = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();

        if ($result instanceof ResultInterface && $result->isQueryResult()) 
        {
            $resultSet = new ResultSet();
            $resultSet->initialize($result);
        }
        
        if($id)
        {
            return $resultSet->current();                  
        }
        else
        {
            return $resultSet->buffer();                  
        }
        
    }
}

?>
