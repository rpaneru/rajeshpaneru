<?php
namespace Users\Model;

class Users 
{    
    public $id;
    public $name;
    public $dob;
    public $gender;
    public $mobile;
    public $fax;
    public $email;
    public $password;
    public $addressId;
    public $image;
    public $userTypeId;
    public $status;
    public $createdDateTime;
    public $createdBy;
    public $sessionId;
   
    public function exchangeArray($data)
    {   
        $this-> id = (isset($data['id'])) ? $data['id'] : null;
        $this-> name = (isset($data['name'])) ? $data['name'] : null;
        $this-> dob = (isset($data['dob'])) ? $data['dob'] : '0000-00-00';
        $this-> gender = (isset($data['gender'])) ? $data['gender'] : 'Male';
        $this-> mobile = (isset($data['mobile'])) ? $data['mobile'] : null;
        $this-> fax = (isset($data['fax'])) ? $data['fax'] : null;
        $this-> email = (isset($data['email'])) ? $data['email'] : null;
        $this-> password = (isset($data['password'])) ? $data['password'] : null;
        $this-> addressId = (isset($data['addressId'])) ? $data['addressId'] : null;
        $this-> image = (isset($data['image'])) ? $data['image'] : null;
        $this-> userTypeId = (isset($data['userTypeId'])) ? $data['userTypeId'] : 0;
        $this-> status = (isset($data['status'])) ? $data['status'] : 1;
        $this-> createdBy = (isset($data['createdBy'])) ? $data['createdBy'] : null;
        $this-> sessionId = (isset($data['sessionId'])) ? $data['sessionId'] : null;
    }
}

?>
