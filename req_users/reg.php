<?php
    error_reporting(0);

include '../classes/Users.php';
$Users = new Users();
$response = array(); 
$response["SUCCESS"] = 0;


$_name          = filter_input(INPUT_POST , "NAME");
$_mobile_no     = filter_input(INPUT_POST , "MOBILE_NO");
$_email         = filter_input(INPUT_POST , "EMAIL");
$_password      = filter_input(INPUT_POST , "PASSWORD");
$_password1     = filter_input(INPUT_POST , "PASSWORD1");
$_logo          = "";
$_role          = filter_input(INPUT_POST , "ROLE");
$_access        = filter_input(INPUT_POST , "ACCESS");
$_address       = filter_input(INPUT_POST , "ADDRESS");
$_district      = filter_input(INPUT_POST , "DISTRICT");
$_party         = filter_input(INPUT_POST , "PARTY");
$_grander       = filter_input(INPUT_POST , "GRANDER");
$_create_on     = time();
$_create_by     = 0;
$_modify_on     = time();
$_modify_by     = 0;
$_status        = 1;
$_is_active     = "";


$Users->setName($_name);
$Users->setMobileNo($_mobile_no);
$Users->setEmail($_email);
$Users->setPassword($_password);
$Users->setLogo($_logo);
$Users->setRole($_role);
$Users->setAccess($_access);
$Users->setAddress($_address);
$Users->setDistrict($_district);
$Users->setParty($_party);
$Users->setCreateOn($_create_on);
$Users->setCreateBy($_create_by);
$Users->setModifyOn($_modify_on);
$Users->setModifyBy($_modify_by);
$Users->setStatus($_status);
$Users->setGrander($_grander);
$Users->setFirst_leter($_name[0]);
$Users->setIsActive("YES");

$ok = 1;

if($Users->CheckEmail($_email)>0){$response["SUCCESS"] = 2; $ok = 0;}
if($Users->phoneIsUniq($_mobile_no)>0){$response["SUCCESS"] = 3; $ok = 0;}
if($_password!=$_password1){$response["SUCCESS"] = 4; $ok = 0;}

if($ok > 0){if($Users->Insert()==1){$response["SUCCESS"] = 1;}}


echo json_encode($response);
exit();
