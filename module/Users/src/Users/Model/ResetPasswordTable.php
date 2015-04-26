<?php
namespace Users\Model;
use Users\Model\ResetPassword;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;

class ResetPasswordTable 
{
    protected $dbAdapter;
    protected $tableGateway;

    public function __construct(Adapter $dbAdapter, TableGateway $tableGateway) 
    {
        $this-> dbAdapter = $dbAdapter;
        $this-> tableGateway = $tableGateway;
    }
    public function getResetKeyDetails($resetKey)
    {
        $resetKey = (string) $resetKey;  
        $sql = new Sql($this->tableGateway->getAdapter());
        $select = $sql->select();
        $select->columns(array('userEmail'));
        $select->from(array('rp' => 'reset_password'));
        $select->where(array('resetKey' => $resetKey ));
        
        //echo $select->getSqlString($this-> tableGateway->getAdapter()->getPlatform());
        
        $statement = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();

        if ($result instanceof ResultInterface && $result->isQueryResult()) 
        {
            $resultSet = new ResultSet();
            $resultSet->initialize($result);
        }
        return $resultSet->current();        
        
    }
}

?>
