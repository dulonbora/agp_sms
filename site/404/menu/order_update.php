<?php
include_once('../../classes/Serialization.php');
$s = new Serialization();
$idArray = explode(",",$_POST['i']);
//echo $_POST['i'];
$s->updateOrder($idArray);
?>