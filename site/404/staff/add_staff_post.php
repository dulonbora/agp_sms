<?php
include '../../classes/Staff.php'; 
include '../../classes/user.php'; 
$staff = new Staff();
$user = new user();


if($_SERVER['REQUEST_METHOD']=='POST'){
$email = $_POST['EMAIL']; 
$fname = $_POST['FNAME']; 
$lname = $_POST['LNAME']; 
$adddess = $_POST['ADDRESS']; 
$about = $_POST['ABOUT']; 
$Phone = $_POST['PHONE']; 
$uname = explode('@', $email);

$subject = $_POST['SUBJECT'];
$qualification = $_POST['QUALIFICATION'];
$designation = $_POST['DESIGNATION'];
$cat_id = $_POST['CATEGORY_ID'];

$user->setUserName($uname[0]);
$user->setEmail($email);
$user->setFIRST_NAME($fname);
$user->setLAST_NAME($lname);
$user->setPassword("123456".$user->getLastId()+1);
$user->setAccess("staff");
$user->setAddress($adddess);
$user->setPhone($Phone);
$user->setAbout($about);
$user->Register();
$staff->setCATEGORY_ID($cat_id);
$staff->setSUBJECT($subject);
$staff->setQUALIFICATION($qualification);
$staff->setDESIGNATION($designation);
$staff->setUSER_ID($user->getLastId());
$staff->AddStaff();    
}

?>

