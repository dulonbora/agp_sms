<?php

/**
 * Description of Model_Group_Members
 * date 2018/17/6
 * @author Dulon
 */
require_once '../db/Kanexon.php';
require_once '../model/Model_Group_Members.php';

class Group_Members extends Model_Group_Members {

    private $conn = null;
    private $_table_name = "GROUP_MEMBERS";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    //put your code here

    public function Insert() {
        $query = "INSERT INTO " . $this->_table_name . "(USER_ID , GROUP_ID , ACTIVE_MAIL , ACTIVE_PHONE , ROLE , USER_IP , CREATE_ON , CREATE_BY , MODIFY_ON , MODIFY_BY , STATUS , IS_ACTIVE) 
	VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?) ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->getUserId());
            $stmt->bindParam(2, $this->getGroupId());
            $stmt->bindParam(3, $this->getActiveMail());
            $stmt->bindParam(4, $this->getActivePhone());
            $stmt->bindParam(5, $this->getRole());
            $stmt->bindParam(6, $this->getUserIp());
            $stmt->bindParam(7, $this->getCreateOn());
            $stmt->bindParam(8, $this->getCreateBy());
            $stmt->bindParam(9, $this->getModifyOn());
            $stmt->bindParam(10, $this->getModifyBy());
            $stmt->bindParam(11, $this->getStatus());
            $stmt->bindParam(12, $this->getIsActive());

            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }
    
    
    
    public function ChecAlreadyExit(){
    $ok = 0;
    $query = "SELECT ID FROM " . $this->_table_name . " WHERE USER_ID = ? AND GROUP_ID = ? AND IS_ACTIVE = 'YES'";
    try{
    $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->getUserId());
        $stmt->bindParam(2, $this->getGroupId());
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $ok = 1;
        }
     } catch(PDOException $ex){echo $ex->getMessage();}
    
return $ok;
}



    public function UpdateRole() {
        $query = "UPDATE " . $this->_table_name . " SET ROLE = ? WHERE GROUP_ID = ? AND USER_ID = ? ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->getRole());
            $stmt->bindParam(2, $this->getGroupId());
            $stmt->bindParam(3, $this->getUserId());

            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }


    public function Delete() {
        $query = "DELETE FROM " . $this->_table_name . " WHERE GROUP_ID = ? AND USER_ID = ? ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->getGroupId());
            $stmt->bindParam(2, $this->getUserId());

            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }
    

    /* ---------------------------------------------------------- */
}
