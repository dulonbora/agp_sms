
<?php
include 'classes/Menu.php';
include 'classes/Settings.php';
include 'classes/user.php';
$menu = new Menu();
$setting = new Settings();
$USERS = new user();
$setting->loadvalueSite();
?>
<!DOCTYPE html>
<html>
	
<head>
<meta charset="utf-8">
<meta name="keywords" content="Universh - Material Education, Events, News, Learning Centre & Kid School MultiPurpose HTML5 Template" />
<meta name="description" content="Universh - Material Education, Events, News, Learning Centre & Kid School MultiPurpose HTML5 Template">
<meta name="author" content="dulonbora@gmail.com">
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Favicon -->
        <link rel="shortcut icon" href="images/default/favicon.png">
		<!-- Web Fonts  -->
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' 
		rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/lib/bootstrap.min.css">
		<link rel="stylesheet" href="css/lib/animate.min.css">
		<link rel="stylesheet" href="css/lib/font-awesome.min.css">
		<link rel="stylesheet" href="css/lib/univershicon.css">
		<link rel="stylesheet" href="css/lib/owl.carousel.css">
		<link rel="stylesheet" href="css/lib/prettyPhoto.css">
		<link rel="stylesheet" href="css/lib/menu.css">
		<link rel="stylesheet" href="css/theme.css">
		<link rel="stylesheet" href="css/theme-responsive.css">
		
		<link rel="stylesheet" href="css/skins/default.css">
		
		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="css/custom.css">
	</head>
<body>



<!-- Back to top -->
<a href="#0" class="cd-top">Top</a>

	
<!-- Header Begins -->	
<header id="header" class="default-header colored flat-menu">
    
	<div class="header-top">
		<div class="container">
			<nav>
				<ul class="nav nav-pills nav-top">
					<li class="phone animated fadeInUp visible">
                                            <span><i class="fa fa-envelope"></i><?php echo $setting->getEMAIL();?></span>
					</li>
					<li class="phone animated fadeInDown visible">
                                            <span><i class="fa fa-phone"></i><?php echo $setting->getPHONE_NO();?></span>
					</li>
				</ul>
			</nav>
			<ul class="social-icons color">
                            <li class="googleplus animated fadeInLeft visible"><a title="googleplus" target="_blank" href="<?php echo $setting->getGOOGLEPLUS();?>">googleplus</a></li>
                            <li class="facebook animated fadeInDown visible"><a href="<?php echo $setting->getFB();?>" target="_blank" title="Facebook">Facebook</a></li>
                            <li class="twitter animated fadeInRight visible"><a href="<?php echo $setting->getTWITTER();?>" target="_blank" title="Twitter">Twitter</a></li>
			</ul>
		</div>
	</div>
	<div class="container">
		<div class="logo animated rotateIn visible">
			<a href="index.php">
				 <img alt="name" width="211" height="40" data-sticky-width="150" data-sticky-height="28" src="images/default/logo.png">
			</a>
		</div>
		<button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
			<i class="fa fa-bars"></i>
		</button>
	</div>
	<div class="navbar-collapse nav-main-collapse collapse">
		<div class="container">
			<nav class="nav-main mega-menu">
				<ul class="nav nav-pills nav-main" id="mainMenu">
                                    <li class=""><a class="dropdown-toggle" href="index.php">Home</a></li>
                                <?php $menu->MainMenuIndex();?>
                                <?php $USERS->showLogin();?>
                                    
				</ul>
			</nav>
		</div>
	</div>
</header><!-- Header Ends -->
<?php include 'classes/UI.php';
$UI = new UI();
?>