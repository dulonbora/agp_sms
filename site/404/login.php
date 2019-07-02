<!DOCTYPE html><html lang="en" class="bg-info">
    <head> <meta charset="utf-8" />
        <title>Sing In | Asomi.Mobi</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <link rel="stylesheet" href="../css/app.v1.css" type="text/css" />
        <script src="../js/ie/html5shiv.js"></script>
        <script src="../js/ie/respond.min.js">

        </script>
        <script src="../js/ie/excanvas.js"></script>
        <![endif]--></head>

    <body class="bg-info"> 

        <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
            <div class="container aside-xl">
                <a class="navbar-brand block" href=""><span class="h1 font-bold">Sign In</span></a>
                
                <section class="m-b-lg">
                    <?php include '../classes/user.php';
                    $user = new user();
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                    $email = $_POST['email']; 
                    $pass = $_POST['Password']; 
                    $user->setEmail($email);
                    $user->setPassword($pass);
                    $user->Login();    
                    }
                    ?>
                    <header class="wrapper text-center"><strong>Sign in to get in touch</strong> </header>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" name="formon" role="form">
                        <div class="form-group">
                            <input type="email" name="email" value="" placeholder="Email" class="form-control rounded input-lg text-center no-border">
                        </div>
                        <div class="form-group">
                            <input type="password" name="Password" value="" placeholder="Password" class="form-control rounded input-lg text-center no-border">
                        </div>
                        <button type="submit" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded">
                            <i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">Sign in</span></button>

                        <div class="text-center m-t m-b"><a href="#"><small>Forgot password?</small></a></div>
                        <div class="line line-dashed"></div>
                        <p class="text-muted text-center"><small>Do not have an account?</small></p>
                        <a href="registration" class="btn btn-lg btn-info btn-block rounded">Create an account</a> </form> 
                </section> </div> </section>


        <!-- footer --> <footer id="footer"> <div class="text-center padder">
                <p> <small>Asomi.Mobi &copy; 2016</small> </p> </div> </footer> 
        <!-- / footer -->

        <!-- Bootstrap -->

        <!-- App --> <script src="../js/app.v1.js"></script> 
        <script src="../js/app.plugin.js"></script>
</html>
