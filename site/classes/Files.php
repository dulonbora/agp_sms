<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Files
 *
 * @author Dulon
 */
class Files {
    private $ID; 
    private $NAME;
    private $CAPTION;
    private $FILE_LINK;
    private $TYPE;
    private $POST_ID;
    
    
    public function Insert(){
        include('../include/database.php');
       
        $n = mysqli_real_escape_string($conn, $this->NAME);
        $c = mysqli_real_escape_string($conn, $this->CAPTION);
        $fl = mysqli_real_escape_string($conn, $this->FILE_LINK);
        $t = mysqli_real_escape_string($conn, $this->TYPE);
        $pid = mysqli_real_escape_string($conn, $this->POST_ID);
	mysqli_select_db($conn, $data);
        $save = "INSERT INTO FILE (NAME, CAPTION, FILE_LINK, TYPE, POST_ID) VALUES('$n', '$c', '$fl', '$t', '$pid')";	
        $success = mysqli_query($conn, $save) or die(mysqli_error($conn));
     //   $page = "../admin/Pages_View.php?i=$t";
      //  $this->pageRedirect($page);
}

    public function countFile($type, $pid) {
        $c = 0;
        include('../include/database.php');
        mysqli_select_db($conn, $data);
        $view = "SELECT COUNT(*) AS TOTAL FROM FILE WHERE TYPE = '$type' AND POST_ID = $pid";
        $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
        $rows = mysqli_fetch_assoc($v);
        if ($rows > 0) {$c = $rows['TOTAL'];}
        return $c;
        
    }
    public function FilesList($type, $pid) {
        include('../include/database.php');
        mysqli_select_db($conn, $data);
        $view = "SELECT * FROM FILE WHERE TYPE = '$type' AND POST_ID = $pid ORDER BY ID DESC";
        $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
        $rows = mysqli_fetch_assoc($v);
        if ($rows > 0) {
            do {
   echo "<div class='blog-list row clearfix'>";
                            echo "<div class='col-md-12 col-sm-12'>
                                    <h5><a href='view.php?i=".$rows['ID']."'><i class='glyphicon glyphicon-list'></i> ".$rows['NAME']."</a></h5>
                            </div>
                        </div>";
                
            } while ($rows = mysqli_fetch_assoc($v));
        }
    }


    
    
    
    	public function getID(){
		return $this->ID;
	}

	public function setID($ID){
		$this->ID = $ID;
	}

	public function getNAME(){
		return $this->NAME;
	}

	public function setNAME($NAME){
		$this->NAME = $NAME;
	}

	public function getCAPTION(){
		return $this->CAPTION;
	}

	public function setCAPTION($CAPTION){
		$this->CAPTION = $CAPTION;
	}

	public function getFILE_LINK(){
		return $this->FILE_LINK;
	}

	public function setFILE_LINK($FILE_LINK){
		$this->FILE_LINK = $FILE_LINK;
	}

	public function getTYPE(){
		return $this->TYPE;
	}

	public function setTYPE($TYPE){
		$this->TYPE = $TYPE;
	}

	public function getPOST_ID(){
		return $this->POST_ID;
	}

	public function setPOST_ID($POST_ID){
		$this->POST_ID = $POST_ID;
	}
}
