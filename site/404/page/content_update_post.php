<?php include '../../classes/Menu.php';
$menu = new Menu();
if(isset($_POST['NAME']))
{
$nm = $_POST['NAME']; 
$id = $_POST['ID']; 
$content = $_POST['PAGE_CONTENT']; 
$menu->loadvalue($id);

$menu->setNAME($nm);
$menu->setIS_PAGE($menu->getIS_PAGE());
$menu->setIN_NAVBAR($menu->getIN_NAVBAR());
$menu->setPUBLISH($menu->getPUBLISH());
$menu->setCONTENT($content);
$menu->setUPDATE_BY(1);
$menu->setPERANT_ID($menu->getPERANT_ID());
$menu->setSERIAL_NO($menu->getSERIAL_NO());
$menu->setSUBMENU($menu->getSUBMENU());
$menu->Update($id);
$menu->pageRedirect("index.php");
}
?>