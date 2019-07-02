<?php

error_reporting(0);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../classes/Posts.php';
include '../classes/View_Group_Members.php';

$response = array();
$response["SUCCESS"] = 0;

$__View_Group_Members = new View_Group_Members();
$__pos = new Posts();

$_user_id = $_SESSION['USER_ID'];
$_group_id = filter_input(INPUT_POST, "GROUP_ID");
//$_parent_id         = filter_input(INPUT_POST , "PARENT_ID");
$_parent_id = 0;
$_is_replay = 0;
//$_is_replay         = filter_input(INPUT_POST , "IS_REPLAY");
$_subject = filter_input(INPUT_POST, "SUBJECT");
$_description = filter_input(INPUT_POST, "DESCRIPTION");
$_image_link = "";
//$_image_link        = filter_input(INPUT_POST , "IMAGE_LINK");
$_user_ip = "";
//$_user_ip           = filter_input(INPUT_POST , "USER_IP");
$_create_on = time();
$_create_by = $_SESSION['USER_ID'];
$_modify_on = time();
$_modify_by = $_SESSION['USER_ID'];
$_status = 1;
$_is_active = "YES";


$__pos->setUserId($_user_id);
$__pos->setGroupId($_group_id);
$__pos->setParentId(strlen($_parent_id) > 0 ? $_parent_id : 0);
$__pos->setIsReplay(strlen($_is_replay) > 0 ? $_is_replay : 0);
$__pos->setSubject($_subject);
$__pos->setDescription($_description);
$__pos->setImageLink(strlen($_image_link) > 0 ? $_image_link : "");
$__pos->setUserIp($_user_ip);
$__pos->setCreateOn($_create_on);
$__pos->setCreateBy($_create_by);
$__pos->setModifyOn($_modify_on);
$__pos->setModifyBy($_modify_by);
$__pos->setStatus($_status);
$__pos->setIsActive($_is_active);


$list       = $__View_Group_Members->loadAll($_group_id);
$EMaillist  = $__View_Group_Members->loadAll($_group_id);
$oook = 0;
if ($__pos->Insert() == 1) {}

$message = $_description;
$subject = $_subject;
$fromname = "Asom Gana Parishad";
$from = "join@asomganaparishad.com";


require '../phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = '127.0.0.1';
$mail->Port = 25;
$mail->setFrom('join@asomganaparishad.com', 'Asom Gana Parishad');
$mail->addReplyTo('join@asomganaparishad.com', 'Asom Gana Parishad');
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = $subject;
$mail->Body = $message;
$mail->AltBody = $message;
$mail->From = $from;
$mail->FromName = $fromname;

foreach ($list as $rows) {
        if($__pos->SendOtp($_subject, $rows['MOBILE_NO'])==1){}
    $mail->addBCC($rows['EMAIL']);     // Add a recipient
}
if ($mail->send()) {
    $oook = 1;
} else {
    $oook = 0;
}



if ($oook == 1) {
    $response["SUCCESS"] = 1;
}
echo json_encode($response);
exit();

?>
