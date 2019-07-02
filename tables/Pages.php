 <?php

require_once '../db/Kanexon.php';

class Pages {

    private $conn = null;
    private $_table_name = "PAGES";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

        public function Create_Table() {
        $enq = "CREATE TABLE IF NOT EXISTS " . $this->_table_name . " (
        ID BIGINT PRIMARY KEY AUTO_INCREMENT , 
        HEADLINE TEXT,
        CONTENT LONGTEXT, 
        IMAGE_ID TEXT, 
        TOTAL_VISIT INTEGER, 
        CATEGORY VARCHAR(50), 
        POST_ON BIGINT, 
        POST_BY INTEGER, 
        COMMENT INTEGER,
        STATUS INTEGER,
        TYPE INTEGER)";
        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo $this->_table_name . " Table Created....<br/>";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }


}

?>
