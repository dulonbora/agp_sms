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
        <?php echo $UI->Work("ADMIN"); ?>
        

        <section>
            
            <section class="hbox stretch">
                <!-- .aside -->
                <?php echo $N->Admin(); ?>
                
                <!-- /.aside -->
                <section id="content"> <section class="vbox">
                        <header class="header bg-info lter hidden-print">
                            <p class="text-center"> Menus</p><a href="#" id="rootmenu" class="btn btn-sm btn-primary pull-right">Root Menu</a>
                            <a href="#" id="submenu" class="btn btn-sm btn-success pull-right">Sub Menu</a>
                            <a href="#" id="addpage" class="btn btn-sm btn-danger pull-right">Page</a>
                            <a href="serial.php" id="" class="btn btn-sm btn-default pull-left">Serialization Menu</a>
            </header>
                        <section class="scrollable wrapper">   <div class="row">   
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2"> 
                                    <div class="dd" id="nestable3"> 
                                        <ol class="dd-list">
                                        
                                        <?php echo $menu->MainMenu();?>
                                        </ol> </div> </div> 
                            </div>  </section> 
                    </section> 
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a> </section>
                
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
                
                <aside class="aside-lg bg-light b-r" id="menuaside"> 
                    <div id="addmenuview"> </div> </aside>
            </section>
            
        </section>
    </section>
    <!-- Javascript -->
   

<script>
$(document).ready(function(){
    $("#menuaside").hide();
    $(document).on("click", "#rootmenu", function(){
    $("#menuaside").load("menu_add_ajax.php").fadeIn(800);
    });
    
    $(document).on("click", "#submenu", function(){
    $("#menuaside").load("submenu_add_ajax.php").fadeIn(800);
    });
    
    $(document).on("click", "#addpage", function(){
    $("#menuaside").load("page_add_ajax.php").fadeIn(800);
    });
    
    
    $(document).on("click", "#sidehide", function(){
    $("#menuaside").hide(800);
    });
    
    
    $(document).on("click", ".editmenu", function(){
        var id = $(this).attr("id");
        $("#m-ttl").html("Aru You Sure To Remove ?"+'<button  type="button" class="pull-right" data-dismiss="modal">[X]</button>')
        $.ajax({
            type: "post",
            url : "menu_rename.php",
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
    
    

$(document).on("click", "#addmenu", function(){
var vname = $("#name").val();
var vis_menu = $("#is_menu").val();
var vprentid = $("#prentid").val();
var vis_navbar = $("#is_navbar").val();
var vis_submenu = $("#is_submenu").val();
var vis_publish = $("#is_publish").val();
if(vname==''){$("#name").focus();return;}
else{
$.post("Menu_Add.php", //Required URL of the page on server
{
NAME:vname,
PAGE:vis_menu,
NAVBAR:vis_navbar,
PUBLISH:vis_publish,
PARENT:vprentid,
SUBMENU:vis_submenu
},
function(response,status){ // Required Callback Function
    window.location.reload();
});
}
});

$(document).on("click", "#updatemenu", function(){
var vname = $("#Editmenu").val();
var id = $("#getid").val();
if(vname==''){$("#Editmenu").focus();return;}
else{
$.post("menu_update_post.php", //Required URL of the page on server
{
NAME:vname,
ID:id
},
function(response,status){ // Required Callback Function
    window.location.reload();
});
}
});


//------------------------------------------------------------------------------
//click In Remove Category Button
//------------------------------------------------------------------------------
$(document).on("click", ".btndel", function(){
        var id = $(this).attr("id");
        $("#m-ttl").html("Aru You Sure To Remove ?"+'<buttom class="badge bg-danger pull-right" data-dismiss="modal">X</buttom>')
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
$.post("Menu_Remove.php",
{ 
i:i
},
function(response,status, html){
$('#myModal').modal("hide");
window.location.reload();
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