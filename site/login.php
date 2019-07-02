
<!DOCTYPE html>
<html>
    <head>
        <!-- Basic -->
        <meta charset="utf-8">
        <title>Universh </title>
        <meta name="keywords" content="Universh - Material Education, Events, News, Learning Centre & Kid School MultiPurpose HTML5 Template" />
        <meta name="description" content="Universh - Material Education, Events, News, Learning Centre & Kid School MultiPurpose HTML5 Template">
        <meta name="author" content="glorythemes.in">
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicon -->
        <link rel="shortcut icon" href="images/default/favicon.png">
        <!-- Web Fonts  -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' 
              rel='stylesheet' type='text/css'>

        <!-- Lib CSS -->
        <link rel="stylesheet" href="css/lib/bootstrap.min.css">
        <link rel="stylesheet" href="css/lib/animate.min.css">
        <link rel="stylesheet" href="css/lib/font-awesome.min.css">
        <link rel="stylesheet" href="css/lib/univershicon.css">
        <link rel="stylesheet" href="css/lib/owl.carousel.css">
        <link rel="stylesheet" href="css/lib/prettyPhoto.css">
        <link rel="stylesheet" href="css/lib/menu.css">
        <link rel="stylesheet" href="css/lib/timeline.css">

        <!-- Theme CSS -->
        <link rel="stylesheet" href="css/theme.css">
        <link rel="stylesheet" href="css/theme-responsive.css">

        <!--[if IE]>
                <link rel="stylesheet" href="css/ie.css">
        <![endif]-->

        <!-- Skins CSS -->
        <link rel="stylesheet" href="css/skins/default.css">

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="css/custom.css">
        <script src="js/jquery-3.1.1.min.js"></script>
    </head>
    <body>

        <!-- Page Loader -->
        <div id="pageloader">
            <div class="loader-inner">
                <img src="images/default/preloader.gif" alt="">
            </div>
        </div><!-- Page Loader -->

        <!-- Back to top -->
        <a href="#0" class="cd-top">Top</a>

        <!-- End Theme Panel Switcher -->


        <!-- Page Main -->
        <div class="main relative full-screen bg-img bg-cover overlay bg-color heavy" data-background="images/banner/bg-04.jpg"  data-stellar-background-ratio="0.5">
          <div class="main relative bg-img bg-cover overlay bg-color heavy" data-background="images/banner/bg-04.jpg"  data-stellar-background-ratio="0.5">

            <!-- Section -->
            <div class="page-default typo-dark">
                <!-- Container -->
                <div id="UserFrom" class="container">
                </div><!-- Container -->	
            </div><!-- Page Default -->
        </div><!-- Page Main -->
        </div><!-- Page Main -->

        <!-- library -->
        <script type="text/javascript">
            $(document).ready(function () {


                $(document).on("click", "#Signin", function () {
                    var id = $("#email").val();
                    var pass = $("#password").val();
                    alert(id);
                    $.ajax({
                        type: "POST",
                        url: "signin_ajax_post.php",
                        data: {AUTH: id, PASS: pass},
                        error: function (html) {
                            $("#statusText").html(html);
                        },
                        success: function (html) {
                            $("#statusText").html(html);

                        }
                    });
                });


            });
        </script>
        <script type="text/javascript">
    $(document).ready(function(){
    $("#UserFrom").load("login_form.php");
    
    $(document).on("click", "#SignUpbtn", function(){
    $("#UserFrom").load("signup_form.php");
    });
    
    $(document).on("click", "#Signinbtn", function(){
    $("#UserFrom").load("login_form.php");
    });
    
    $(document).on("click", "#Signin", function(){
        var id = $("#email").val();
        var pass = $("#password").val();
        $.ajax({
            type: "post",
            url : "signin_ajax_post.php",
            data : {AUTH : id, PASS : pass},
            error: function (html) {
                    $("#statusText").html(html);
                    },
            success: function (html) {
                    $("#statusText").html(html);

    }
    });
    });

    
    });
</script>
        <script src="js/lib/jquery.js"></script>
        <script src="js/lib/menu.js"></script>

        <script src="js/lib/modernizr.js"></script>
        <!-- Theme Base, Components and Settings -->
        <script src="js/theme.js"></script>

        <!-- Theme Custom -->
        <script src="js/custom.js"></script>

    </body>

</html>