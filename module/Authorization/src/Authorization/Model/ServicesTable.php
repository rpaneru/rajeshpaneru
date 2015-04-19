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
    public function getServiceGroups()
    {
        $userEmail = (string) $userEmail;  
        $sql = new Sql($this->tableGateway->getAdapter());
        $select = $sql->select();
        $select->columns(array('userName','userEmail','userDob','userMobile','userFax','userGender','userImage','userStatus','userTypeId'));
        $select->quantifier('DISTINCT');
        $select->from(array('u' => 'users'));
        $select->join(array('a' => 'addresses'), 'u.userAddressId = a.id', array('address','city','district','stateId','countryId','zipCode'), "left");
        $select->join(array('is' => 'indian_states'), 'a.stateId = is.id', array('stateName'), "left");
        $select->join(array('c' => 'countries'), 'a.countryId = c.id', array('countryName'), "left");
        
        //echo $select->getSqlString($this-> tableGateway->getAdapter()->getPlatform());
        
        $statement = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();

        if ($result instanceof ResultInterface && $result->isQueryResult()) 
        {
            $resultSet = new ResultSet();
            $resultSet->initialize($result);
        }
        
        if($userEmail)
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
