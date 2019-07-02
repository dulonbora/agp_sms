<?php include '../../include/AHeader.php';
include '../../classes/UI.php';
include '../../classes/NavBar.php'; 
include '../../classes/user.php'; 
$UI = new UI;
$user = new user();
$N = new NavBar;
?>
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
                        <section class="wrapper">
<div class="row">
                                <div class="col-lg-12">
                                    <section class="panel panel-default"> <header class="panel-heading">User List</header> 
                                        <div class="row wrapper">  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 m-b-xs"> 
                                                <div class="btn-group" data-toggle="buttons"> 
                                                    <button id="addnew" class="btn btn-sm btn-default btn-block active">Add New User</button>
                                                    
                                                </div> </div> <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"> <div class="input-group"> 
                                                        <input type="text" class="input-sm form-control" placeholder="Search">
                                                        <span class="input-group-btn"> <button class="btn btn-sm btn-default" type="button">Go!</button> 
                                                        </span> </div> </div> </div> 
                                        
                                        <div class="table-responsive"> 
                                        <table class="table table-striped b-t b-light">
                                        <thead> 
                                        <tr>
                                        <th>Usernmae</th> 
                                        <th>Name</th> 
                                        <th>Email</th> 
                                        <th>Role</th>  
                                        </tr> </thead> <tbody>
                                        <?php $user->AdminLoad(); ?>
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
                <aside class="aside-lg bg-light b-r" id="menuaside"> 
                    <div id="addmenuview"> </div> </aside>
            </section>
            
        </section>
    </section>
    <!-- Javascript -->
   

<script>
    
$(document).ready(function(){
    
    
    $("#menuaside").hide();
    $(document).on("click", "#addfghghjgdfgfnew", function(){
    $("#menuaside").toggle(600);
    $("#menuaside").load("users_add_ajax.php", 400);
    });
    
    $(document).on("click", "#addnew", function(){
    $('#statusresult').load("users_add_ajax.php");  
    $('#myModal').modal("show");  
    });
    
    /*
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
    */
//-------------------------------------

$(document).on("click", ".azcxzcxzcdduser1", function () {
            var vemail = $("#email").val();
            var vfname = $("#fname").val();
            var vlname = $("#lname").val();
            var vpass = $("#pass").val();
            var vrole = $("#role").val();
    if(vemail==''){$("#name").focus();return;}
            else{
    $.ajax({
                    type: "POST",
                    url: "user_add.php",
                    data: {EMAIL:vemail, FNAME:vfname, LNAME:vlname, PASS:vpass, ROLE:vrole},
                    error: function (html) {
                        $("#statusresult").html(html);
                    },
                    success: function (html) {
                        $("#menuaside").html(html);
                    }
                });
                }
            });
            
});
</script>
    <!-- Bootstrap -->
    <!-- App -->
    <script src="../../js/app.v1.js"></script>
    <script src="../../js/app.plugin.js"></script>
</body>

</html>