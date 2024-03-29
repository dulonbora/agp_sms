

<?php
$tittle = 'AJP Communication Portal : Register';

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

                        <div class="intro col-12 col-md light-fg">

                            <div class="d-flex flex-column align-items-center align-items-md-start text-center text-md-left py-16 py-md-32 px-12">

                               
                                <div class="job-title">
                                <img width="200" height="200" class="rounded-circle" src="../assets/images/Flag_of_Asom_Gana_Parishad.png">
                                </div>
                                
                                

                                <h3 class="text-secondary">
                                    Register To Asom Gana Parishad
                                </h3>

                                <div class="description pt-2">
                                </div>

                            </div>
                        </div>

                        <div class="form-wrapper col-12 col-md-auto d-flex justify-content-center p-2 p-md-0">

                            <div class="form-content md-elevation-12 h-100 bg-white text-auto py-16 py-md-10 px-10">

                                <div class="title h5">Create account</div>

                                <div class="description mt-2 text-danger" id="MessageLabel"></div>

                                <form id="registerForm" name="registerForm" novalidate="" class="mt-8">

                                    <div class="form-group mb-4">
                                        <input type="text" name="NAME" class="form-control" id="NAME" aria-describedby="nameHelp">
                                        <label for="NAME">Name</label>
                                    </div>

                                    <div class="form-group mb-4">
                                        <input type="text"  name="MOBILE_NO" class="form-control" id="MOBILE_NO" aria-describedby="mobileHelp">
                                        <label for="MOBILE_NO">Phone No</label>
                                    </div>

                                    <div class="form-group mb-4">
                                        <input type="email" name="EMAIL" class="form-control" id="EMAIL" aria-describedby="emailHelp">
                                        <label for="EMAIL">Email address</label>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                                <label>Gender</label>
                                                <select id="GRANDER" class="form-control">
                                                <option selected="F">FE-MALE</option>
                                                <option selected="M">MALE</option>
                                                </select>
                                            </div>

                                    <div class="form-group mb-4">
                                        <input type="password" name="PASSWORD" class="form-control" id="PASSWORD">
                                        <label for="PASSWORD">Password</label>
                                    </div>

                                    <div class="form-group mb-4">
                                        <input type="password" name="PASSWORD1" class="form-control" id="PASSWORD1">
                                        <label for="PASSWORD1">Password (Confirm)</label>
                                    </div>

                                    <div class="terms-conditions row align-items-center justify-content-center pt-4 mb-8">
                                        <div class="form-check mr-1 mb-1">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" aria-label="Remember Me">
                                                <span class="checkbox-icon fuse-ripple-ready"></span>
                                                <span>I read and accept</span>
                                            </label>
                                        </div>
                                        <a href="#" class="text-secondary mb-1">terms and conditions</a>
                                    </div>

                                    <button type="submit" id="Btn_Reg" class="submit-button btn btn-block btn-secondary my-4 mx-auto fuse-ripple-ready" aria-label="LOG IN">
                                        CREATE MY ACCOUNT
                                    </button>

                                </form>

                                <div class="login d-flex flex-column flex-sm-row align-items-center justify-content-center mt-8 mb-6 mx-auto">
                                    <span class="text mr-sm-2">Already have an account?</span>
                                    <a class="link text-secondary" href="login.php">Log in</a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            

        </div>
    </main>
</body>
<script type="text/javascript" src="../users/reg.js"></script>

</html>