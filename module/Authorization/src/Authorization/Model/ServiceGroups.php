<?php
namespace Authorization\Model;

class ServiceGroups 
{    
    public $id;
    public $serviceGroupName;
    public $serviceGroupDescription;    
    public $serviceGroupStatus;
    public $createdBy;
    public $sessionId;
   
    public function exchangeArray($data)
    {   
        $this-> id = (isset($data['id'])) ? $data['id'] : null;
        $this-> serviceGroupName = (isset($data['serviceGroupName'])) ? $data['serviceGroupName'] : null;
        $this-> serviceGroupDescription = (isset($data['serviceGroupDescription'])) ? $data['serviceGroupDescription'] : null;        
        $this-> serviceGroupStatus = (isset($data['serviceGroupStatus'])) ? $data['serviceGroupStatus'] : 'Inactive';
        $this-> createdBy = (isset($data['createdBy'])) ? $data['createdBy'] : null;
        $this-> sessionId = (isset($data['sessionId'])) ? $data['sessionId'] : null;
    }
}

?>
