<?php
ob_start();
if(!isset($_SESSION)){session_start();}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//include '../../classes/user.php';
//$user = new user;
//$user->RestrictUser()
?>

<!DOCTYPE html>
<html lang="en" class="app">
<head>
    <meta charset="utf-8" />
    <title>Menu</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="../../css/app.v1.css" type="text/css" />
    <link rel="stylesheet" href="../../js/nestable/nestable.css" type="text/css">
    <script src="../../js/jquery-3.1.1.min.js"></script>
    <script src="../../js/jquery-ui.js"></script>
</head>