	<?php ob_start();

include 'include/header.php';
include 'classes/Images.php';
include 'classes/Staff.php';
$image = new Images();
$staff = new Staff();
?>	
<!-- Page Main -->
<div role="main" class="main">
	<!-- Section -->
	<section class="full-screen relative typo-light parallax-bg bg-cover" data-background="images/1478944101.jpg"  data-stellar-background-ratio="0.4">
		<div class="container vmiddle position-none-1024">
			<div class="row">
				<div class="col-md-12">
					<div class="hero hero-scene-event">
						<h2 class="title">Our Latest Event Ready Now!</h2>
						<h5 class="sub-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, quaerat beatae nulla debitis vitae temporibus enim sed.</h5>
						<div id="daycounter-hero" class="daycounter clearfix" data-counter="down" data-year="2016" data-month="12" data-date="02"></div>
					</div>
				</div><!-- Column -->
			</div><!-- Row -->
		</div><!-- Container -->
	</section><!-- Section -->
	
	
	<!-- Section -->
	
	<!-- Section -->
	<section class="bg-verydark">
		<div class="container">
			<div class="row">
				<!-- Title -->
				<div class="col-sm-12">
					<div class="title-container typo-light">
						<div class="title-wrap">
							<h3 class="title">Ongoing Event</h3>
							<span class="separator line-separator"></span>
						</div>
						<p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam</p>
					</div>
				</div>
				<!-- Title -->
			</div><!-- Row -->	
			
			<!-- Row -->		
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<!-- Column -->
						<div class="col-sm-6">
							<div class="contact-info">
								<div class="info-icon bg-dark">
									<i class="uni-map-marker"></i>
								</div>
								<h5 class="title">The Venue</h5>
								<p>Universh University,</p>
								<p>5007, Melbourne, Australia</p>
							</div><!-- Contact Info -->
							
							<div class="contact-info margin-top-30">
								<div class="info-icon bg-dark">
									<i class="uni-chair"></i>
								</div>
								<h5 class="title">Guest of Honour</h5>
								<p>Dr. Sam Anderson, Ex-Principal</p>
								<p>Dr. John Doe, Correspondent</p>
							</div><!-- Contact Info -->
							
						</div><!-- Column -->
						
						
						<!-- Column -->
						<div class="col-sm-6">
							<div class="contact-info">
								<div class="info-icon bg-dark">
									<i class="uni-megaphone"></i>
								</div>
								<h5 class="title">Event Highlight</h5>
								<p>Welcome by prof. Jocob Doe</p>
								<p>Performance by prof. Salena</p>
							</div><!-- Contact Info -->
							
							<div class="contact-info margin-top-30">
								<div class="info-icon bg-dark">
									<i class="uni-calendar-4"></i>
								</div>
								<h5 class="title">Date of Event</h5>
								<p>10am - 4pm</p>
								<p>Dec 02 - 2016</p>
							</div><!-- Contact Info -->
						</div><!-- Column -->
					</div><!-- Row -->	
				</div><!-- Column -->
				
				<!-- Column -->
				<div class="col-md-4 map-canvas margin-top-30-sm-only" 
					style="height: 476px;" 
					data-zoom="12" 
					data-lat="-35.2835" 
					data-lng="149.128" 
					data-title="Autin" 
					data-type="roadmap" 
					data-hue="#2196F3" 
					data-content="Universh&lt;br&gt; Contact: +012 (345) 6789&lt;br&gt; info@universh.com">
				</div><!-- Column -->
			</div><!-- Row -->
		</div><!-- Container -->
	</section><!-- Section -->
	
</div>
<?php include 'include/footer.php';?>