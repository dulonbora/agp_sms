<?php include '../../include/AHeader.php';
include '../../classes/UI.php';
include '../../classes/NavBar.php'; 
include '../../classes/Menu.php'; 
$menu = new Menu();
$UI = new UI;
$N = new NavBar;
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
                                    <section class="panel panel-default"> <header class="panel-heading">Page List</header> 
                                        <div class="row wrapper">  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 m-b-xs"> 
                                                <div class="btn-group"> 
                                                    <a href="Page_Add_New.php" class="btn btn-default btn-rounded">Add New Page</a>
                                                    
                                                </div> </div> <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"> <div class="input-group"> 
                                                        <input type="text" class="input-sm form-control" placeholder="Search">
                                                        <span class="input-group-btn"> <button class="btn btn-sm btn-default" type="button">Go!</button> 
                                                        </span> </div> </div> </div> 
                                        <div class="table-responsive"> 
                                        <table class="table table-striped b-t b-light">
                                        <thead> 
                                        <tr>
                                        <th class="th-sortable" data-toggle="class">Page Name</th> 
                                        <th class="text-center">Navbar</th> 
                                        <th class="text-center">Create On</th> 
                                        <th class="text-center">Edit</th>  
                                        <th class="text-center">Remove</th> 
                                        <th class="text-center" style="width:30px;">Status</th> 
                                        </tr> </thead> <tbody>
                                        <?php $menu->AdminLoadPage(); ?>
                                        </tbody>
                                        </table> </div> 
                                         </section>
                                </div>
                            </div>
                            <div id="myModal" class="modal fade" role="dialog"><div class="modal-dialog">
    <div class="modal-content"><div class="modal-header"><h4 class="modal-title">Are You Sure to Remove?</h4></div><div id="statusresult"></div></div>
    </div></div>                        
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
//alert("*----Received Data----*\n\nResponse : " + response+"\n\nStatus : " + status);//"response" receives - whatever written in echo of above PHP script.
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
//alert("*----Received Data----*\n\nResponse : " + response+"\n\nStatus : " + status);//"response" receives - whatever written in echo of above PHP script.
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
//alert("*----Received Data----*\n\nResponse : " + response+"\n\nStatus : " + status);//"response" receives - whatever written in echo of above PHP script.
window.location.reload();
});
}
});

//------------------------------------------------------------------------------
//click In Remove Category Button
//------------------------------------------------------------------------------
$(document).on("click", ".btndel", function(){
        var id = $(this).attr("id");
        $("#m-ttl").html("Aru You Sure To Remove ?"+'<button  type="button" class="pull-right" data-dismiss="modal">[X]</button>')
        $.ajax({
            type: "post",
            url : "confirm_to_remove.php",
            data : {i : id},
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
//Confirm To Remove
//------------------------------------------------------------------------------
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
$(idi).hide(400);
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