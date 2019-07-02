<?php


ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['USER_ID'] == NULL ? "" : $_SESSION['USER_ID'];

require_once('../classes/Group_List.php');
$_Group_List      = new Group_List();
require_once('../classes/Json_Parsar.php');
$_Json_Parsar     = new Json_Parsar();

$_id = filter_input(INPUT_GET, "s");

$response = array();
$response["SUCCESS"] = 0;

$TotalRow = $_Group_List->CountTotalSearch($_id);
$limit = 20;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;

$Result = $_Group_List->loadAllPaggingSearch($start, $limit, $_id);

$_Json_Parsar->PrintSingleJSON($Result);
?>