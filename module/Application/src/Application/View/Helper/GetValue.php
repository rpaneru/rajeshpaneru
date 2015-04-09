<?php 

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class GetValue extends AbstractHelper
{
	protected $dbAdapter;
		
	public function __construct($dbAdapter)
	{
            $this->dbAdapter = $dbAdapter;
	}

	
	public function __invoke($table,$column,$where,$value,$distinct=false)
	{	
                $table = new TableGateway($table,$this->dbAdapter);
                $rowSet = $table->select(function (Select $select) use ($column,$where,$value,$distinct) {
                                    
                                    if(is_array($column))   $select->columns($column);

                                    else $select->columns(array($column));

                                    if(is_array($where) && is_array($value) && count($where)==count($value)) {
										$condition = array_combine($where,$value);
										$select->where($condition);	
									} 
									else {
									$select->where(array($where => $value));
									}
                                    if($distinct=="true")  $select->quantifier('DISTINCT');
                                    
                                    //echo $select->getSqlString($this->dbAdapter->getPlatform());
                            });

		$count =  $rowSet->count();
		foreach($rowSet as $value)
		{
			if(is_array($column) || $count > 1)
                        {
				$returnArray[] = (array) $value;

			}
                        
			else return  $value->$column;
		}
                              	
		return $returnArray;
	}
}
