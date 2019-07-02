<?php
    error_reporting(0);
    if (session_status() == PHP_SESSION_NONE) {session_start();}
    include '../classes/Group_Members.php';

    $response = array();
    $response["SUCCESS"] = 0;

    $__gro = new Group_Members();

    $_user_id           = filter_input(INPUT_POST , "USER_ID");
    $_group_id          = filter_input(INPUT_POST , "GROUP_ID");

    $__gro->setUserId($_user_id);
    $__gro->setGroupId($_group_id);
    
   
    if($__gro->Delete()==1){$response["SUCCESS"] = 1;}

    echo json_encode($response);
    exit();
    
    ?>