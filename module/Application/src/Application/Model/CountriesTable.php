<?php
namespace Application\Model;
use Application\Model\IndianStates;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;

class CountriesTable 
{
    protected $dbAdapter;
    protected $tableGateway;

    public function __construct(Adapter $dbAdapter, TableGateway $tableGateway) 
    {
        $this-> dbAdapter = $dbAdapter;
        $this-> tableGateway = $tableGateway;
    }
    public function getAllCountries()
    {            
        $resultSet = $this-> tableGateway-> select(function(Select $select) {
            $select-> columns(array('id','name'));
            $select->order('name desc');
            //echo $select->getSqlString($this-> tableGateway->getAdapter()->getPlatform());
       });
       return $resultSet->buffer();                  
    }
}

?>
