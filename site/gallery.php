
<?php include './include/header.php';
include 'classes/Images.php';
$image = new Images();
if(isset($_GET['i'])){$id = $_GET['i'];}
$menu->loadvalueSite($id);
?>
<head><title><?php echo $menu->getNAME();?> Photos | <?php echo $setting->getSITE_NAME();?></title></head>

<!-- Page Header -->
<div class="page-header bg-fixed">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="page-header-wrapper">
                                        <h3 class="title animated rotateIn visible"><?php echo $menu->getNAME();?> Photos</h3>
				</div><!-- Page Header Wrapper -->
			</div><!-- Coloumn -->
		</div><!-- Row -->
	</div><!-- Container -->
</div><!-- Page Header -->

<!-- Page Main -->
<div role="main" class="main">
	<div class="page-default bg-grey typo-dark">
		<!-- Container -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					
		<?php echo $image->LOadPhotoInSiteByAlbum($id);?>
				</div><!-- Column -->
			</div><!-- Row -->
		</div><!-- Container -->
	</div><!-- Page Default -->
</div><!-- Page Main -->

<?php include './include/footer.php';?>