<?php
namespace Application\Model;
use Application\Model\EmailTemplates;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;

class EmailTemplatesTable 
{
    protected $dbAdapter;
    protected $tableGateway;

    public function __construct(Adapter $dbAdapter, TableGateway $tableGateway) 
    {
        $this-> dbAdapter = $dbAdapter;
        $this-> tableGateway = $tableGateway;
    }
    public function getEmailTemplateDetails($emailType)
    {
        $emailType = (string) $emailType;  
        $sql = new Sql($this->tableGateway->getAdapter());
        $select = $sql->select();
        $select->columns(array('emailType','emailTitle','emailSubject','emailBody'));        
        $select->from(array('et' => 'email_templates'));
        
        if($emailType)
        {
            $select->where(array('emailType' => $emailType ));
        }
        //echo $select->getSqlString($this-> tableGateway->getAdapter()->getPlatform());
        
        $statement = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();

        if ($result instanceof ResultInterface && $result->isQueryResult()) 
        {
            $resultSet = new ResultSet();
            $resultSet->initialize($result);
        }
        
        if($emailType)
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
