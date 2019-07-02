<?php
ob_start();

include './include/header.php';
include 'classes/Images.php';
//include 'classes/Menu.php';
$image = new Images();
$menu = new Menu();
if(isset($_GET['i'])){$id = $_GET['i'];}
$menu->loadvalueSite($id);
//$image->LoadValueSite($menu->getIMAGE_ID());

?>
<head><title><?php echo $menu->getNAME();?> | <?php echo $setting->getSITE_NAME();?></title></head>

<!-- Page Header -->
<div class="page-header bg-fixed">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<!-- Page Header Wrapper -->
				<div class="page-header-wrapper">
					<!-- Title & Sub Title -->
                                        <h3 class="title animated fadeInRight visible"><?php echo $menu->getNAME();?></h3>
					
				</div><!-- Page Header Wrapper -->
			</div><!-- Coloumn -->
		</div><!-- Row -->
	</div><!-- Container -->
</div><!-- Page Header -->

<!-- Page Main -->
<?php echo $menu->LoadPostIndexALL($id);?>
<?php include './include/footer.php';?>


