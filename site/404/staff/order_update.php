<?php
include_once('../../classes/Serialization.php');
$s = new Serialization();
$idArray = explode(",",$_POST['i']);
$s->updateOrderStaff($idArray);
?>