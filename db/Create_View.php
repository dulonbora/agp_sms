<?php
include '../tables_view/Brand_List_View_All_Size.php';
include '../tables_view/Brand_List_By_Users.php';
include '../tables_view/Mix_Item_List_View.php';
include '../tables_view/Ena_Transfar_View.php';
include '../tables_view/Imfl_Transfar_View.php';



$_Brand_List_View_All_Size                  = new Brand_List_View_All_Size();
$_Brand_List_View_All_Size->Create_View();

$_Brand_List_By_Users                       = new Brand_List_By_Users();
$_Brand_List_By_Users->Create_View();

$_Mix_Item_List_View                       = new Mix_Item_List_View();
$_Mix_Item_List_View->Create_View();

$Ena_Transfar_View                       = new Ena_Transfar_View();
$Ena_Transfar_View->Create_View();

$Imfl_Transfar_View                       = new Imfl_Transfar_View();
$Imfl_Transfar_View->Create_View();



?>
