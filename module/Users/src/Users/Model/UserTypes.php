<?php
namespace Users\Model;

class UserTypes
{    
    public $id;
    public $userType;
    public $description;
   
    public function exchangeArray($data)
    {   
        $this-> id = (isset($data['id'])) ? $data['id'] : null;
        $this-> userType = (isset($data['userType'])) ? $data['userType'] : null;
        $this-> description = (isset($data['description'])) ? $data['description'] : null;
    }
}

?>
