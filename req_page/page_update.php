<?php
include '../classes/Pages.php';
$__pag = new Pages();

$_headline = filter_input(INPUT_POST , 'HEADLINE');
$_content = filter_input(INPUT_POST , 'CONTENT');
$_category = filter_input(INPUT_POST , 'CATEGORY');
$_status = filter_input(INPUT_POST , 'STATUS');
$_type = filter_input(INPUT_POST , 'TYPE');
$_comment = filter_input(INPUT_POST , 'COMMENT');
$_id = filter_input(INPUT_POST , 'ID');


$__pag->setHeadline($_headline);
$__pag->setContent($_content);
$__pag->setCategory($_category);
$__pag->setStatus($_status);
$__pag->setType($_type);
$__pag->setComment($_comment);
$__pag->setId($_id);

if($__pag->Update($_id)==1){echo 'Successfully Added';}


?>