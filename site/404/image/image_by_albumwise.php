<?php 
include '../../include/AHeader.php';
include '../../classes/NavBar.php';
$n = new NavBar;
include '../../classes/UI.php';
$UI = new UI;
include '../../classes/Paggination.php';
$Page = new Paggination();
$id = "-1";
if (isset($_GET['i']) == true){$id = $_GET['i'];}

?>
<head><style>
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
    </style></head>


    <body class="">
        <section class="vbox"> 
<?php $UI->Work("Songs"); ?> 

            <section class="hbox stretch"> <!-- .aside --> 
<?php $n->Admin(); ?> 
                    <!-- /.aside -->
                    <section id="content"> 
                        <section class="vbox">
                            <section class="w-f-md" id="bjax-target"> 
                                <section class="hbox stretch">
                                    <section class="vbox"> <section class="scrollable padder-lg"> 
                                                <h2 class="font-thin m-b">dffdffdg 
                                                <div class="btn-group pull-right" data-toggle="buttons"> 
                                                    <button id="<?php echo $id;?>" class="btn btn-sm btn-default addPhoto">Add New Photo</button>
                                                    
                                                </div>    
                                                </h2>
                                                 

<?php echo $Page->PagginationForImageAlbum($id);?>


                                            </section> </section></section></section> 
                        </section>
                    
                    </section> 
            <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="m-ttl"><button  type="button" class="pull-right" data-dismiss="modal">[X]</button></h4>
      </div>
      <div id="statusresult">
      </div>
      
    </div>

  </div>
    </div>
            
            </section></section>
        
        
        
        
        <script>
    
$(document).ready(function(){
    
    
$(document).on("click", ".addPhoto", function(){
        var id = $(this).attr("id");
        $.ajax({
            type: "post",
            url : "image_add_ajax.php",
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
    
$(document).on("click", ".addPhoto", function(){
        var id = $(this).attr("id");
        $.ajax({
            type: "post",
            url : "image_add_ajax.php",
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
    
    $(document).on("click", ".btndel", function(){
        var id = $(this).attr("id");
        $.ajax({
            type: "POST",
            url : "remove_image_from_datebase.php",
            data : {i : id},
            error: function (html) {
                    $("#statusresult").html(html);
                    },
            success: function (html) {
                    $("#img_"+id).hide(600);
    }
        });
});

});
</script>
        <script src="../../js/app.v1.js"></script>
        <script src="../../js/app.plugin.js"></script>
</html>
