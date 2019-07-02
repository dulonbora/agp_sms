`<?php
include '../classes/Pages.php';
$__pag = new Pages();

$_col = filter_input(INPUT_POST , 'COL');
$_value = filter_input(INPUT_POST , 'VALUE');
$_id = filter_input(INPUT_POST , 'ID');

if($__loc->UpdateSingle($_col, $_value, $_id)==1){echo 'Succesfully Updated';}
else {echo 'Error';}
?>