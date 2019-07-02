
<?php include '../../include/AHeader.php';
include '../../classes/UI.php';
include '../../classes/NavBar.php'; 
include '../../classes/user.php'; 

$user = new user();
$UI = new UI;
$N = new NavBar;
if (isset($_GET['i']) == true){$id = $_GET['i'];}

?>

<body class="">
    <section class="vbox">
        <?php echo $UI->Work("CATEGORY"); ?>

        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <?php echo $N->Admin(); ?>
                
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
<div class="row">
                                <div class="col-lg-12">
                                    <section class="panel panel-default"> <header class="panel-heading">Staff List</header> 
                                        <div class="row wrapper">  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 m-b-xs"> 
                                                <div class="btn-group"> 
                                                    <a href="../staff/staff_add_new.php" class="btn btn-sm btn-default">Add New Staff</a>
                                                    <a href="../staff/SerialzetionStaff.php?i=<?php echo $id;?>" class="btn btn-sm btn-primary">Serializetion</a>
                                                    
                                                </div> </div> <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"> <div class="input-group"> 
                                                        <input type="text" class="input-sm form-control" placeholder="Search">
                                                        <span class="input-group-btn"> <button class="btn btn-sm btn-default" type="button">Go!</button> 
                                                        </span> </div> </div> </div> 
                                        
                                        <div class="table-responsive"> 
                                        <table class="table table-striped b-t b-light">
                                        <thead> 
                                        <tr>
                                        <th class="th-sortable" data-toggle="class">Staff Name</th> 
                                        <th class="text-center">DESIGNATION</th> 
                                        <th class="text-center">QUALIFICATION</th> 
                                        <th class="text-center">Edit</th>  
                                        <th class="text-center">Remove</th> 
                                        <th  class="text-center">Status</th> 
                                        </tr> </thead> <tbody>
                                        <?php $user->LoadStaffCategoryInAdmin($id); ?>
                                        </tbody>
                                        </table> </div> 
                                        <footer class="panel-footer"> 
                                        <div class="row"> <div class="col-sm-4 hidden-xs"> <select class="input-sm form-control input-s-sm inline v-middle"> <option value="0">Bulk action</option> <option value="1">Delete selected</option> <option value="2">Bulk edit</option> <option value="3">Export</option> </select> <button class="btn btn-sm btn-default">Apply</button> </div> <div class="col-sm-4 text-center"> <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small> </div> <div class="col-sm-4 text-right text-center-xs"> <ul class="pagination pagination-sm m-t-none m-b-none"> <li><a href="#"><i class="fa fa-chevron-left"></i></a></li> <li><a href="#">1</a></li> <li><a href="#">2</a></li> <li><a href="#">3</a></li> <li><a href="#">4</a></li> <li><a href="#">5</a></li> <li><a href="#"><i class="fa fa-chevron-right"></i></a></li> </ul> </div> </div> </footer> </section>
                                </div>
                            </div>
                            <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="m-ttl">Are You Sure to Remove? <button  type="button" class="pull-right" data-dismiss="modal">[X]</button></h4>
      </div>
      <div id="statusresult">
      </div>
      
    </div>

  </div>
    </div>
                            
                            
                        </section>
                        
                    </section>
                </section>
                
            </section>
            
        </section>
    </section>
    <!-- Javascript -->
   

<script>
    
$(document).ready(function(){
//------------------------------------------------------------------------------
//Update Category In Database Ajax
//------------------------------------------------------------------------------
$(document).on("click", "#updatecat", function(){

var vname = $("#Editcatname").val();
var id = $("#getid").val();
if(vname==''){$("#name").focus();return;}
else{
$.post("cat_update_post.php", //Required URL of the page on server
{
ID:id,
NAME:vname
},
function(response,status){ // Required Callback Function
$("#errrror").html(response);
window.location.reload();
});
}
});
//------------------------------------------------------------------------------
//Update Navbar In Database Ajax
//------------------------------------------------------------------------------
$(document).on("click", ".navbtn", function(){
var id = $(this).attr("id");
if(id==''){return false;}
else{
$.post("nav_update_post.php", //Required URL of the page on server
{
ID:id,
},
function(response,status){ // Required Callback Function
window.location.reload();
});
}
});
//------------------------------------------------------------------------------
//Update Publish In Database Ajax
//------------------------------------------------------------------------------
$(document).on("click", ".btnpub", function(){
var id = $(this).attr("id");
if(id==''){return false;}
else{
$.post("pub_update_post.php", //Required URL of the page on server
{
ID:id,
},
function(response,status){ // Required Callback Function
window.location.reload();
});
}
});
//------------------------------------------------------------------------------
//click In Edit Bottun
//------------------------------------------------------------------------------
$(document).on("click", ".btnedit", function(){
        var id = $(this).attr("id");
        $("#m-ttl").html("Aru You Sure To Edit ?")
        //alert(id);
        $.ajax({
            type: "post",
            url : "edit_cat_name.php",
            data : {i : id},
            error: function (html) {
                    },
            success: function (html) {
                    $("#statusresult").html(html);
                    $('#myModal').modal("show");
    }
        });
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
$("#menuaside").hide(600);
});
}
});


$(document).on("click", ".btndel", function(){
        var id = $(this).attr("id");
        $.ajax({
            type: "post",
            url : "confirm_to_remove.php",
            data : {i : id},
            error: function (html) {
                    $("#statusresult").html(html);
                    },
            success: function (html) {
                    $("#m-ttl").html("Aru You Sure To Remove ?"+'<button  type="button" class="pull-right" data-dismiss="modal">[X]</button>')
                    $("#statusresult").html(html);
                    $('#myModal').modal("show");           
    }
        });
    });
        

//-------------------------------------
$(document).on("click", ".comfirm", function(){
var id = $(this).attr("id");
var idi = id.replace('tr','#tr');
//alert(id);
var i = id.replace('tr','');
$.post("cat_remove.php",
{ 
i:i
},
function(response,status){
$('#myModal').modal("hide");
$(idi).hide(600);
});
});
    
  
});
</script>
    <!-- Bootstrap -->
    <!-- App -->
    <script src="../../js/app.v1.js"></script>
    <script src="../../js/app.plugin.js"></script>
</body>

</html>