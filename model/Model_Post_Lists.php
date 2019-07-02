<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Post_Lists
 *
 * @author Dulon
 */
class Model_Post_Lists {
    public function __construct() {}
    private $id                 = 0;
    private $userId             = 0;
    private $groupId            = 0;
    private $parentId           = 0;
    private $isReplay           = 0;
    private $subject            = "";
    private $description        = "";
    private $imageLink          = "";
    private $userIp             = "";
    private $createOn           = 0;
    private $createBy           = 0;
    private $modifyOn           = 0;
    private $modifyBy           = 0;
    private $status             = 0;
    private $isActive           = "YES";

    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setUserId($userId) { $this->userId = $userId; }
    function getUserId() { return $this->userId; }
    function setGroupId($groupId) { $this->groupId = $groupId; }
    function getGroupId() { return $this->groupId; }
    function setParentId($parentId) { $this->parentId = $parentId; }
    function getParentId() { return $this->parentId; }
    function setIsReplay($isReplay) { $this->isReplay = $isReplay; }
    function getIsReplay() { return $this->isReplay; }
    function setSubject($subject) { $this->subject = $subject; }
    function getSubject() { return $this->subject; }
    function setDescription($description) { $this->description = $description; }
    function getDescription() { return $this->description; }
    function setImageLink($imageLink) { $this->imageLink = $imageLink; }
    function getImageLink() { return $this->imageLink; }
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
