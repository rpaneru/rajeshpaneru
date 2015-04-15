<?php
namespace Application\Model;

class IndianStates 
{    
    public $id;
    public $name;
    public $capital;
    public $unionTerritory;
   
    public function exchangeArray($data)
    {   
        $this-> id = (isset($data['id'])) ? $data['id'] : null;
        $this-> name = (isset($data['name'])) ? $data['name'] : null;
        $this-> capital = (isset($data['capital'])) ? $data['capital'] : null;
        $this-> unionTerritory = (isset($data['unionTerritory'])) ? $data['unionTerritory'] : 'No';
    }
}

?>
