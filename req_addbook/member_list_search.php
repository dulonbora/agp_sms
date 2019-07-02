<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {session_start();}
$userId = $_SESSION['USER_ID'] == NULL ? "" : $_SESSION['USER_ID'];

require_once('../classes/Users.php');
$_Users             = new Users();
require_once('../classes/Json_Parsar.php');
$_Json_Parsar       = new Json_Parsar();

$_s                 = filter_input(INPUT_GET , "s");

$response = array();
$response["SUCCESS"] = 0;

$TotalRow = $_Users->CountTotalSearch($_s);
$limit = 20;
$TotalPage = ceil($TotalRow / $limit);
$page = (int) (!isset($_GET['i']) ? 1 : $_GET['i']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;

$Result = $_Users->loadAllPaggingSearch($start, $limit, $_s);

$_Json_Parsar->PrintSingleJSON($Result);
?>