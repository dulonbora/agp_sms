<?php
class Settings {
    private $ID;
    private $PHONE_NO;
    private $ADDRESS;
    private $EMAIL;
    private $SITE_NAME;
    private $FB;
    private $TWITTER;
    private $LINKEDIN;
    private $GOOGLEPLUS;
    private $INSTAGRAM;
    private $SHORT_NOTE;
    private $STAFF;
    private $USER;
    private $EVENT;
    private $CO;
    private $GALLERY;
    
    
    public function update($id) {
        include('../../include/database.php');
        $ph = mysqli_real_escape_string($conn, $this->PHONE_NO);
        $add = mysqli_real_escape_string($conn, $this->ADDRESS);
        $e = mysqli_real_escape_string($conn, $this->EMAIL);
        $sn = mysqli_real_escape_string($conn, $this->SITE_NAME);
        $fb = mysqli_real_escape_string($conn, $this->FB);
        $tw = mysqli_real_escape_string($conn, $this->TWITTER);
        $lkin = mysqli_real_escape_string($conn, $this->LINKEDIN);
        $gp = mysqli_real_escape_string($conn, $this->GOOGLEPLUS);
        $ins = mysqli_real_escape_string($conn, $this->INSTAGRAM);
        $snote = mysqli_real_escape_string($conn, $this->SHORT_NOTE);
        $stf = mysqli_real_escape_string($conn, $this->STAFF);
        $usr = mysqli_real_escape_string($conn, $this->USER);
        $evnt = mysqli_real_escape_string($conn, $this->EVENT);
        $co = mysqli_real_escape_string($conn, $this->CO);
        $gal = mysqli_real_escape_string($conn, $this->GALLERY);

        mysqli_select_db($conn, $data);
        $save = "UPDATE SETTINGS SET PHONE_NO='$ph', ADDRESS='$add', EMAIL='$e', SITE_NAME='$sn', FB='$fb', TWITTER='$tw', "
                . "LINKEDIN='$lkin', GOOGLEPLUS='$gp', INSTAGRAM='$ins', SHORT_NOTE='$snote', STAFF='$stf', USER='$usr', EVENT='$evnt', CO='$co', GALLERY='$gal' WHERE ID = '$id'";

        $success = mysqli_query($conn, $save) or die(mysqli_error($conn));
        //$page = "Setings.php";
        //$this->pageRedirect($page);
    }

    
        public function loadvalue() {
        include('../../include/database.php');
        mysqli_select_db($conn, $data);
        $view = "SELECT * FROM SETTINGS ORDER BY ID DESC";
        $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
        $rows = mysqli_fetch_assoc($v);
        if ($rows > 0) {
            $this->ID = $rows['ID'];
            $this->SITE_NAME = $rows['SITE_NAME'];
            $this->PHONE_NO = $rows['PHONE_NO'];
            $this->ADDRESS = $rows['ADDRESS'];
            $this->EMAIL = $rows['EMAIL'];
            $this->FB = $rows['FB'];
            $this->TWITTER = $rows['TWITTER'];
            $this->LINKEDIN = $rows['LINKEDIN'];
            $this->GOOGLEPLUS = $rows['GOOGLEPLUS'];
            $this->INSTAGRAM = $rows['INSTAGRAM'];
            $this->SHORT_NOTE = $rows['SHORT_NOTE'];
            $this->STAFF = $rows['STAFF'];
            $this->USER = $rows['USER'];
            $this->CO = $rows['CO'];
            $this->EVENT = $rows['EVENT'];
            $this->GALLERY = $rows['GALLERY'];
        }
    }
    
    
        public function loadvalueSite() {
        include('include/database.php');
        mysqli_select_db($conn, $data);
        $view = "SELECT * FROM SETTINGS ORDER BY ID DESC";
        $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
        $rows = mysqli_fetch_assoc($v);
        if ($rows > 0) {
            $this->ID = $rows['ID'];
            $this->SITE_NAME = $rows['SITE_NAME'];
            $this->PHONE_NO = $rows['PHONE_NO'];
            $this->ADDRESS = $rows['ADDRESS'];
            $this->EMAIL = $rows['EMAIL'];
            $this->FB = $rows['FB'];
            $this->TWITTER = $rows['TWITTER'];
            $this->LINKEDIN = $rows['LINKEDIN'];
            $this->GOOGLEPLUS = $rows['GOOGLEPLUS'];
            $this->INSTAGRAM = $rows['INSTAGRAM'];
            $this->SHORT_NOTE = $rows['SHORT_NOTE'];
            $this->STAFF = $rows['STAFF'];
            $this->USER = $rows['USER'];
            $this->CO = $rows['CO'];
            $this->EVENT = $rows['EVENT'];
            $this->GALLERY = $rows['GALLERY'];
        }
    }

    
    	public function getID(){
		return $this->ID;
	}

	public function setID($ID){
		$this->ID = $ID;
	}

	public function getPHONE_NO(){
		return $this->PHONE_NO;
	}

	public function setPHONE_NO($PHONE_NO){
		$this->PHONE_NO = $PHONE_NO;
	}

	public function getADDRESS(){
		return $this->ADDRESS;
	}

	public function setADDRESS($ADDRESS){
		$this->ADDRESS = $ADDRESS;
	}

	public function getEMAIL(){
		return $this->EMAIL;
	}

	public function setEMAIL($EMAIL){
		$this->EMAIL = $EMAIL;
	}

	public function getSITE_NAME(){
		return $this->SITE_NAME;
	}

	public function setSITE_NAME($SITE_NAME){
		$this->SITE_NAME = $SITE_NAME;
	}

	public function getFB(){
		return $this->FB;
	}

	public function setFB($FB){
		$this->FB = $FB;
	}

	public function getTWITTER(){
		return $this->TWITTER;
	}

	public function setTWITTER($TWITTER){
		$this->TWITTER = $TWITTER;
	}

	public function getLINKEDIN(){
		return $this->LINKEDIN;
	}

	public function setLINKEDIN($LINKEDIN){
		$this->LINKEDIN = $LINKEDIN;
	}

	public function getGOOGLEPLUS(){
		return $this->GOOGLEPLUS;
	}

	public function setGOOGLEPLUS($GOOGLEPLUS){
		$this->GOOGLEPLUS = $GOOGLEPLUS;
	}

	public function getINSTAGRAM(){
		return $this->INSTAGRAM;
	}

	public function setINSTAGRAM($INSTAGRAM){
		$this->INSTAGRAM = $INSTAGRAM;
	}

	public function getSHORT_NOTE(){return $this->SHORT_NOTE;}
	public function setSHORT_NOTE($SHORT_NOTE){$this->SHORT_NOTE = $SHORT_NOTE;}
        

	public function getSTAFF(){return $this->STAFF;}
	public function setSTAFF($STAFF){$this->STAFF = $STAFF;}
        

	public function getUSER(){return $this->USER;}
	public function setUSER($USER){$this->USER = $USER;}
        

	public function getEVENT(){return $this->EVENT;}
	public function setEVENT($EVENT){$this->EVENT = $EVENT;}
        

	public function getCO(){return $this->CO;}
	public function setCO($CO){$this->CO = $CO;}
        
	public function getGALLERY(){return $this->GALLERY;}
	public function setGALLERY($GALLERY){$this->GALLERY = $GALLERY;}
        
        
}
