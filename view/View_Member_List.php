<?php

require_once '../db/Kanexon.php';

class View_Member_List {

    private $conn = null;
    private $_view_name = "VIEW_MEMBER_LIST";

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    public function Create_View() {
        $Q ="CREATE OR REPLACE VIEW VIEW_MEMBER_LIST AS SELECT 
            GM.ID,
            GM.USER_ID,
            U.NAME,
            U.MOBILE_NO,
            U.EMAIL,
            U.LOGO,
            U.DISTRICT,
            U.PARTY,
            
            GM.GROUP_ID,
            GL.GROUP_NAME,
            GL.GROUP_TYPE,
            GL.DESCRIPTION,
            GL.CATEGORY,
            GM.ACTIVE_MAIL,
            GM.ACTIVE_PHONE,
            GM.ROLE

            FROM USERS as U
            INNER JOIN GROUP_MEMBERS as GM ON GM.USER_ID = U.ID
            INNER JOIN GROUP_LIST as GL ON GL.ID = GM.GROUP_ID 
            WHERE U.IS_ACTIVE = 'YES' AND GM.IS_ACTIVE = 'YES' ";

        try {
            $this->conn->exec($Q);
            echo $this->_view_name . " Table Created....<br/>";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}

?>
