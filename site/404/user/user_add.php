<?php include '../../classes/user.php';
$user = new user();
if(isset($_POST['EMAIL']))
{
$email = $_POST['EMAIL']; 
$fname = $_POST['FNAME']; 
$lname = $_POST['LNAME']; 
$pass = $_POST['PASS']; 
$role = $_POST['ROLE']; 
$uname = explode('@', $email);
$user->setUserName($uname[0]);
$user->setEmail($email);
$user->setFIRST_NAME($fname);
$user->setLAST_NAME($lname);
$user->setPassword($pass);
$user->setAccess($role);
$user->setAddress("");
$user->setPhone("");
$user->setAbout("");
$user->Register();
}
?>