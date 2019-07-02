<?php include '../../classes/Menu.php';
$menu = new Menu();
if(isset($_POST['NAME']))
{
$CATID = $_POST['NAME']; 
$id = $_POST['ID']; 
$menu->loadvalue($id);

$menu->setNAME($menu->getNAME());
$menu->setIS_PAGE($menu->getIS_PAGE());
$menu->setIN_NAVBAR($menu->getIN_NAVBAR());
$menu->setPUBLISH($menu->getPUBLISH());
$menu->setUPDATE_BY(1);
$menu->setPERANT_ID($CATID);
$menu->setSERIAL_NO($menu->getSERIAL_NO());
$menu->setSUBMENU($menu->getSUBMENU());
$menu->Update($id);

}
?>