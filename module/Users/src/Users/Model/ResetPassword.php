<?php
namespace Users\Model;

class ResetPassword 
{    
    public $id;
    public $userEmail;
    public $resetKey;    
    public $createdDateTime;
    public $createdBy;
    public $sessionId;
   
    public function exchangeArray($data)
    {   
        $this-> id = (isset($data['id'])) ? $data['id'] : null;
        $this-> userEmail = (isset($data['userEmail'])) ? $data['userEmail'] : null;
        $this-> resetKey = (isset($data['resetKey'])) ? $data['resetKey'] : null;
        $this-> createdDateTime = (isset($data['createdDateTime'])) ? $data['createdDateTime'] : '0000:00:00';
        $this-> createdBy = (isset($data['createdBy'])) ? $data['createdBy'] : null;
        $this-> sessionId = (isset($data['sessionId'])) ? $data['sessionId'] : null;
    }
}

?>
