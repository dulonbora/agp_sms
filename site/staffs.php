<?php
ob_start();

include 'include/header.php';
include 'classes/Images.php';
$image = new Images();
?>
<div class="page-header bg-fixed">
	<div class="container">
		<div class="row">
		<div class="col-xs-12">
		<div class="page-header-wrapper">
		<h3 class="title">Teacher Version #1</h3>
		</div></div></div></div></div>
<div role="main" class="main">
	<div class="page-default bg-grey typo-dark">
		<div class="container">
			<div class="row">
				<div class="team-container small">
					<div class="col-sm-6 col-md-3">
					<div class="member-wrap">
					<div class="member-img-wrap">
                                        <img class="img-responsive" alt="Member" src="images/default/teacher-01.jpg" width="400" height="500">
					</div>
					<div class="member-detail-wrap bg-grey">
					<h5 class="member-name"><a href="#">Paul Groves</a></h5>
					<span>Principal</span>
					<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those intereste.</p>
							</div><!-- Member detail Wrapper -->
						</div><!-- Member Wrap -->
					</div><!-- Column -->
				</div><!-- Team Container -->
			</div><!-- Row -->
		</div><!-- Container -->
	</div><!-- Page Default -->
</div><!-- Page Main -->
<?php include './include/footer.php';?>
