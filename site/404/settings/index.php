<?php include '../../include/AHeader.php';
include '../../classes/UI.php';
include '../../classes/NavBar.php'; 
include '../../classes/Settings.php'; 

$UI = new UI;
$N = new NavBar;
$setting = new Settings();
$setting->loadvalue();;

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
                            <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        
    
            <section class="panel panel-default">
            <header class="panel-heading bg-light"> 
             <span class="">Details</span> </header> 
                    <ul class="list-group">
                        <li class="list-group-item"> <button id="name" class="bg-success pull-right"> Edit </button> <span style="margin-right: 10px;" class="pull-right"><?php echo $setting->getSITE_NAME(); ?></span>  Site Name </li>
                        <li class="list-group-item"><button id="email" class="bg-success pull-right"> Edit </button> <span style="margin-right: 10px;" class="pull-right"><?php echo $setting->getEMAIL(); ?></span>  Email </li>
                        <li class="list-group-item"><button id="phone" class="bg-success pull-right"> Edit </button> <span style="margin-right: 10px;" class="pull-right"><?php echo $setting->getPHONE_NO(); ?></span>  Phone No </li>
                        <li class="list-group-item"><button id="address" class="bg-success pull-right"> Edit </button> <span style="margin-right: 10px;" class="pull-right"><?php echo $setting->getADDRESS(); ?></span>  Address </li>
                        <li class="list-group-item"><button id="note" class="bg-success pull-right"> Edit </button> <span style="margin-right: 10px;" class="pull-right"><?php echo $setting->getSHORT_NOTE(); ?></span>  Short Note </li>
                        
                    
                    </ul>
                <header class="panel-heading bg-light"> <button id="social" class="bg-success pull-right"> Edit </button> 
             <span class="">Socila Links</span> </header> 
                <ul class="list-group">
            <li class="list-group-item"><span class="pull-right"><?php echo $setting->getFB(); ?></span>  Facebook Link </li>
                        <li class="list-group-item"> <span class="pull-right"><?php echo $setting->getINSTAGRAM(); ?></span>  Instagram Link </li>
                        <li class="list-group-item"> <span class="pull-right"><?php echo $setting->getGOOGLEPLUS(); ?></span>  Google + Link </li>
                        <li class="list-group-item"><span class="pull-right"><?php echo $setting->getTWITTER(); ?></span>  Twitter Link </li>
                        <li class="list-group-item"> <span class="pull-right"><?php echo $setting->getLINKEDIN(); ?></span>  LinkedIn Link </li>
                </ul>
                
            </section>
                                
        </div>
                                </div>
                            
                            
                        </section>
                        <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="m-ttl">Are You Sure to Remove? <button  type="button" class="btn btn-danger pull-right" data-dismiss="modal">[X]</button></h4>
                                </div>
                                <div id="statusresult">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    </section>
                        
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
                </section>
            </section>
        </section>
    </section>
    <!-- Bootstrap -->
    <!-- App -->
    
    <script>
        $(document).ready(function () {
//------------------------------------------------------------------------------
//Update Namw In Model
//------------------------------------------------------------------------------
            $(document).on("click", "#name", function () {
                $("#m-ttl").html("Update Site Name")
                var id = 1;
                $.ajax({
                    type: "POST",
                    url: "site_name.php",
                    data: {i: id},
                    error: function (html) {
                        $("#statusresult").html(html);
                    },
                    success: function (html) {
                        $("#statusresult").html(html);
                        $('#myModal').modal("show");
                    }
                });
            });
            
//------------------------------------------------------------------------------
//Update Namw In Model
//------------------------------------------------------------------------------
            $(document).on("click", "#email", function () {
                $("#m-ttl").html("Update Site Email")
                var id = 1;
                $.ajax({
                    type: "POST",
                    url: "email.php",
                    data: {i: id},
                    error: function (html) {
                        $("#statusresult").html(html);
                    },
                    success: function (html) {
                        $("#statusresult").html(html);
                        $('#myModal').modal("show");
                    }
                });
            });
            
            
//------------------------------------------------------------------------------
//Update Namw In Model
//------------------------------------------------------------------------------
            $(document).on("click", "#phone", function () {
                $("#m-ttl").html("Update Site Phone No")
                var id = 1;
                $.ajax({
                    type: "POST",
                    url: "phone.php",
                    data: {i: id},
                    error: function (html) {
                        $("#statusresult").html(html);
                    },
                    success: function (html) {
                        $("#statusresult").html(html);
                        $('#myModal').modal("show");
                    }
                });
            });
            
            
//------------------------------------------------------------------------------
//Update Namw In Model
//------------------------------------------------------------------------------
            $(document).on("click", "#address", function () {
                $("#m-ttl").html("Update Address")
                var id = 1;
                $.ajax({
                    type: "POST",
                    url: "add.php",
                    data: {i: id},
                    error: function (html) {
                        $("#statusresult").html(html);
                    },
                    success: function (html) {
                        $("#statusresult").html(html);
                        $('#myModal').modal("show");
                    }
                });
            });
            
            
//------------------------------------------------------------------------------
//Update Namw In Model
//------------------------------------------------------------------------------
            $(document).on("click", "#note", function () {
                $("#m-ttl").html("Update Note")
                var id = 1;
                $.ajax({
                    type: "POST",
                    url: "note.php",
                    data: {i: id},
                    error: function (html) {
                        $("#statusresult").html(html);
                    },
                    success: function (html) {
                        $("#statusresult").html(html);
                        $('#myModal').modal("show");
                    }
                });
            });
            
            
//------------------------------------------------------------------------------
//Update Namw In Model
//------------------------------------------------------------------------------
            $(document).on("click", "#social", function () {
                $("#m-ttl").html("Update Social Links")
                var id = 1;
                $.ajax({
                    type: "POST",
                    url: "social.php",
                    data: {i: id},
                    error: function (html) {
                        $("#statusresult").html(html);
                    },
                    success: function (html) {
                        $("#statusresult").html(html);
                        $('#myModal').modal("show");
                    }
                });
            });
            
            
//------------------------------------------------------------------------------
//Update sitename In Database Ajax
//------------------------------------------------------------------------------
$(document).on("click", "#updatesitename", function(){

var vname = $("#Editsitename").val();
if(vname==''){return false;}
else{
$.post("name_update_post.php", //Required URL of the page on server
{
NAME:vname
},
function(response,status){ // Required Callback Function
window.location.reload();
});
}
});
//------------------------------------------------------------------------------
//Update Email In Database Ajax
//------------------------------------------------------------------------------
$(document).on("click", "#updateemail", function(){

var vname = $("#Editemail").val();
if(vname==''){return false;}
else{
$.post("email_update_post.php", //Required URL of the page on server
{
NAME:vname
},
function(response,status){ // Required Callback Function
//window.location.reload();
});
}
});
//------------------------------------------------------------------------------
//Update Phone In Database Ajax
//------------------------------------------------------------------------------
$(document).on("click", "#UpdatePhone", function(){

var vname = $("#EditPhone").val();
if(vname==''){return false;}
else{
$.post("phone_update_post.php", //Required URL of the page on server
{
NAME:vname
},
function(response,status){ // Required Callback Function
//window.location.reload();
});
}
});
//------------------------------------------------------------------------------
//Update Phone In Database Ajax
//------------------------------------------------------------------------------
$(document).on("click", "#UpdateAdd", function(){

var vname = $("#EditAdd").val();
if(vname==''){return false;}
else{
$.post("add_update_post.php", //Required URL of the page on server
{
NAME:vname
},
function(response,status){ // Required Callback Function
//window.location.reload();
});
}
});
//------------------------------------------------------------------------------
//Update Phone In Database Ajax
//------------------------------------------------------------------------------
$(document).on("click", "#updatenote", function(){

var vname = $("#Editnote").val();
if(vname==''){return false;}
else{
$.post("note_update_post.php", //Required URL of the page on server
{
NAME:vname
},
function(response,status){ // Required Callback Function
//window.location.reload();
});
}
});
//------------------------------------------------------------------------------
//Update Social In Database Ajax
//------------------------------------------------------------------------------
$(document).on("click", "#updateSocial", function(){

var face = $("#EditFb").val();
var go = $("#EditGplus").val();
var insta = $("#EditInsta").val();
var twit = $("#EditTwitter").val();
var link = $("#EditLink").val();
if(face==''){return false;}
else{
$.post("social_update_post.php", //Required URL of the page on server
{
FB:face,
T:twit,
G:go,
I:insta,
L:link
},
function(response,status){ // Required Callback Function
//window.location.reload();
});
}
});

        });
    </script>
    <script src="../../js/app.v1.js"></script>
    <script src="../../js/app.plugin.js"></script>
</body>

</html>