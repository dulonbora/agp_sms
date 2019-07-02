 <?php

require_once '../db/Kanexon.php';

class Post_List {

    private $conn = null;
    private $_table_name = "POST_LIST";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_Table() {
        $Q = "CREATE TABLE IF NOT EXISTS " . $this->_table_name . " (
                ID BIGINT PRIMARY KEY AUTO_INCREMENT, 

                USER_ID BIGINT,
                GROUP_ID BIGINT,
                PARENT_ID BIGINT,
                IS_REPLAY INTEGER,
                SUBJECT VARCHAR(200),
                DESCRIPTION LONGTEXT,
                IMAGE_LINK VARCHAR(20),
                
                USER_IP VARCHAR(20),

                STATUS INTEGER, 
                CREATE_ON BIGINT, 
                CREATE_BY BIGINT,
                MODIFY_BY BIGINT,
                MODIFY_ON BIGINT, 
                IS_ACTIVE VARCHAR(3)) ";
        try {
            $this->conn->exec($Q);
            echo $this->_table_name . " Table Created....<br/>";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}

?>
