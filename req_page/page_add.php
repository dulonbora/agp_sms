<?php
include '../classes/Pages.php';
$__pag = new Pages();

$_headline = filter_input(INPUT_GET , 'page_name');
$_content = filter_input(INPUT_GET , 'pageContant');
$_img_id = 0;
$_total_visit = 0;
$_category = 1;
//$_category = filter_input(INPUT_POST , 'CATEGORY');
$_post_on = time()*1000;
$_post_by = 1;
//$_post_by = filter_input(INPUT_POST , 'POST_BY');
//$_status = filter_input(INPUT_POST , 'STATUS');
$_status = 1;
//$_type = filter_input(INPUT_POST , 'TYPE');
$_type = 1;
//$_comment = filter_input(INPUT_POST , 'COMMENT');
$_comment = 1;


$__pag->setHeadline($_headline);
$__pag->setContent($_content);
$__pag->setImageId($_img_id);
$__pag->setTotalVisit($_total_visit);
$__pag->setCategory($_category);
$__pag->setPostOn($_post_on);
$__pag->setPostBy($_post_by);
$__pag->setStatus($_status);
$__pag->setType($_type);
$__pag->setComment($_comment);


if($__pag->Insert()==1){echo 'Successfully Inserted';}
 else {echo $_headline."+".$_content;}
 
    ?>