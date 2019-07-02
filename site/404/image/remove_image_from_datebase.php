<?php
include '../../classes/Images.php';
$id = $_POST['i']; 
$image = new Images();
if($image->LoadValue($id)){
$image->Delete($id);

unlink("../../images/".$image->getIMAGE_LINK());
}
?>