<?php

require_once '../db/Kanexon.php';
require_once '../model/Model_Users.php';

class Users extends Model_Users {
    
    private $conn = null;
    private $_table_name = "USERS";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }
    
    
    public function Insert(){
$query = "INSERT INTO ".$this->_table_name."(NAME , MOBILE_NO , EMAIL , PASSWORD , LOGO , ROLE , ACCESS , ADDRESS , DISTRICT , PARTY , CREATE_ON , CREATE_BY , MODIFY_ON , MODIFY_BY , STATUS , IS_ACTIVE, GRANDER, FIRST_LETER) 
	VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?, ?, ?) " ; 
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $this->getName()); 
	$stmt->bindParam (2 , $this->getMobileNo()); 
	$stmt->bindParam (3 , $this->getEmail()); 
	$stmt->bindParam (4 , $this->getPassword()); 
	$stmt->bindParam (5 , $this->getLogo()); 
	$stmt->bindParam (6 , $this->getRole()); 
	$stmt->bindParam (7 , $this->getAccess()); 
	$stmt->bindParam (8 , $this->getAddress()); 
	$stmt->bindParam (9 , $this->getDistrict()); 
	$stmt->bindParam (10 , $this->getParty()); 
	$stmt->bindParam (11 , $this->getCreateOn()); 
	$stmt->bindParam (12 , $this->getCreateBy()); 
	$stmt->bindParam (13 , $this->getModifyOn()); 
	$stmt->bindParam (14 , $this->getModifyBy()); 
	$stmt->bindParam (15 , $this->getStatus()); 
	$stmt->bindParam (16 , $this->getIsActive()); 
	$stmt->bindParam (17 , $this->getGrander()); 
	$stmt->bindParam (18 , $this->getFirst_leter()); 

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}

 /*----------------------------------------------------------*/

    /**
     * Function UpdateSingle()
     * Call This Function For Single Column Update
     * Peram $col is column Name 
     * Peram $val is value from form or hidden value 
     * Peram $id is row unique id 
     */
    public function UpdateSingle($Column, $Value, $id) {
        $query = "UPDATE ".$this->_table_name." SET ".$Column." = ? WHERE ID = ? ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $Value);
            $stmt->bindParam(2, $id);

            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }

    /* ---------------------------------------------------------- */

    /**
     * Function emailIsUniq()
     * Check Email ID is already Exits
     * Peram $Email is user email  
     */
    public function emailIsUniq($Email) {
        $ok = 0;
        $query = "SELECT ID FROM ".$this->_table_name." WHERE EMAIL = ? ";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $Email);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $ok = 1;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }
    
    public function CheckEmail($Email) {
        $ok = 0;
        $query = "SELECT ID FROM ".$this->_table_name." WHERE EMAIL = ? ";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $Email);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $ok = $row['ID'];
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }

    /* ---------------------------------------------------------- */

    /**
     * Function phoneIsUniq()
     * Check Phone Number is already Exits
     * Peram $phone is user phone  
     */
    public function phoneIsUniq($phone) {
        $ok = 0;
        $query = "SELECT ID FROM ".$this->_table_name." WHERE MOBILE_NO = ? ";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $phone);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $ok = 1;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }

    /* ---------------------------------------------------------- */

    /**
     * Function forgetPassword()
     * Check To retrive date against this Email 
     */
    public function forgetPassword($email) {
        $ok = "";
        $query = "SELECT PASSWORD FROM USERS WHERE MOBILE_NO = ? ";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $email);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row > 0) {
                $ok = $row['PASSWORD'];
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        return $ok;
    }

    /*---------------------------------------------------------- */

    public function changeAccess($Access, $id) {
        $Q = "UPDATE ".$this->_table_name." SET ACCESS = ? WHERE ID = ? ";
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $Access);
            $stmt->bindParam(2, $id);
            $stmt->execute();
        } catch (PDOException $ex) {
            $ex->getMessage();
        }
    }

    /* ---------------------------------------------------------- */

    /**
     * Function login()
     * This Function For User Login
     * Peram $email is user Email  
     * Peram $passWord is user password  
     */
    public function login($email, $passWord) {
        $query = "SELECT * FROM ".$this->_table_name." WHERE (EMAIL = ? OR MOBILE_NO = ?) AND PASSWORD  = ? AND IS_ACTIVE = 'YES'";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $email);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $passWord);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row > 0) {
                $this->SessionSetter($row);
                $ok = 1;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }
    
    
    public function forget($email) {
        $query = "SELECT ID FROM ".$this->_table_name." WHERE MOBILE_NO = ? AND IS_ACTIVE = 'YES'";
        $ok = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $email);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row > 0) {
                $ok = $row["ID"];
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $ok;
    }
    
    public function SessionSetter($row) {
        if(session_status()==PHP_SESSION_NONE){session_start();}
        $_SESSION['USER_ID']        = $row['ID'];
        $_SESSION['NAME']           = $row['NAME'];
        $_SESSION['MOBILE_NO']      = $row['MOBILE_NO'];
        $_SESSION['EMAIL']          = $row['EMAIL'];
        $_SESSION['PASSWORD']       = $row['PASSWORD'];
        $_SESSION['LOGO']           = $row['LOGO'];
        $_SESSION['ROLE']           = $row['ROLE'];
        $_SESSION['ACCESS']         = $row['ACCESS'];
        $_SESSION['ADDRESS']        = $row['ADDRESS'];
        $_SESSION['DISTRICT']       = $row['DISTRICT'];
        $_SESSION['PARTY']          = $row['PARTY'];
        $_SESSION['STATUS']         = $row['STATUS'];
        $_SESSION['IS_ACTIVE']      = $row['IS_ACTIVE'];
        $_SESSION['GRANDER']        = $row['GRANDER'];
        $_SESSION['FIRST_LETER']    = $row['FIRST_LETER'];
        
    }
    
    public function GoToPageAfterLogin() {
        if(session_status()==PHP_SESSION_NONE){session_start();}
        $this->UpdateSingle("LAST_LOGED", time(), $_SESSION['USER_ID']);
        if ($_SESSION['ACCESS']=="ADMIN")       {$this->pageRedirect("../admin/index.php");}
        else if($_SESSION['ACCESS']=="PARTNER") {$this->pageRedirect("../partner/index.php");}
        else if($_SESSION['ACCESS']=="USER")    {$this->pageRedirect("../user/index.php");}
        
    }


    /* ---------------------------------------------------------- */

    /**
     * Function logOut()
     * This Function Will Destroy The All Session
     */
    public function logOut() {
        if(session_status()==PHP_SESSION_NONE){session_start();}
        $_SESSION['USER_ID']    = NULL;
        $_SESSION['EMAIL']      = NULL;
        $_SESSION['NAME']       = NULL;
        $_SESSION['ACCESS']     = NULL;

        unset($_SESSION['USER_ID']);
        unset($_SESSION['EMAIL']);
        unset($_SESSION['NAME']);
        unset($_SESSION['ACCESS']);
        $this->pageRedirect("../main/index.php");
    }

    /* ---------------------------------------------------------- */
    /**
     * Function RestrictUserIfNotLogin()
     * This Function Check User Is Logged Or not , if he is not logged then redrict to login page
     */
    public function restrict_if_no_access($_user_access) {
        if(session_status()==PHP_SESSION_NONE){session_start();}
        
        if($_SESSION["ACCESS"] == NULL || strcmp($_SESSION["ACCESS"], $_user_access) !=0){
            $this->pageRedirect("../user/login.php");
        }
    }

    /* ---------------------------------------------------------- */

    /**
     * Function logOut()
     * This Function will Set All Value Of User In This class you can call any value by get();
     */
    public function loadValue($id) {
        $Q = "SELECT * FROM USERS WHERE ID = ?";
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->setId($row['ID']);
            $this->setName($row['NAME']);
            $this->setMobileNo($row['MOBILE_NO']);
            $this->setEmail($row['EMAIL']);
            $this->setPassword($row['PASSWORD']);
            $this->setLogo($row['LOGO']);
            $this->setRole($row['ROLE']);
            $this->setAccess($row['ACCESS']);
            $this->setAddress($row['ADDRESS']);
            $this->setDistrict($row['DISTRICT']);
            $this->setParty($row['PARTY']);
            $this->setCreateOn($row['CREATE_ON']);
            $this->setCreateBy($row['CREATE_BY']);
            $this->setModifyOn($row['MODIFY_ON']);
            $this->setModifyBy($row['MODIFY_BY']);
            $this->setStatus($row['STATUS']);
            $this->setIsActive($row['IS_ACTIVE']);            
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
   
    /* --------------------------------------------------------------- */

//This javascript function will redirect a another page
//after the execution of a function.
    public function pageRedirect($page) {
        echo "<script type=\"text/javascript\">	";
        echo "document.location = '" . $page . "' ";
        echo "</script>";
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
    
    
    
    
public function CountTotalSearch($s) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ".$this->_table_name." WHERE NAME LIKE :str_search AND IS_ACTIVE = 'YES' ";
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
        $Q = "SELECT * FROM ".$this->_table_name." WHERE NAME LIKE :str_search AND IS_ACTIVE = 'YES' ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
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
    
    
    public function loadAllLetters() {
        $Q = "SELECT distinct FIRST_LETER FROM ".$this->_table_name." WHERE IS_ACTIVE = 'YES' ORDER BY FIRST_LETER ";
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
    
    
    
        
    
    
public function CountTotalByLtr($ltr) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM ".$this->_table_name." WHERE FIRST_LETER  = ? AND IS_ACTIVE = 'YES' ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $ltr);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }
    

    public function loadAllPaggingLtr($ltr, $start, $limit) {
        $Q = "SELECT * FROM ".$this->_table_name." WHERE FIRST_LETER  = ? AND IS_ACTIVE = 'YES' ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $ltr);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    
    
    


}
