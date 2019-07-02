 <?php

require_once '../db/Kanexon.php';

class Users {

    private $conn = null;
    private $_table_name = "USERS";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_Table() {
        $Q = "CREATE TABLE IF NOT EXISTS " . $this->_table_name . " (
                ID BIGINT PRIMARY KEY AUTO_INCREMENT, 

                NAME VARCHAR(100),
                MOBILE_NO VARCHAR(15),
                EMAIL VARCHAR(100),
                PASSWORD VARCHAR(100),
                LOGO VARCHAR(100),
                ROLE VARCHAR(100),
                ACCESS VARCHAR(100),
                ADDRESS VARCHAR(100),
                DISTRICT VARCHAR(100),
                PARTY VARCHAR(100),
                GRANDER VARCHAR(1),
                FIRST_LETER VARCHAR(1),

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
