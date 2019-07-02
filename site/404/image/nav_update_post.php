<?php include '../../classes/Menu.php';
$menu = new Menu();
if(isset($_POST['ID']))
{
$id = $_POST['ID'];
$menu->loadvalue($id);
$up = ($menu->getIN_NAVBAR()==1) ? 0 : 1;
$menu->setNAME($menu->getNAME());
$menu->setIS_PAGE($menu->getIS_PAGE());
$menu->setIN_NAVBAR($up);
$menu->setPUBLISH($menu->getPUBLISH());
$menu->setUPDATE_BY(1);
$menu->setPERANT_ID($menu->getPERANT_ID());
$menu->setSERIAL_NO($menu->getSERIAL_NO());
$menu->setSUBMENU($menu->getSUBMENU());
$menu->Update($id);

}
?>