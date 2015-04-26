<?php
namespace Application\Model;

class EmailTemplates 
{    
    public $id;
    public $emailType;
    public $emailTitle;
    public $emailSubject;
    public $emailBody;
    public $templateStatus;
    public $createdDateTime;
    public $createdBy;
    public $sessionId;
   
    public function exchangeArray($data)
    {   
        $this-> id = (isset($data['id'])) ? $data['id'] : null;
        $this-> emailType = (isset($data['emailType'])) ? $data['emailType'] : null;
        $this-> emailTitle = (isset($data['emailTitle'])) ? $data['emailTitle'] : null;
        $this-> emailSubject = (isset($data['emailSubject'])) ? $data['emailSubject'] : null;
        $this-> emailBody = (isset($data['emailBody'])) ? $data['emailBody'] : null;       
        $this-> templateStatus = (isset($data['templateStatus'])) ? $data['templateStatus'] : 'Active';        
        $this-> createdDateTime = (isset($data['createdDateTime'])) ? $data['createdDateTime'] : '0000:00:00';               
        $this-> createdBy = (isset($data['createdBy'])) ? $data['createdBy'] : null;
        $this-> sessionId = (isset($data['sessionId'])) ? $data['sessionId'] : null;
    }
}

?>
