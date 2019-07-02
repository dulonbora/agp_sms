<?php

/**
 * Description of Model_Group_Members
 * date 2018/17/6
 * @author Dulon
 */
require_once '../db/Kanexon.php';
require_once '../model/Model_Group_Members.php';

class View_Group_Members extends Model_Group_Members {

    private $conn = null;
    private $_table_name = "VIEW_MEMBER_LIST";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

        
public function CountTotal($id) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ".$this->_table_name." WHERE GROUP_ID = ? ";
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
    
    public function loadAllPagging($id, $start, $limit) {
        $Q = "SELECT * FROM ".$this->_table_name." WHERE GROUP_ID = ? ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
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
        
public function CountTotalByMember($id) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ".$this->_table_name." WHERE USER_ID = ? ";
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
    
    public function loadAllPaggingByMember($id, $start, $limit) {
        $Q = "SELECT * FROM ".$this->_table_name." WHERE USER_ID = ? ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
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
    
    
    public function loadAll($id) {
        $Q = "SELECT * FROM ".$this->_table_name." WHERE GROUP_ID = ? ";
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
    
    public function loadAllByGroups($id) {
        //$Q = $id;
        $result = null;
        try {
            $stmt = $this->conn->prepare($id);
        //    $stmt->bindParam(1, $id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    public function loadAllEmail($id) {
        $Q = "SELECT EMAIL FROM ".$this->_table_name." WHERE GROUP_ID = ? ";
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
    
    
        
    
        public function UserRole($gid, $uid) {
        $ok = 0;
        $Q = "SELECT ROLE FROM ".$this->_table_name." WHERE GROUP_ID = ? AND USER_ID = ? ";
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $gid);
            $stmt->bindParam(2, $uid);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $ok = $row["ROLE"];
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        return $ok;
    }
    

    /* ---------------------------------------------------------- */
}
