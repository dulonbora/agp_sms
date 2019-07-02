<?php
include '../tables/Users.php';
include '../tables/Group_List.php';
include '../tables/Post_List.php';
include '../tables/Group_Members.php';
include '../view/View_Member_List.php';

$_Users                  = new Users();
$_Users->Create_Table();
$_Group_List             = new Group_List();
$_Group_List->Create_Table();
$_Post_List             = new Post_List();
$_Post_List->Create_Table();
$_Group_Members         = new Group_Members();
$_Group_Members->Create_Table();
$_View_Member_List         = new View_Member_List();
$_View_Member_List->Create_View();

?>
