<?php

require_once "../include/db.php";
require_once "../model/Model_Page.php";

class Pages extends Model_Page{

    private $conn = null;

    public function __construct() {
        $Database = new Kanexon();
        $this->conn = $Database->getDb();
    }

    
 /*----------------------------------------------------------*/
    
public function Insert(){
$query = "INSERT INTO PAGES(HEADLINE , CONTENT , IMAGE_ID , TOTAL_VISIT , CATEGORY , POST_ON , POST_BY , STATUS , TYPE , COMMENT) 
	VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ?) " ; 
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $this->getHeadline()); 
	$stmt->bindParam (2 , $this->getContent()); 
	$stmt->bindParam (3 , $this->getImageId()); 
	$stmt->bindParam (4 , $this->getTotalVisit()); 
	$stmt->bindParam (5 , $this->getCategory()); 
	$stmt->bindParam (6 , $this->getPostOn()); 
	$stmt->bindParam (7 , $this->getPostBy()); 
	$stmt->bindParam (8 , $this->getStatus()); 
	$stmt->bindParam (9 , $this->getType()); 
	$stmt->bindParam (10 , $this->getComment()); 

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}

 /*----------------------------------------------------------*/

public function Update($id){
$query = "UPDATE PAGES SET HEADLINE = ? , CONTENT = ? , CATEGORY = ? , STATUS = ? , TYPE = ? , COMMENT = ? 
	WHERE ID = ? ";
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $this->getHeadline()); 
	$stmt->bindParam (2 , $this->getContent()); 
	$stmt->bindParam (3 , $this->getCategory()); 
	$stmt->bindParam (4 , $this->getStatus()); 
	$stmt->bindParam (5 , $this->getType()); 
	$stmt->bindParam (6 , $this->getComment()); 
	$stmt->bindParam (7 , $id); 

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}

 /*----------------------------------------------------------*/



    public function UpdateAlbumSingle($colm, $id, $getValue) {
        $query = "UPDATE PAGES SET $colm = ?  
	WHERE ID = ? ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $getValue);
            $stmt->bindParam(2, $id);
            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }

    public function CheckAlreadyExit($sid) {
        $query = "SELECT * FROM PAGES WHERE HEADLINE =?";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $sid);
            $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        $rows = $stmt->fetch();
        if ($rows > 0) {
            $success = 1;
        }
        return $success;
    }

    public function getTotal($id) {
        $Q = "SELECT COUNT(*) AS TOTAL FROM PAGES WHERE TYPE = ? ";
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

    public function allFecth($start, $limit, $type) {
        $Q = "SELECT * FROM PAGES WHERE TYPE = ? ORDER BY ID DESC LIMIT " . $start . " ," . $limit . " ";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $type);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }

    public function substrwords($text, $maxchar, $end = '') {
        if (strlen($text) > $maxchar || $text == '') {
            $words = preg_split('/\s/', $text);
            $output = '';
            $i = 0;
            while (1) {
                $length = strlen($output) + strlen($words[$i]);
                if ($length > $maxchar) {
                    break;
                } else {
                    $output .= " " . $words[$i];
                    ++$i;
                }
            }
            $output .= $end;
        } else {
            $output = $text;
        }
        return $output;
    }


    public function loadValue($id) {
        $Q = "SELECT * FROM PAGES WHERE ID = $id";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->setId($row['ID']);
            $this->setHeadline($row['HEADLINE']);
            $this->setContent($row['CONTENT']);
            $this->setImageId($row['IMAGE_ID']);
            $this->setTotalVisit($row['TOTAL_VISIT']);
            $this->setPostBy($row['POST_BY']);
            $this->setPostOn($row['POST_ON']);
            $this->setType($row['TYPE']);
            $this->setComment($row['COMMENT']);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }

    /* --------------------------------------------- */
    
            public function date($dt){
        $dat = $dt / 1000;
        $daaat = date('d-m-Y', $dat);
        $date = "";
        $category = "";
        $ddt = explode('-', $daaat);
        switch ($ddt[1]){
        case 1: $category = "Jan"; break;
        case 2: $category = "Feb"; break;
        case 3: $category = "Mar"; break;
        case 4: $category = "Apr"; break;
        case 5: $category = "May"; break;
        case 6: $category = "Jun"; break;
        case 7: $category = "Jul"; break;
        case 8: $category = "Aug"; break;
        case 9: $category = "Sep"; break;
        case 10: $category = "Oct"; break;
        case 11: $category = "Nov"; break;
        default : $category = "Dec";
    }
    $date = $category." ".$ddt[0]." ".$ddt[2];
        return $date;
    }

    function pageRedirect($page) {
        echo "<script type=\"text/javascript\">	";
        echo "document.location = '" . $page . "' ";
        echo "</script>";
    }

}
