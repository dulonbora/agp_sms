<?php
include '../../classes/Menu.php';
$id = $_POST['i'];
$menu = new Menu();
$menu->MenuRemovePermently($id);
?>