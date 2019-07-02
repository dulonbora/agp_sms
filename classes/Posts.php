<?php

/**
 * Description of Ac_Voucher
 * date 2018/17/6
 * @author Dulon
 */

require_once '../db/Kanexon.php';
require_once '../model/Model_Post_Lists.php';

class Posts extends Model_Post_Lists {
    
    private $conn = null;
    private $_table_name = "POST_LIST";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }


    //put your code here
    
    public function Insert(){
$query = "INSERT INTO ".$this->_table_name."(USER_ID , GROUP_ID , PARENT_ID , IS_REPLAY , SUBJECT , DESCRIPTION , IMAGE_LINK , USER_IP , CREATE_ON , CREATE_BY , MODIFY_ON , MODIFY_BY , STATUS , IS_ACTIVE) 
	VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?) " ; 
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $this->getUserId()); 
	$stmt->bindParam (2 , $this->getGroupId()); 
	$stmt->bindParam (3 , $this->getParentId()); 
	$stmt->bindParam (4 , $this->getIsReplay()); 
	$stmt->bindParam (5 , $this->getSubject()); 
	$stmt->bindParam (6 , $this->getDescription()); 
	$stmt->bindParam (7 , $this->getImageLink()); 
	$stmt->bindParam (8 , $this->getUserIp()); 
	$stmt->bindParam (9 , $this->getCreateOn()); 
	$stmt->bindParam (10 , $this->getCreateBy()); 
	$stmt->bindParam (11 , $this->getModifyOn()); 
	$stmt->bindParam (12 , $this->getModifyBy()); 
	$stmt->bindParam (13 , $this->getStatus()); 
	$stmt->bindParam (14 , $this->getIsActive()); 

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}

 /*----------------------------------------------------------*/



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
            $this->setUserId($row['USER_ID']);
            $this->setGroupId($row['GROUP_ID']);
            $this->setParentId($row['PARENT_ID']);
            $this->setIsReplay($row['IS_REPLAY']);
            $this->setSubject($row['SUBJECT']);
            $this->setDescription($row['DESCRIPTION']);
            $this->setImageLink($row['IMAGE_LINK']);
            $this->setUserIp($row['USER_IP']);
            $this->setCreateOn($row['CREATE_ON']);
            $this->setCreateBy($row['CREATE_BY']);
            $this->setModifyOn($row['MODIFY_ON']);
            $this->setModifyBy($row['MODIFY_BY']);
            $this->setModifyBy($row['MODIFY_BY']);
            $this->setStatus($row['STATUS']);
            $this->setIsActive($row['IS_ACTIVE']);
            
    }
    
    
    
        public function SendOtp($massage, $numbers){
        $ok = 0;
        $MSG = $massage;
        $msg = urlencode($MSG);
        $to = $numbers;
        $fields = "username=excise&password=exercise&groupname=EXCISE&to=" . $to . "&msg=" . $msg;
        $url = "http://103.8.249.55/smsgwam/form_/send_api_excise_get.php?" . $fields;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPGET, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json'));
        $result = curl_exec($ch);
        if(strlen($result) > 50){$ok = 1;}
        curl_close($ch);
        return $ok;
    }
    
    
        
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
    


    
    
        
public function CountTotalByGroupId($id) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ".$this->_table_name." WHERE GROUP_ID = ? AND IS_ACTIVE = 'YES' ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }
    
    
    public function loadAllPaggingByGroupId($id, $start, $limit) {
        $Q = "SELECT * FROM ".$this->_table_name." WHERE GROUP_ID = ? AND IS_ACTIVE = 'YES' ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    



    

}

