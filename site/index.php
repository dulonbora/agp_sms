<?php
ob_start();
include 'include/header.php';
include 'classes/Images.php';
include 'classes/Staff.php';
$image = new Images();
?>
<head><title><?php echo $setting->getSITE_NAME();?></title></head>
<div role='main' class='main'>
			<?php $image->LoadSliderS();?>
		        
<?php echo $menu->LoadPostIndex("Our Featured New", 4, 3);?>
<?php echo $menu->LoadPostIndexM("Our Featured News", 4, 2);?>
        
<?php echo $menu->LoadPostIndex2("Our Latest Updates", 9, 3);?>
<?php echo $menu->LoadPostIndexM2("Our Latest Updates", 9, 2);?>
        
<?php echo $menu->LoadPostIndex3("Media Resources", 8, 3);?>
<?php echo $menu->LoadPostIndex3M("Media Resources", 8, 2);?>

    <?php echo $image->LOadPhotoIndex();
    ?>
 
        </div>
<?php include './include/footer.php';?>