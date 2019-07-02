<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
error_reporting(0);
include '../classes/Users.php';
$user = new Users();

$response = array();
$response["SUCCESS"] = 0;
$email = filter_input(INPUT_POST, 'EMAIL');
$pass = filter_input(INPUT_POST, 'PASSWORD');

if ($user->Login($email, $pass) == 1) {
    $response["SUCCESS"] = 1;
}
echo json_encode($response);
?>
