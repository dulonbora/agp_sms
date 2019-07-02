<?php
include 'include/header.php';
include 'classes/Images.php';
$image = new Images();
?>
<div class="page-header bg-fixed">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="page-header-wrapper">
					<h3 class="title">Contact</h3>
				</div>
			</div><!-- Coloumn -->
		</div><!-- Row -->
	</div><!-- Container -->
</div><!-- Page Header -->
	
<!-- Page Main -->
<div role="main" class="main">
	<!-- Section -->
	<section class="bg-lgrey">	
		<div class="container">
			<div class="row">
				<div class="col-sm-offset-1 col-sm-4">
					<div class="contact-info">
						<div class="info-icon bg-dark">
							<i class="uni-map2"></i>
						</div>
						<h5 class="title">Office</h5>
						<p><?php echo $setting->getADDRESS();?></p>
					</div><!-- Contact Info -->
					
					<div class="contact-info margin-top-30">
						<div class="info-icon bg-dark">
							<i class="uni-mail"></i>
						</div>
						<h5 class="title">Contact</h5>
						<p><a href="mailto:<?php echo $setting->getEMAIL();?>"><?php echo $setting->getEMAIL();?></a></p>
						<p><a href="tel:<?php echo $setting->getPHONE_NO();?>"><?php echo $setting->getPHONE_NO();?></a></p>
					</div><!-- Contact Info -->
					
				</div><!-- Column -->
				
				<div class="col-sm-6">
					<div class="contact-info">
						<div class="info-icon bg-dark">
							<i class="uni-fountain-pen"></i>
						</div>
						<form method="post" >
							<!-- Field 1 -->
							<div class="input-text form-group">
								<input type="text" name="contact_name" class="input-name form-control" placeholder="Full Name" />
							</div>
							<!-- Field 2 -->
							<div class="input-email form-group">
								<input type="email" name="contact_email" class="input-email form-control" placeholder="Email"/>
							</div>
							<!-- Field 4 -->
							<div class="textarea-message form-group">
								<textarea name="contact_message" class="textarea-message form-control" placeholder="Message" rows="5" ></textarea>
							</div>
							<!-- Button -->
							<button class="btn" type="submit">Send Now</button>
						</form>
					</div><!-- Contact Info -->
				</div><!-- Column -->
			</div><!-- Row -->
		</div><!-- Container -->	
	</section><!-- Section -->	
	
</div><!-- Page Main -->
<?php include './include/footer.php';?>