<?php
namespace Application\Model;

class IndianStates 
{    
    public $id;
    public $stateName;
    public $capitalName;
    public $unionTerritory;
   
    public function exchangeArray($data)
    {   
        $this-> id = (isset($data['id'])) ? $data['id'] : null;
        $this-> stateName = (isset($data['stateName'])) ? $data['stateName'] : null;
        $this-> capitalName = (isset($data['capitalName'])) ? $data['capitalName'] : null;
        $this-> unionTerritory = (isset($data['unionTerritory'])) ? $data['unionTerritory'] : 'No';
    }
}

?>
