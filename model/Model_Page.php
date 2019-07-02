<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model_Page
 *
 * @author Dulon
 */
class Model_Page {
    private $id;
    private $headline;
    private $content;
    private $imageId;
    private $totalVisit;
    private $category;
    private $postOn;
    private $postBy;
    private $status;
    private $type;
    private $comment;

    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setHeadline($headline) { $this->headline = $headline; }
    function getHeadline() { return $this->headline; }
    function setContent($content) { $this->content = $content; }
    function getContent() { return $this->content; }
    function setImageId($imageId) { $this->imageId = $imageId; }
    function getImageId() { return $this->imageId; }
    function setTotalVisit($totalVisit) { $this->totalVisit = $totalVisit; }
    function getTotalVisit() { return $this->totalVisit; }
    function setCategory($category) { $this->category = $category; }
    function getCategory() { return $this->category; }
    function setPostOn($postOn) { $this->postOn = $postOn; }
    function getPostOn() { return $this->postOn; }
    function setPostBy($postBy) { $this->postBy = $postBy; }
    function getPostBy() { return $this->postBy; }
    function setStatus($status) { $this->status = $status; }
    function getStatus() { return $this->status; }
    function setType($type) { $this->type = $type; }
    function getType() { return $this->type; }
    function setComment($comment) { $this->comment = $comment; }
    function getComment() { return $this->comment; }
}
