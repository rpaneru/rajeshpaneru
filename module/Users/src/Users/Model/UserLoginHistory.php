<?php
namespace Users\Model;

class UserLoginHistory 
{    
    public $id;
    public $userid;
    public $sessionId;
    public $ipAddress;
    public $os;
    public $browser;
    public $screenResolution;
    public $screenSize;
    public $logInDateTime;
    public $logOutDateTime;
   
    public function exchangeArray($data)
    {   
        $this-> id = (isset($data['id'])) ? $data['id'] : null;
        $this-> userid = (isset($data['userid'])) ? $data['userid'] : null;
        $this-> sessionId = (isset($data['sessionId'])) ? $data['sessionId'] : null;
        $this-> ipAddress = (isset($data['ipAddress'])) ? $data['ipAddress'] : null;
        $this-> os = (isset($data['os'])) ? $data['os'] : null;
        $this-> browser = (isset($data['browser'])) ? $data['browser'] : null;
        $this-> screenResolution = (isset($data['screenResolution'])) ? $data['screenResolution'] : null;
        $this-> screenSize = (isset($data['screenSize'])) ? $data['screenSize'] : null;
        $this-> logInDateTime = (isset($data['logInDateTime'])) ? $data['logInDateTime'] : null;
        $this-> logOutDateTime = (isset($data['logOutDateTime'])) ? $data['logOutDateTime'] : null;        
    }
}

?>
