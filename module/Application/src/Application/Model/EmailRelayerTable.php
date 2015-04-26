<?php
namespace Application\Model;
use Application\Model\EmailRelayer;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;

class EmailRelayerTable
{
    protected $dbAdapter;
    protected $tableGateway;

    public function __construct(Adapter $dbAdapter, TableGateway $tableGateway) 
    {
        $this-> dbAdapter = $dbAdapter;
        $this-> tableGateway = $tableGateway;
    }
    public function getRelaierData($fromEmail)
    {            
        $fromEmail = (string) $fromEmail;  
 
        $sql = new Sql($this->tableGateway->getAdapter());
        $select = $sql->select();
        $select->columns(array('id','fromEmail','relayerHost','relayerSsl','relayerUserName','relayerPassword','relayerPort'));
        $select->from(array('er' => 'email_relayer'));
        if($fromEmail)
        {
            $select->where(array('fromEmail'=>$fromEmail));            
        }
        //echo $select->getSqlString($this-> tableGateway->getAdapter()->getPlatform());
        
        $statement = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();

        if ($result instanceof ResultInterface && $result->isQueryResult()) 
        {
            $resultSet = new ResultSet();
            $resultSet->initialize($result);
        }
        
        if($fromEmail)
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
