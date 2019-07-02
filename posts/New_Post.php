<?php if(session_status()==PHP_SESSION_NONE){session_start();}
$id         = filter_input(INPUT_GET, 'i');
$gid        = filter_input(INPUT_GET, 'id');
include '../classes/Posts.php';
$Posts      = new Posts();
$Posts->loadValue($id);
$tittle     = $Posts->getId() > 0 ? $Posts->getSubject()." | Edit" : "Create New Post";

?>

<!DOCTYPE html>
<html lang="en-us">
<?php include '../include/headers_files.php';?>
<body class="layout layout-vertical layout-left-navigation layout-below-toolbar">
    <main>
        <div id="wrapper">
            <?php include '../sidebar/main.php';?>
            <div class="content-wrapper">
            <?php include '../include/toolbar.php';?>
                <div class="content custom-scrollbar">

                    <div id="e-commerce-product" class="page-layout simple tabbed">

                        <!-- HEADER -->
                        <div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-6">

                            <div class="row no-gutters align-items-center">

                                <a href="../group/Group_Details.php?id=<?php echo $gid;?>" class="btn btn-icon mr-4">
                                    <i class="icon icon-arrow-left"></i>
                                </a>

                                <div class="product-image mr-4">
                                    <img src="../assets/images/ecommerce/product-image-placeholder.png">
                                </div>

                                <div>Post Detail</div>
                            </div>

                            <button type="button" id="Btn_Save" class="btn btn-danger">
                                SAVE
                            </button>

                        </div>
                        <!-- / HEADER -->

                        <!-- CONTENT -->
                        <div class="page-content">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link btn active" id="basic-info-tab" data-toggle="tab" href="#basic-info-tab-pane" role="tab" aria-controls="basic-info-tab-pane" aria-expanded="true">Basic Info</a>
                                </li>
                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane fade show active" id="basic-info-tab-pane" role="tabpanel" aria-labelledby="basic-info-tab">

                                    <div class="card p-6">

                                        <form id="PostForm">

                                            <div class="form-group">
                                                <input type="hidden" name="ID" value="<?php echo $Posts->getId() > 0 ? $Posts->getId() : 0;?>" id="ID"/>
                                                <input type="hidden" name="GROUP_ID" value="<?php echo $Posts->getId() > 0 ? $Posts->getGroupId() : $gid;?>" id="GROUP_ID"/>
                                                <input type="text" name="SUBJECT" value="<?php echo $Posts->getId() > 0 ? $Posts->getSubject() : "";?>" id="SUBJECT" class="form-control" aria-describedby="Subject" />
                                                <label>Subject</label>
                                            </div>

                                            <div class="form-group">
                                                <textarea name="DESCRIPTION" id="DESCRIPTION" class="form-control" aria-describedby="product description" rows="5"><?php echo $Posts->getId() > 0 ? $Posts->getDescription() : "";?></textarea>
                                                <label>Description</label>
                                            </div>


                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- / CONTENT -->
                    </div>

                    <script type="text/javascript" src="new_grop.js"></script>

                </div>
            </div>

        </div>
    </main>
</body>


</html>