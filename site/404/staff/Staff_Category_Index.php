<!DOCTYPE html>
<html lang="en" class="app">

<head>
    <meta charset="utf-8" />
    <title>Musik | Web Application</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="../../js/jPlayer/jplayer.flat.css" type="text/css" />
    <link rel="stylesheet" href="../../css/app.v1.css" type="text/css" />
    <link rel="stylesheet" href="../../js/nestable/nestable.css" type="text/css">
    <script src="../../js/jquery-3.1.1.min.js"></script>
<style>
    @media screen and (min-width: 768px) {
    .modal-dialog {
  position:absolute;
  top:50% !important;
  transform: translate(0, -50%) !important;
  -ms-transform: translate(0, -50%) !important;
  -webkit-transform: translate(0, -50%) !important;
  margin:auto 5%;
  width:90%;
  height:80%;
}
.modal-content {
  min-height:100%;
  position:absolute;
  top:0;
  bottom:0;
  left:0;
  right:0; 
}
.modal-body {
  position:absolute;
  top:45px; // height of header
  bottom:45px;  // height of footer
  left:0;
  right:0;
  overflow-y:auto;
}
.modal-footer {
  position:absolute;
  bottom:0;
  left:0;
  right:0;
}
    }
    </style>
</head>
<?php include '../../classes/UI.php';
include '../../classes/NavBar.php'; 
include '../../classes/Menu.php'; 

$menu = new Menu();
$UI = new UI;
$N = new NavBar;

?>

<body class="">
    <section class="vbox">
        <?php echo $UI->Work("ADMIN"); ?>

        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <?php echo $N->Admin(); ?>
                <aside class="aside-lg bg-light b-r" id="menuaside"> 
                    <div id="addmenuview"> </div> </aside>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
<div class="row">
                                <div class="col-lg-12">
                                    <section class="panel panel-default"> <header class="panel-heading">Category List</header> 
                                        <div class="row wrapper">  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 m-b-xs"> 
                                                <div class="btn-group" data-toggle="buttons"> 
                                                    <button id="addnew" class="btn btn-sm btn-default btn-block active">Add New</button>
                                                    
                                                </div> </div> <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"> <div class="input-group"> 
                                                        <input type="text" class="input-sm form-control" placeholder="Search">
                                                        <span class="input-group-btn"> <button class="btn btn-sm btn-default" type="button">Go!</button> 
                                                        </span> </div> </div> </div> 
                                        
                                        <div class="table-responsive"> 
                                        <table class="table table-striped b-t b-light">
                                        <thead> 
                                        <tr>
                                        <th class="th-sortable" data-toggle="class">Category</th> 
                                        <th>Category</th> 
                                        <th>Navbar</th> 
                                        <th>Create On</th> 
                                        <th>Edit</th>  
                                        <th>Remove</th> 
                                        <th style="width:30px;">Status</th> 
                                        </tr> </thead> <tbody>
                                        <?php $menu->AdminLoadCategory(); ?>
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
        <h4 class="modal-title">Are You Sure to Remove?</h4>
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
    $("#menuaside").hide();
    $(document).on("click", "#addnew", function(){
    $("#menuaside").toggle();
        var id = "0";
        $.ajax({
            type: "post",
            url : "category_add_ajax.php",
            data : {i : id},
            error: function (html) {
                    $("#addmenuview").html(html);
                    },
            success: function (html) {
                    $("#addmenuview").html(html);
    }
        });
    });
    

//-------------------------------------

    $(document).on("click", ".btnview", function(){
        var id = $(this).attr("id");
        $.ajax({
            type: "post",
            url : "../../ajax/confirm_to_remove.php",
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
        

//-------------------------------------
$(document).on("click", ".comfirm", function(){
var id = $(this).attr("id");
var idi = id.replace('tr','#tr');
//alert(id);
var i = id.replace('tr','');
$.post("../../ajax/Menu_Remove.php",
{ 
i:i
},
function(response,status){
//alert(i);
$('#myModal').modal("hide");
$(idi).hide();
});
});
    
$("#addmenu").click(function(){
var vname = $("#name").val();
var vis_menu = $("#is_menu").val();
var vprentid = $("#prentid").val();
var vis_navbar = $("#is_navbar").val();
var navbar = parseInt(vis_navbar);
var vis_submenu = $("#is_submenu").val();
var vis_publish = $("#is_publish").val();
if(vname=='')
{

$("#name").focus();

}
else if(vname==''){$("#name").focus();return;}
else{
$.post("../../ajax/Menu_Add.php", //Required URL of the page on server
{ 
NAME:vname,
IS_PAGE:vis_menu,
IN_NAVBAR:navbar,
PUBLISH:vis_publish,
PERANT_ID:vprentid,
SUBMENU:vis_submenu
},
function(response,status){ // Required Callback Function
alert("*----Received Data----*\n\nResponse : " + response+"\n\nStatus : " + status);//"response" receives - whatever written in echo of above PHP script.
//$("#fmenu")[0].reset();
});
}
});
});
</script>
    <!-- Bootstrap -->
    <!-- App -->
    <script src="../../js/app.v1.js"></script>
    <script src="../../js/nestable/jquery.nestable.js"></script>
    <script src="../../js/nestable/demo.js"></script>
    <script src="../../js/app.plugin.js"></script>
</body>

</html>