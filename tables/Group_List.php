 <?php

require_once '../db/Kanexon.php';

class Group_List {

    private $conn = null;
    private $_table_name = "GROUP_LIST";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_Table() {
        $Q = "CREATE TABLE IF NOT EXISTS " . $this->_table_name . " (
                ID BIGINT PRIMARY KEY AUTO_INCREMENT, 

                GROUP_NAME VARCHAR(200),
                DESCRIPTION VARCHAR(200),
                LOGO VARCHAR(50),
                GROUP_TYPE VARCHAR(20),
                CATEGORY VARCHAR(20),
                TOTAL_MEMBER INTEGER,
                TOTAL_POSTS INTEGER,
                USER_IP VARCHAR(200),

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
