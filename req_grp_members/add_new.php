<?php
    error_reporting(0);
    if (session_status() == PHP_SESSION_NONE) {session_start();}
    include '../classes/Group_Members.php';

    $response = array();
    $response["SUCCESS"] = 0;

    $__gro = new Group_Members();

    $_user_id           = filter_input(INPUT_POST , "USER_ID");
    $_group_id          = filter_input(INPUT_POST , "GROUP_ID");
    $_active_mail       = 1;
    $_active_phone      = 1;
    $_role              = "USER";
    $_user_ip           = filter_input(INPUT_POST , "USER_IP");
    $_create_on         = time();
    $_create_by         = $_SESSION['USER_ID'];
    $_modify_on         = time();
    $_modify_by         = $_SESSION['USER_ID'];
    $_status            = 1;
    $_is_active         = "YES";


    $__gro->setUserId($_user_id);
    $__gro->setGroupId($_group_id);
    $__gro->setActiveMail($_active_mail);
    $__gro->setActivePhone($_active_phone);
    $__gro->setRole($_role);
    $__gro->setUserIp($_user_ip);
    $__gro->setCreateOn($_create_on);
    $__gro->setCreateBy($_create_by);
    $__gro->setModifyOn($_modify_on);
    $__gro->setModifyBy($_modify_by);
    $__gro->setStatus($_status);
    $__gro->setIsActive($_is_active);
    
    
    
    $i = $__gro->ChecAlreadyExit();
    if($i > 0){$response["SUCCESS"] = 2;}
    else {
    if($__gro->Insert()==1){$response["SUCCESS"] = 1;}
    }

    echo json_encode($response);
    exit();
    
    ?>