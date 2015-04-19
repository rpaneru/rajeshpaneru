<?php
namespace Authorization\Model;

class Services 
{    
    public $id;
    public $serviceGroupId;
    public $serviceName;
    public $controller;
    public $action;
    public $serviceDescription;    
    public $serviceStatus;
    public $createdBy;
    public $sessionId;
   
    public function exchangeArray($data)
    {   
        $this-> id = (isset($data['id'])) ? $data['id'] : null;
        $this-> serviceGroupId = (isset($data['serviceGroupId'])) ? $data['serviceGroupId'] : 0;
        $this-> serviceName = (isset($data['serviceGroupName'])) ? $data['serviceGroupName'] : null;
        $this-> controller = (isset($data['controller'])) ? $data['controller'] : null;
        $this-> action = (isset($data['action'])) ? $data['action'] : null;
        $this-> serviceDescription = (isset($data['serviceDescription'])) ? $data['serviceDescription'] : null;        
        $this-> serviceStatus = (isset($data['serviceStatus'])) ? $data['serviceStatus'] : 'Inactive';
        $this-> createdBy = (isset($data['createdBy'])) ? $data['createdBy'] : null;
        $this-> sessionId = (isset($data['sessionId'])) ? $data['sessionId'] : null;
    }
}

?>
