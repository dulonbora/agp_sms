<?php

require_once '../db/Kanexon.php';
require_once '../model/Model_Group.php';

class Group_List extends Model_Group {
    
    private $conn = null;
    private $_table_name = "GROUP_LIST";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }
    
    
    public function Insert(){
$query = "INSERT INTO ".$this->_table_name."(GROUP_NAME , DESCRIPTION , LOGO , GROUP_TYPE , CATEGORY , TOTAL_MEMBER , TOTAL_POSTS , USER_IP , CREATE_ON , CREATE_BY , MODIFY_ON , MODIFY_BY , STATUS , IS_ACTIVE) 
	VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?) " ; 
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $this->getGroupName()); 
	$stmt->bindParam (2 , $this->getDescription()); 
	$stmt->bindParam (3 , $this->getLogo()); 
	$stmt->bindParam (4 , $this->getGroupType()); 
	$stmt->bindParam (5 , $this->getCategory()); 
	$stmt->bindParam (6 , $this->getTotalMember()); 
	$stmt->bindParam (7 , $this->getTotalPosts()); 
	$stmt->bindParam (8 , $this->getUserIp()); 
	$stmt->bindParam (9 , $this->getCreateOn()); 
	$stmt->bindParam (10 , $this->getCreateBy()); 
	$stmt->bindParam (11 , $this->getModifyOn()); 
	$stmt->bindParam (12 , $this->getModifyBy()); 
	$stmt->bindParam (13 , $this->getStatus()); 
	$stmt->bindParam (14 , $this->getIsActive()); 

	$stmt->execute(); 
	$success = 1;
        $this->setId($this->conn->lastInsertId());
        
}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}


public function returnGroupName($userId) {
        $Q = "SELECT GROUP_NAME FROM ".$this->_table_name." WHERE ID = ?";
        $cno = "";
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $userId);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $cno = $row["GROUP_NAME"];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $cno;
    }
    
    
    


    public function Update($id){
$query = "UPDATE ".$this->_table_name." SET "
        . " GROUP_NAME = ?, DESCRIPTION = ?, GROUP_TYPE  = ?, CATEGORY  = ?, "
        . " MODIFY_ON  = ?, MODIFY_BY  = ? WHERE ID = ? " ; 
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $this->getGroupName()); 
	$stmt->bindParam (2 , $this->getDescription());
	$stmt->bindParam (3 , $this->getGroupType()); 
	$stmt->bindParam (4 , $this->getCategory()); 
	$stmt->bindParam (5 , $this->getModifyOn()); 
	$stmt->bindParam (6 , $this->getModifyBy());
	$stmt->bindParam (7 , $id);
	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}

public function CountTotal() {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ".$this->_table_name." WHERE IS_ACTIVE = 'YES' ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }
    
    public function loadAllPagging($start, $limit) {
        $Q = "SELECT * FROM ".$this->_table_name." WHERE IS_ACTIVE = 'YES' ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    

public function CountTotalSearch($s) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ".$this->_table_name." WHERE GROUP_NAME LIKE :str_search AND IS_ACTIVE = 'YES' ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindValue(':str_search' , "%".$s."%");
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }
    
    public function loadAllPaggingSearch($start, $limit, $s) {
        $Q = "SELECT * FROM ".$this->_table_name." WHERE GROUP_NAME LIKE :str_search AND IS_ACTIVE = 'YES' ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindValue(':str_search' , "%".$s."%");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    
        public function loadValue($id) {
        $Q = "SELECT * FROM ".$this->_table_name." WHERE ID = ?";
        $row = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->load($row);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $row;
    }
    
    function load($row){
        $this->setId($row['ID']);
            $this->setGroupName($row['GROUP_NAME']);
            $this->setDescription($row['DESCRIPTION']);
            $this->setLogo($row['LOGO']);
            $this->setGroupType($row['GROUP_TYPE']);
            $this->setCategory($row['CATEGORY']);
            $this->setTotalMember($row['TOTAL_MEMBER']);
            $this->setTotalPosts($row['TOTAL_POSTS']);
            $this->setUserIp($row['USER_IP']);
            $this->setCreateOn($row['CREATE_ON']);
            $this->setCreateBy($row['CREATE_BY']);
            $this->setCreateBy($row['CREATE_BY']);
            $this->setModifyOn($row['MODIFY_ON']);
            $this->setModifyBy($row['MODIFY_BY']);
            $this->setStatus($row['STATUS']);
            $this->setIsActive($row['IS_ACTIVE']);
            
    }
    
    

    

    
}

