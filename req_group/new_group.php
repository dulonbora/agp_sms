    <?php

    error_reporting(0);
    if (session_status() == PHP_SESSION_NONE) {session_start();}
    include '../classes/Group_List.php';
    include '../classes/Group_Members.php';

    $response = array();
    $response["SUCCESS"] = 0;

    $__gro              = new Group_List();
    $__Group_Members    = new Group_Members();

    $_id                = filter_input(INPUT_POST, "ID");
    $_group_name        = filter_input(INPUT_POST, "GROUP_NAME");
    $_description       = filter_input(INPUT_POST, "DESCRIPTION");
    $_logo              = "logo.jpg";
    $_group_type        = filter_input(INPUT_POST, "GROUP_TYPE");
    $_category          = filter_input(INPUT_POST, "CATEGORY");
    $_total_member      = 0;
    $_total_posts       = 0;
    $_user_ip           = filter_input(INPUT_POST, "USER_IP");
    $_create_on         = time();
    $_create_by         = $_SESSION['USER_ID'];
    $_modify_on         = time();
    $_modify_by         = $_SESSION['USER_ID'];
    $_status            = 1;
    $_is_active         = "YES";


    $__gro->setGroupName($_group_name);
    $__gro->setDescription($_description);
    $__gro->setLogo($_logo);
    $__gro->setGroupType($_group_type);
    $__gro->setCategory($_category);
    $__gro->setTotalMember($_total_member);
    $__gro->setTotalPosts($_total_posts);
    $__gro->setUserIp($_user_ip);
    $__gro->setCreateOn($_create_on);
    $__gro->setCreateBy($_create_by);
    $__gro->setModifyOn($_modify_on);
    $__gro->setModifyBy($_modify_by);
    $__gro->setStatus($_status);
    $__gro->setIsActive($_is_active);

    if ($_id > 0) {
        if ($__gro->Update($_id) == 1) {
            $response["SUCCESS"] = 2;
        }
    } else {
        if ($__gro->Insert() == 1) {
            $__Group_Members->setRole('A');            
            $__Group_Members->setGroupId($__gro->getId());            
            $__Group_Members->setUserId($_SESSION['USER_ID']);            
            $__Group_Members->setCreateBy($_SESSION['USER_ID']);            
            $__Group_Members->setCreateOn(time());            
            $__Group_Members->setModifyBy($_SESSION['USER_ID']);            
            $__Group_Members->setModifyOn(time());
            $__Group_Members->setIsActive("YES");
            $__Group_Members->Insert();
            $response["SUCCESS"] = 1;
        }
    }

    echo json_encode($response);
    exit();
    ?>