<?php
ob_start();

include './include/header.php';
include 'classes/Images.php';
//include 'classes/Menu.php';
$image = new Images();
$menu = new Menu();
if(isset($_GET['i'])){$id = $_GET['i'];}
$menu->loadvalueSite($id);
$image->LoadValueSite($menu->getIMAGE_ID());

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
					<h3 class="title animated fadeInRight visible"><?php echo $menu->getNAME()?></h3>
					
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
				<!-- Page Content -->
				<div class="col-md-9">
					<div class="row">
						<!-- Blog Column -->
						<div class="col-xs-12 blog-single">
							<div class="blog-single-wrap animated fadeInLeft visible">
								 <?php if(strlen($image->getIMAGE_LINK()) > 2){?>        
								<div class="blog-img-wrap">
                                                                    <img width="1920" height="700" src="images/<?php echo $image->getIMAGE_LINK();?>" class="img-responsive" alt="Event">
								</div>
                                                    <?php }?>   
								<!-- Blog Detail Wrapper -->
								<div class="blog-single-details">
                                                                    <h4 class=" animated fadeInLeft visible"><?php echo $menu->getNAME()?></h4>
									<ul class="blog-meta">
                                                                            <li class=" animated fadeInLeft visible"><i class="fa fa-calendar-o"></i><?php echo $menu->date(date('d-m-Y', $menu->getPOST_ON())); ?></li>
									</ul><!-- Blog Meta -->
                                                                        <p class=" animated fadeInLeft visible"><?php echo $menu->getCONTENT()?></p>
								</div><!-- Blog Detail Wrapper -->
							</div><!-- Blog Wrapper -->
							
						</div><!-- Column -->
					</div><!-- Row -->
				</div><!-- Column -->
				<!-- Sidebar -->
				<div class="col-md-3">
					<!-- aside -->
					<aside class="sidebar">
						<div class="widget">
							<h5 class="widget-title animated fadeInRight visible">Latest Post<span></span></h5>
							<ul class="thumbnail-widget animated fadeInRight visible">
								<?php echo $menu->LoadRelatedPostsInSite($id);?>
							</ul><!-- Thumbnail Widget -->
						</div><!-- Widget -->
						
						<!-- Widget -->
						<div class="widget">
							<h5 class="widget-title">Categories<span></span></h5>
							<ul class="go-widget animated fadeInRight visible">
								<?php echo $menu->LoadPostCategoryInSite($id);?>
							</ul>
						</div><!-- Widget -->
						
						
					</aside><!-- aside -->	
				</div><!-- Column -->
			</div><!-- Row -->
		</div><!-- Container -->
	</div><!-- Page Default -->
</div><!-- Page Main -->

<!-- Footer -->
<?php include './include/footer.php';?>
