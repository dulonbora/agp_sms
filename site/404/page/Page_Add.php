<?php include '../../classes/Menu.php';

$menu = new Menu();


if(isset($_POST['NAME']))
{
$nm = $_POST['NAME']; 
$p = $_POST['PUBLISH']; 
$prntid = $_POST['PARENT']; 
$con = $_POST['CONTENT']; 


$menu->setNAME($nm);
$menu->setIS_PAGE(1);
$menu->setCONTENT($con);
$menu->setIN_NAVBAR(0);
$menu->setPUBLISH($p);
$menu->setPOST_BY(1);
$menu->setUPDATE_BY(1);
$menu->setPERANT_ID($prntid);
$menu->setSERIAL_NO(1);
$menu->setSUBMENU(0);
$menu->AddPost();

}
?>