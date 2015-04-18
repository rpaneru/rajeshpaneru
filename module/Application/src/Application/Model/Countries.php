<?php
namespace Application\Model;

class Countries 
{    
    public $id;
    public $countryCode;
    public $countryName;    
   
    public function exchangeArray($data)
    {   
        $this-> id = (isset($data['id'])) ? $data['id'] : null;        
        $this-> countryCode = (isset($data['countryCode'])) ? $data['countryCode'] : null;        
        $this-> countryName = (isset($data['countryName'])) ? $data['countryName'] : null;
    }
}

?>
