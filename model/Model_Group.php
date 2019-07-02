<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model_Group
 *
 * @author Dulon
 */
class Model_Group {
    public function __construct() {}
    private $id                 = 0;
    private $groupName          = "";
    private $description        = "";
    private $logo               = "";
    private $groupType          = "";
    private $category           = "";
    private $totalMember        = 0;
    private $totalPosts         = 0;
    private $userIp             = "";
    private $createOn           = 0;
    private $createBy           = 0;
    private $modifyOn           = 0;
    private $modifyBy           = 0;
    private $status             = 0;
    private $isActive           = "YES";

    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setGroupName($groupName) { $this->groupName = $groupName; }
    function getGroupName() { return $this->groupName; }
    function setDescription($description) { $this->description = $description; }
    function getDescription() { return $this->description; }
    function setLogo($logo) { $this->logo = $logo; }
    function getLogo() { return $this->logo; }
    function setGroupType($groupType) { $this->groupType = $groupType; }
    function getGroupType() { return $this->groupType; }
    function setCategory($category) { $this->category = $category; }
    function getCategory() { return $this->category; }
    function setTotalMember($totalMember) { $this->totalMember = $totalMember; }
    function getTotalMember() { return $this->totalMember; }
    function setTotalPosts($totalPosts) { $this->totalPosts = $totalPosts; }
    function getTotalPosts() { return $this->totalPosts; }
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
