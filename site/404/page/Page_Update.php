<?php include '../../classes/Menu.php';

$menu = new Menu();


if(isset($_POST['NAME']))
{
$nm = $_POST['NAME']; 
$con = $_POST['PAGE_CONTENT']; 


$menu->setNAME($nm);
$menu->setIS_PAGE(1);
$menu->setCONTENT($con);
$menu->setIN_NAVBAR(0);
$menu->setPUBLISH(1);
$menu->setPOST_BY(1);
$menu->setUPDATE_BY(1);
$menu->setPERANT_ID(0);
$menu->setSERIAL_NO(1);
$menu->setSUBMENU(0);
$menu->Update();

}
?>