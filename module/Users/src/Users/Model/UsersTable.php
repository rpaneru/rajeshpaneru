<?php
namespace Users\Model;
use Users\Model\Users;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;

class UsersTable 
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) 
    {
        $this->tableGateway = $tableGateway;
    }
    
    public function authenticate($email,$password) 
    {
        $rowset = $this->tableGateway->select(array( 'email' => $email, 'password' => $password ));
        $row = $rowset->current();
        if (!$row) 
        {
            $row = 0;
        }
        return $row;
    }
}

?>
