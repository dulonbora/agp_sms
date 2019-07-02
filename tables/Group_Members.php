 <?php

require_once '../db/Kanexon.php';

class Group_Members {

    private $conn = null;
    private $_table_name = "GROUP_MEMBERS";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_Table() {
        $Q = "CREATE TABLE IF NOT EXISTS " . $this->_table_name . " (
                ID BIGINT PRIMARY KEY AUTO_INCREMENT, 

                USER_ID BIGINT,
                GROUP_ID BIGINT,
                ACTIVE_MAIL INTEGER,
                ACTIVE_PHONE INTEGER,
                ROLE VARCHAR(20),
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
