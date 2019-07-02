
<!-- Footer -->
<footer id="footer" class="footer-7">
	<div class="main-footer widgets-dark typo-light">
		<div class="container">
			<div class="row">
				<!-- Widget Column -->
				<div class="col-md-3">
					<!-- Widget -->
					<div class="widget contact-widget no-box">
                                            <h5 class="widget-title"><?php echo $setting->getSITE_NAME();?></h5>
                                            <h6><?php echo $setting->getADDRESS();?></h6>
						<ul>
                                                    <li><a href="#"><i class="fa fa-map-marker"></i><?php echo $setting->getPHONE_NO();?></a></li>
                                                    <li><a href="#"><i class="fa fa-envelope"></i><?php echo $setting->getEMAIL();?></a></li>
						</ul>
						<!-- Social Icons Color -->
						<ul class="social-icons color round">
                                                    <li class="facebook"><a href="<?php echo $setting->getFB();?>" target="_blank" title="Facebook">Facebook</a></li>
                                                    <li class="twitter"><a href="<?php echo $setting->getTWITTER();?>" target="_blank" title="Twitter">Twitter</a></li>
                                                    <li class="linkedin"><a href="<?php echo $setting->getLINKEDIN();?>" target="_blank" title="Linkedin">Linkedin</a></li>
                                                    <li class="googleplus"><a href="<?php echo $setting->getGOOGLEPLUS();?>" target="_blank" title="googleplus">googleplus</a></li>
						</ul>	
					</div><!-- Widget -->
				</div><!-- Column -->
				
				<!-- Widget Column -->
				<div class="col-md-9">
					<!-- Widget -->
					<div class="widget subscribe no-box">
                                            <h5><?php echo $setting->getSITE_NAME();?> Short Note<span></span></h5>
						<p class="form-message1" style="display: none;"></p>
						<div class="clearfix"></div>
                                                <p><?php echo $setting->getSHORT_NOTE();?></p>
						
					</div><!-- Widget -->
				</div><!-- Column -->
				
			</div><!-- Row -->
		</div><!-- Container -->		
	</div><!-- Main Footer -->
	
	<!-- Footer Copyright -->
	<div class="footer-copyright">
		<div class="container">
			<div class="row">
				<!-- Copy Right Logo -->
				<div class="col-md-2">
					<a class="logo" href="index.php">
						<img src="images/default/logo-footer.png" width="211" height="40" class="img-responsive" alt="">
					</a>
				</div><!-- Copy Right Logo -->
				<!-- Copy Right Content -->
				<div class="col-md-6">
					<p>© Copyright 2016. All Rights Reserved.</p>
				</div><!-- Copy Right Content -->
				
			</div><!-- Footer Copyright -->
		</div><!-- Footer Copyright container -->
	</div><!-- Footer Copyright -->
</footer>
<!-- Footer -->
<script src="js/lib/jquery.js"></script>
<script src="js/lib/bootstrap.min.js"></script>
<script src="js/lib/jquery.appear.js"></script>
<script src="js/lib/jquery.easing.min.js"></script>
<script src="js/lib/owl.carousel.min.js"></script>
<script src="js/lib/countdown.js"></script>
<script src="js/lib/counter.js"></script>
<script src="js/lib/jquery.prettyPhoto.js"></script>
<script src="js/lib/jquery.stellar.min.js"></script>
<script src="js/lib/menu.js"></script>

<script src="js/lib/modernizr.js"></script>
<!-- Theme Base, Components and Settings -->
<script src="js/theme.js"></script>

<!-- Theme Custom -->
<script src="js/custom.js"></script>



</body>

</html>