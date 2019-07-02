<?php include '../../classes/Menu.php';

$menu = new Menu();


if(isset($_POST['NAME']))
{
$nm = $_POST['NAME']; 
$ip = $_POST['PAGE']; 
$in = $_POST['NAVBAR']; 
$p = $_POST['PUBLISH']; 
$prntid = $_POST['PARENT']; 
$sub = $_POST['SUBMENU']; 

/*
$nm = filter_input(FILTER_SANITIZE_STRING, 'NAME');
$ip = filter_input(INPUT_GET, 'IS_PAGE');
$in = filter_input(INPUT_GET, 'IS_NAVBAR');
$p = filter_input(INPUT_GET, 'IS_PUBLISH');
$prntid = filter_input(INPUT_GET, 'PARENT_ID');
$sub = filter_input(INPUT_GET, 'IS_SUBMENU');
*/

$menu->setNAME($nm);
$menu->setIS_PAGE($ip);
$menu->setIN_NAVBAR($in);
$menu->setPUBLISH($p);
$menu->setPOST_BY("");
$menu->setUPDATE_BY("");
$menu->setPERANT_ID($prntid);
$menu->setSERIAL_NO(1);
$menu->setSUBMENU($sub);
$menu->AddMenu();

}
?>