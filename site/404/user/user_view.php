<?php include '../../include/AHeader.php';
include '../../classes/UI.php';
include '../../classes/NavBar.php'; 
include '../../classes/user.php'; 
include '../../classes/Staff.php'; 
include '../../classes/Images.php'; 

$UI = new UI;
$N = new NavBar;
$user = new user();
$staff = new Staff();
$image = new Images();
$id = filter_input(INPUT_GET, 'i');
$user->loadvalue($id);
$image->LoadValue($user->getIMAGE_ID());
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
                        <section class="scrollable wrapper">
                            <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <section class="panel panel-default"> 
            <header class="panel-heading bg-light no-border"> 
                <div class="clearfix"> <a href="#" class="pull-left thumb-md avatar b-3x m-r"> 
                        <img src="../../images/<?php echo $image->getIMAGE_LINK(); ?>" alt="..."> </a> <div class="clear"> 
                            <div class="h3 m-t-xs m-b-xs"><?php echo $user->getFIRSTNAME()." ".$user->getLASTNAME(); ?><i class="fa fa-circle text-success pull-right text-xs m-t-sm"></i> </div>
                            <small class="text-muted"><?php echo $user->getAccess(); ?></small> </div> </div> 
            </header>
            <div class="btn-group-justified">
                <a href="#" id="" class="btn btn-success addimg">Edit Photo</a>
            <a href="staff_edit.php?i=<?php echo $id; ?>" class="btn btn-success">Edit Member</a>
            </div>
            </section>
            <section class="panel panel-default">
            <header class="panel-heading bg-light"> 
             <span class="hidden-sm">Details</span> </header> 
                    <ul class="list-group">
                        <li class="list-group-item"><span class="pull-right"><?php echo $user->getEmail(); ?></span>  Email </li>
                        <li class="list-group-item"> <span class="pull-right"><?php echo $user->getPhone(); ?></span>  Phone No </li>
                        <li class="list-group-item"> <span class="pull-right"><?php echo $user->getAddress(); ?></span>  Address </li>
                            <li class="list-group-item"><span class="pull-right"><?php echo $user->getAbout(); ?></span>  About </li>
                    
                    </ul>
            
            </section>
                                
        </div>
    <div class="col-md-4 col-lg-4 hidden-sm hidden-xs"> 
                                    <section class="panel panel-default portlet-item">
                                        <header class="panel-heading">Related User List</header>
                                        <section class="panel-body"><?php $user->LoadRelatedUserInAdmin($id); ?></section> </section>
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
            $(document).on("click", ".addimg", function () {
                $("#m-ttl").html("Add Image This Staff Member")
                var id = $(this).attr("id");
                $.ajax({
                    type: "POST",
                    url: "image_add_ajax.php",
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

        });
    </script>
    <script src="../../js/app.v1.js"></script>
    <script src="../../js/app.plugin.js"></script>
</body>

</html>