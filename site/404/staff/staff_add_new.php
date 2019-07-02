<?php include '../../include/AHeader.php';
include '../../classes/UI.php';
include '../../classes/NavBar.php'; 
include '../../classes/Menu.php'; 
include '../../classes/Staff.php'; 
include '../../classes/user.php'; 

$UI = new UI;
$N = new NavBar;
$menu = new Menu();
$staff = new Staff();
$user = new user();

if($_SERVER['REQUEST_METHOD']=='POST'){
$email = $_POST['EMAIL']; 
$fname = $_POST['FNAME']; 
$lname = $_POST['LNAME']; 
$adddess = $_POST['ADDRESS']; 
$about = $_POST['ABOUT']; 
$Phone = $_POST['PHONE']; 
$uname = explode('@', $email);

$subject = $_POST['SUBJECT'];
$qualification = $_POST['QUALIFICATION'];
$designation = $_POST['DESIGNATION'];
$cat_id = $_POST['CATEGORY_ID'];

$user->setUserName($uname[0]);
$user->setEmail($email);
$user->setFIRST_NAME($fname);
$user->setLAST_NAME($lname);
$user->setPassword("123456".$user->getLastId()+1);
$user->setAccess("staff");
$user->setAddress($adddess);
$user->setPhone($Phone);
$user->setAbout($about);
if(!$email==""){$user->Register();}else{return FALSE;}
$staff->setCATEGORY_ID($cat_id);
$staff->setSUBJECT($subject);
$staff->setQUALIFICATION($qualification);
$staff->setDESIGNATION($designation);

$staff->setUSER_ID($user->getLastId());

if(!$email==""){$staff->AddStaff();}else{return FALSE;}
}
?>
<body class="">
    <section class="vbox">
        <?php echo $UI->Work("ADMIN"); ?>

        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                        <?php echo $N->Admin(); ?>

                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            <p><?php echo $menu->getNAME(); ?> <small>
                                </small>
                            </p>
                            <div class="row">
        <div class="col-sm-12">
        
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" name="formon" role="form" class="form-horizontal"> 
        <section class="panel panel-success"> 
        <header class="panel-heading bg-danger"> <strong>New Staff</strong> </header>
        <div class="panel-body"> 
        <div class="form-group"> <label class="col-sm-2 control-label">First Name</label> <div class="col-sm-10"> <input type="text" name="FNAME" class="form-control" placeholder="First Name"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Last Name</label> <div class="col-sm-10"> <input type="text" name="LNAME" class="form-control" placeholder="Last Name"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Category</label> 
            <div id="parentcat" class="col-sm-8">
                <select name="CATEGORY_ID" id="prentid" class="form-control">
                <?php $menu->LoadStaffParent();?>
                </select> </div> <div class="col-sm-2"><a id="addnew" class="btn btn-success form-control">Add New</a></div>
        </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Designation</label> <div class="col-sm-10"> <input type="text" name="DESIGNATION" class="form-control" placeholder="Designation"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Email</label> <div class="col-sm-10"> <input type="text" name="EMAIL" class="form-control" data-type="email" data-required="true" placeholder="Email"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Phone Number</label> <div class="col-sm-10"> <input type="text" name="PHONE" data-type="phone" class="form-control" placeholder="(XXX) XXXX XXX"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Qualification</label> <div class="col-sm-10"> <input type="text" name="QUALIFICATION" class="form-control" placeholder="Quwalification"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Subject</label> <div class="col-sm-10"> <input type="text" name="SUBJECT" class="form-control" placeholder="Subject"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">Address</label> <div class="col-sm-10"> <input type="text" name="ADDRESS" class="form-control" placeholder="Address"> </div> </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group"> <label class="col-sm-2 control-label">About</label> <div class="col-sm-10"> <input type="text" name="ABOUT" class="form-control" placeholder="About"> </div> </div>
        </div> 
        <footer class="panel-footer text-right bg-light lter"> <button type="submit" class="btn btn-success btn-s-xs">Submit</button> </footer>
        </section> </form> </div>
    
    
                                </div>
                            
                            
                        </section>
                        
                    </section>
                        
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
                </section>
                
                <aside class="aside-lg bg-light b-r" id="menuaside"> 
                    <div id="addmenuview"> </div> </aside>
            </section>
        </section>
    </section>
    <!-- Bootstrap -->
    
    <script>
    
$(document).ready(function(){
     $("#menuaside").hide();
    $(document).on("click", "#addnew", function(){
    $("#menuaside").load("category_add_ajax.php").toggle(600);
    });
    
    
    
$(document).on("click", "#addcat", function(){
var vname = $("#name").val();
var vis_menu = $("#is_menu").val();
var vprentid = $("#prentid").val();
var vis_navbar = $("#is_navbar").val();
var vis_submenu = $("#is_submenu").val();
var vis_publish = $("#is_publish").val();
if(vname==''){$("#name").focus();return;}
else{
$.post("category_post.php", //Required URL of the page on server
{
NAME:vname,
PAGE:vis_menu,
NAVBAR:vis_navbar,
PUBLISH:vis_publish,
PARENT:vprentid,
SUBMENU:vis_submenu
},
function(response,status){ // Required Callback Function
//alert("*----Received Data----*\n\nResponse : " + response+"\n\nStatus : " + status);//"response" receives - whatever written in echo of above PHP script.
$("#menuaside").hide(600);
$("#menuaside").destroy();
//window.location.reload();
});
}
});

});
</script>
    <!-- App -->
    <script src="../../js/app.v1.js"></script>
    <script src="../../js/app.plugin.js"></script>
</body>

</html>