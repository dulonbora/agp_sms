
<?php include_once '../classes/Mobile_Detect.php';
$Mobile_Detect = new Mobile_Detect();
if(session_status()==PHP_SESSION_NONE){session_start();}
$tittle = "Forget Password";

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

                    <div id="forgot-password" class="p-8">

                        <div class="form-wrapper md-elevation-8 p-8">

                                <img width="150" height="150" class="rounded-circle" src="../assets/images/Flag_of_Asom_Gana_Parishad.png">

                            <div class="title mt-4 mb-8">Recover your password</div>

                            <form name="forgotPasswordForm" >

                                <div class="form-group mb-4">
                                    <input type="text" class="form-control" id="forgotPasswordFormInputEmail" aria-describedby="emailHelp" placeholder=" " required/>
                                    <label for="forgotPasswordFormInputEmail">Enter Your Phone Number</label>
                                </div>

                                <button id="SentToEmail" class="submit-button btn btn-block btn-secondary mt-8 mb-4 mx-auto" aria-label="SEND TO MOBILE">
                                    SEND TO EMAIL
                                </button>

                            </form>

                            <div class="login row align-items-center justify-content-center mt-8 mb-6 mx-auto">
                                <a class="link text-secondary" href="login.php">Go back to login</a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            
        </div>
    </main>
</body>

<script type="text/javascript" src="../users/forget.js"></script>

</html>