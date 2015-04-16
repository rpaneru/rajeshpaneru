<?php
namespace Application\Model;

class Countries 
{    
    public $id;
    public $coce;
    public $name;    
   
    public function exchangeArray($data)
    {   
        $this-> id = (isset($data['id'])) ? $data['id'] : null;
        $this-> name = (isset($data['name'])) ? $data['name'] : null;
        $this-> code = (isset($data['code'])) ? $data['code'] : null;        
    }
}

?>
