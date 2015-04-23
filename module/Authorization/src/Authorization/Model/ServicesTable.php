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

class ServicesTable 
{
    protected $dbAdapter;
    protected $tableGateway;

    public function __construct(Adapter $dbAdapter, TableGateway $tableGateway) 
    {
        $this-> dbAdapter = $dbAdapter;
        $this-> tableGateway = $tableGateway;
    }
    public function getServiceDetails($id)
    {
        $id = (string) $id;  
        $sql = new Sql($this->tableGateway->getAdapter());
        $select = $sql->select();
        $select->columns(array('serviceName','controller','action','serviceDescription','serviceStatus'));
        $select->from(array('s' => 'services'));
        $select->join(array('sg' => 'service_groups'), 's.serviceGroupId = sg.id', array('serviceGroupName'), "left");
        
        //echo $select->getSqlString($this-> tableGateway->getAdapter()->getPlatform());
        
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
