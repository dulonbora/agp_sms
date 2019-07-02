<?php
class Model_Users {
    public function __construct() {}
    private $id             = 0;
    private $name           = "";
    private $mobileNo       = "";
    private $email          = "";
    private $password       = "";
    private $logo           = "";
    private $role           = "";
    private $access         = "";
    private $address        = "";
    private $district       = "";
    private $party          = "";
    private $createOn       = 0;
    private $createBy       = 0;
    private $modifyOn       = 0;
    private $modifyBy       = 0;
    private $status         = 0;
    private $isActive       = "YES";    
    private $grander        = "";
    private $first_leter    = "";


    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setName($name) { $this->name = $name; }
    function getName() { return $this->name; }
    function setMobileNo($mobileNo) { $this->mobileNo = $mobileNo; }
    function getMobileNo() { return $this->mobileNo; }
    function setEmail($email) { $this->email = $email; }
    function getEmail() { return $this->email; }
    function setPassword($password) { $this->password = $password; }
    function getPassword() { return $this->password; }
    function setLogo($logo) { $this->logo = $logo; }
    function getLogo() { return $this->logo; }
    function setRole($role) { $this->role = $role; }
    function getRole() { return $this->role; }
    function setAccess($access) { $this->access = $access; }
    function getAccess() { return $this->access; }
    function setAddress($address) { $this->address = $address; }
    function getAddress() { return $this->address; }
    function setDistrict($district) { $this->district = $district; }
    function getDistrict() { return $this->district; }
    function setParty($party) { $this->party = $party; }
    function getParty() { return $this->party; }
    function setCreateOn($createOn) { $this->createOn = $createOn; }
    function getCreateOn() { return $this->createOn; }
    function setCreateBy($createBy) { $this->createBy = $createBy; }
    function getCreateBy() { return $this->createBy; }
    function setModifyOn($modifyOn) { $this->modifyOn = $modifyOn; }
    function getModifyOn() { return $this->modifyOn; }
    function setModifyBy($modifyBy) { $this->modifyBy = $modifyBy; }
    function getModifyBy() { return $this->modifyBy; }
    function setStatus($status) { $this->status = $status; }
    function getStatus() { return $this->status; }
    function setIsActive($isActive) { $this->isActive = $isActive; }
    function getIsActive() { return $this->isActive; }
    function setGrander($grander) { $this->grander = $grander; }
    function getGrander() { return $this->grander; }
    function setFirst_leter($first_leter) { $this->first_leter = $first_leter; }
    function getFirst_leter() { return $this->first_leter; }

}
