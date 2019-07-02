<?php if(session_status()==PHP_SESSION_NONE){session_start();}
$tittle = "New Member To Address Book";
$_id          = filter_input(INPUT_GET , "i");
include '../classes/Users.php';
$Users = new Users();
$Users->loadValue($_id);
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

                                <a href="Address_Book.php" class="btn btn-icon mr-4">
                                    <i class="icon icon-arrow-left"></i>
                                </a>

                                <div class="product-image mr-4">
                                    <img src="../assets/images/ecommerce/product-image-placeholder.png">
                                </div>

                                <div>Member Detail</div>
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

                                        <form id="MemberForm">

                                            <div class="form-group">
                                                <input type="hidden" name="ID" id="ID" value="<?php echo $_id;?>" />
                                                <input type="text" name="NAME" id="NAME" value="<?php echo $Users->getName();?>" class="form-control" aria-describedby="product name" />
                                                <label>Member Name</label>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <input type="text" name="MOBILE_NO" id="MOBILE_NO" value="<?php echo $Users->getMobileNo();?>"  class="form-control" aria-describedby="product categories" />
                                                <label>Phone No</label>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" name="EMAIL" id="EMAIL"  value="<?php echo $Users->getEmail();?>" class="form-control" aria-describedby="product tags" />
                                                <label>Email Address</label>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" name="DISTRICT" id="DISTRICT" value="<?php echo $Users->getDistrict();?>" class="form-control" aria-describedby="product tags" />
                                                <label>District</label>
                                            </div>

                                            <div class="form-group">
                                                <textarea name="ADDRESS" id="ADDRESS" class="form-control" aria-describedby="product description" rows="3"><?php echo $Users->getAddress();?></textarea>
                                                <label>Address</label>
                                            </div>

                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select id="GRANDER" class="form-control">
                                                <option selected="F">FE-MALE</option>
                                                <option selected="M">MALE</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select id="inputState" class="form-control">
                                                <option selected="0">DE-ACTIVE</option>
                                                <option selected="1">ACTIVE</option>
                                                </select>
                                            </div>


                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- / CONTENT -->
                    </div>

                    <script type="text/javascript" src="../address_book/new_mem.js"></script>

                </div>
            </div>

        </div>
    </main>
</body>


</html>