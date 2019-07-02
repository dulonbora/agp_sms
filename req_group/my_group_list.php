<?php


ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['USER_ID'] == NULL ? "" : $_SESSION['USER_ID'];

require_once('../classes/View_Group_Members.php');
$_View_Group_Members        = new View_Group_Members();
require_once('../classes/Json_Parsar.php');
$_Json_Parsar               = new Json_Parsar();


$response = array();
$response["SUCCESS"] = 0;

$TotalRow = $_View_Group_Members->CountTotalByMember($_SESSION['USER_ID']);
$limit = 20;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;

$Result = $_View_Group_Members->loadAllPaggingByMember($_SESSION['USER_ID'], $start, $limit);

$_Json_Parsar->PrintSingleJSON($Result);
?>