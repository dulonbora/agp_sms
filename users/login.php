

<?php include_once '../classes/Mobile_Detect.php';
$Mobile_Detect = new Mobile_Detect();
if(session_status()==PHP_SESSION_NONE){session_start();}
$tittle = "AJP Communication Portal : Login ";

?>

<!DOCTYPE html>
<html lang="en-us">
<?php include '../include/headers_files.php';?>

<body class="layout layout-vertical layout-left-navigation layout-below-toolbar">
    <main>
        <div id="wrapper">
<?php include '../sidebar/main_none.php';?>
            <div class="content-wrapper">
<?php include '../include/toolbar_non.php';?>
          
                
                <div class="content custom-scrollbar">

                    <div id="login-v2" class="row no-gutters">

                        <?php if(!$Mobile_Detect->isMobile()){?>
                        
                        <div class="intro col-12 col-md light-fg">

                            <div class="d-flex flex-column align-items-center align-items-md-start text-center text-md-left py-16 py-md-32 px-12">
                                

                                <div class="job-title">
                                <img width="200" height="200" class="rounded-circle" src="../assets/images/Flag_of_Asom_Gana_Parishad.png">
                                </div>
                                

                                <div class="title text-secondary">
                                    Login To Asom Gana Parishad
                                </div>

                                <div class="description pt-2">
                                    GORUP MASSANGING
                                </div>

                            </div>
                        </div>
                        
                        <?php }?>
                        

                        <div class="form-wrapper col-12 col-md-auto d-flex justify-content-center p-4 p-md-0">

                            <div class="form-content md-elevation-8 h-100 bg-white text-auto py-16 py-md-32 px-12">

                                <div class="title h5">Log in to your account</div>

                                <div id="MessageLabel" class="description mt-2"></div>

                                <form id="form_login" name="loginForm" novalidate class="mt-8">

                                    <div class="form-group mb-4">
                                        <input name="EMAIL" type="text" class="form-control" id="EMAIL" aria-describedby="emailHelp" placeholder=" " />
                                        <label for="loginFormInputEmail">Email address Or Phone</label>
                                    </div>

                                    <div class="form-group mb-4">
                                        <input type="password" name="PASSWORD" class="form-control" id="PASSWORD" placeholder="Password" />
                                        <label for="loginFormInputPassword">Password</label>
                                    </div>

                                    <div class="remember-forgot-password row no-gutters align-items-center justify-content-between pt-4">

                                        <div class="form-check remember-me mb-4">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" aria-label="Remember Me" />
                                                <span class="checkbox-icon"></span>
                                                <span class="form-check-description">Remember Me</span>
                                            </label>
                                        </div>

                                        <a href="foeget_password.php" class="forgot-password text-secondary mb-4">Forgot Password?</a>

                                    </div>

                                    <button type="submit" id="login_btn" class="submit-button btn btn-block btn-secondary my-4 mx-auto" aria-label="LOG IN">
                                        LOG IN
                                    </button>

                                </form>

                                <div class="separator">
                                    <span class="text">OR</span>
                                </div>
                                

                                <div class="register d-flex flex-column flex-sm-row align-items-center justify-content-center mt-8 mb-6 mx-auto">
                                    <span class="text mr-sm-2">Don't have an account?</span>
                                    <a class="link text-secondary" href="register.php">Create an account</a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            

        </div>
    </main>
</body>


<script type="text/javascript" src="../users/log.js"></script>
</html>