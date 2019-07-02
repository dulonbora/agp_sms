<?php if(session_status()==PHP_SESSION_NONE){session_start();}
$id  = filter_input(INPUT_GET, 'i');
include '../classes/Group_List.php';
$Group_List = new Group_List();
$Group_List->loadValue($id);
$tittle = $Group_List->getId() > 0 ? $Group_List->getGroupName()." | Edit" : "Create New Group";

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

                                <a href="Gorups_List.php" class="btn btn-icon mr-4">
                                    <i class="icon icon-arrow-left"></i>
                                </a>

                                <div class="product-image mr-4">
                                    <img src="../assets/images/ecommerce/product-image-placeholder.png">
                                </div>

                                <div>Group Detail</div>
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
                                                <input type="hidden" name="ID" value="<?php echo $Group_List->getId() > 0 ? $Group_List->getId() : 0;?>" id="ID"/>
                                                <input type="text" name="GROUP_NAME" value="<?php echo $Group_List->getId() > 0 ? $Group_List->getGroupName() : "";?>" id="GROUP_NAME" class="form-control" aria-describedby="product name" />
                                                <label>Group Name</label>
                                            </div>

                                            <div class="form-group">
                                                <textarea name="DESCRIPTION" id="DESCRIPTION" class="form-control" aria-describedby="product description" rows="5"><?php echo $Group_List->getId() > 0 ? $Group_List->getDescription() : "";?></textarea>
                                                <label>Group Description</label>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" name="GROUP_TYPE" value="<?php echo $Group_List->getId() > 0 ? $Group_List->getGroupType() : "";?>" id="GROUP_TYPE" class="form-control" aria-describedby="product categories" />
                                                <label>Group Type</label>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" name="CATEGORY" id="CATEGORY" value="<?php echo $Group_List->getId() > 0 ? $Group_List->getCategory() : "";?>" class="form-control" aria-describedby="product tags" />
                                                <label>Short Name</label>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- / CONTENT -->
                    </div>

                    <script type="text/javascript" src="../group/new_grop.js"></script>

                </div>
            </div>

        </div>
    </main>
</body>


</html>