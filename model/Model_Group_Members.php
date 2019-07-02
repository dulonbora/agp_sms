<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Group_Members
 *
 * @author Dulon
 */
class Model_Group_Members {
    public function __construct() {}
    private $id             = 0;
    private $userId         = 0;
    private $groupId        = 0;
    private $activeMail     = 1;
    private $activePhone    = 1;
    private $role           = "U";
    private $userIp         = "";
    private $createOn       = 0;
    private $createBy       = 0;
    private $modifyOn       = 0;
    private $modifyBy       = 0;
    private $status         = 0;
    private $isActive       = "";

    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setUserId($userId) { $this->userId = $userId; }
    function getUserId() { return $this->userId; }
    function setGroupId($groupId) { $this->groupId = $groupId; }
    function getGroupId() { return $this->groupId; }
    function setActiveMail($activeMail) { $this->activeMail = $activeMail; }
    function getActiveMail() { return $this->activeMail; }
    function setActivePhone($activePhone) { $this->activePhone = $activePhone; }
    function getActivePhone() { return $this->activePhone; }
    function setRole($role) { $this->role = $role; }
    function getRole() { return $this->role; }
    function setUserIp($userIp) { $this->userIp = $userIp; }
    function getUserIp() { return $this->userIp; }
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

}
