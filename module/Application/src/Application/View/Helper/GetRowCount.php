<?php 

namespace Admin\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class GetRowCount extends AbstractHelper
{
	protected $dbAdapter;
		
	public function __construct($dbAdapter)
	{
			$this->dbAdapter = $dbAdapter;
	}

	
	public function __invoke($table,$where,$distinct)
	{	
		$table = new TableGateway($table,$this->dbAdapter);

        $rowSet = $table->select(function (Select $select) use ($where,$distinct) {


            if($distinct) $select-> quantifier('distinct');
            $select-> where($where);

            //echo $select->getSqlString($this->dbAdapter->getPlatform());
         });

		$count =  $rowSet->count();

		return $count;
	}
}
