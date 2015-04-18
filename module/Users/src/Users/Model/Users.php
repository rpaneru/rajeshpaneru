<?php
namespace Users\Model;

class Users 
{    
    public $id;
    public $userNme;
    public $userDob;
    public $userGender;
    public $userMobile;
    public $userFax;
    public $userEmail;
    public $userPassword;
    public $userAddressId;
    public $userImage;
    public $userTypeId;
    public $userStatus;
    public $createdDateTime;
    public $createdBy;
    public $sessionId;
   
    public function exchangeArray($data)
    {   
        $this-> id = (isset($data['id'])) ? $data['id'] : null;
        $this-> userName = (isset($data['userName'])) ? $data['userName'] : null;
        $this-> userDob = (isset($data['userDob'])) ? $data['userDob'] : '0000-00-00';
        $this-> userGender = (isset($data['userGender'])) ? $data['userGender'] : 'Male';
        $this-> userMobile = (isset($data['userMobile'])) ? $data['userMobile'] : null;
        $this-> userFax = (isset($data['userFax'])) ? $data['userFax'] : null;
        $this-> userEmail = (isset($data['userEmail'])) ? $data['userEmail'] : null;
        $this-> userPassword = (isset($data['userPassword'])) ? $data['userPassword'] : null;
        $this-> userAddressId = (isset($data['userAddressId'])) ? $data['userAddressId'] : null;
        $this-> userImage = (isset($data['userImage'])) ? $data['userImage'] : null;
        $this-> userTypeId = (isset($data['userTypeId'])) ? $data['userTypeId'] : 0;
        $this-> userStatus = (isset($data['userStatus'])) ? $data['userStatus'] : 'Inactive';
        $this-> createdBy = (isset($data['createdBy'])) ? $data['createdBy'] : null;
        $this-> sessionId = (isset($data['sessionId'])) ? $data['sessionId'] : null;
    }
}

?>
