<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$tittle = "Group List";
?>


<!DOCTYPE html>
<html lang="en-us">
<?php include '../include/headers_files.php'; ?>
    <body class="layout layout-vertical layout-left-navigation layout-below-toolbar">
        <main>
            <div id="wrapper">

<?php include '../sidebar/main.php'; ?>
                <div class="content-wrapper">


<?php include '../include/toolbar.php'; ?>

                    <div class="content custom-scrollbar">

                        <div id="file-manager" class="page-layout simple right-sidebar">

                            <div class="page-content-wrapper custom-scrollbar">

                                <!-- HEADER -->
                                <div class="page-header bg-secondary text-auto p-4">

                                    <!-- HEADER CONTENT-->
                                    <div class="header-content d-flex flex-column justify-content-between">

                                        <!-- TOOLBAR -->
                                        <div class="toolbar row no-gutters justify-content-between">

                                            <button type="button" class="btn btn-icon">
                                                <i class="icon icon-menu"></i>
                                            </button>

                                            <div class="right-side row no-gutters">

                                                <button type="button" class="btn btn-icon">
                                                    <i class="icon icon-magnify"></i>
                                                </button>

                                                <button type="button" class="btn btn-icon">
                                                    <i class="icon icon-view-module"></i>
                                                </button>

                                            </div>

                                        </div>
                                        <!-- / TOOLBAR -->

                                        <!-- BREADCRUMB -->
                                        <div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">

                                <div class="col">

                                    <div class="row no-gutters align-items-center flex-nowrap">


                                        <!-- APP TITLE -->
                                        <div class="logo row no-gutters align-items-center flex-nowrap">
                                            <span class="logo-icon mr-4">
                                                <i class="icon-account-box s-6"></i>
                                            </span>
                                                                                        <span class="logo-text h5">Group List</span>
                                                                                    </div>
                                    </div>
                                    <!-- / APP TITLE -->
                                </div>

                                <!-- SEARCH -->
                                <div class="col search-wrapper" id="MASSAGE">

                                    <div class="input-group">

                                        <span class="input-group-btn">

                                            <button type="button" class="btn btn-icon fuse-ripple-ready">
                                                <i class="icon icon-magnify"></i>
                                            </button>

                                        </span>

                                        <input id="contacts-search-input" type="text" class="form-control" placeholder="Search for anyone" aria-label="Search for anyone">

                                    </div>
                                </div>
                                <!-- / SEARCH -->
                                
                                <div class="col-auto">
                                    <button id="Post_Add" class="btn btn-light fuse-ripple-ready">ADD NEW</button>
                                </div>

                                
                            </div>
                                        <!-- / BREADCRUMB -->

                                    </div>
                                    <!-- / HEADER CONTENT -->

                                    <!-- ADD FILE BUTTON -->
                                    <button id="add-file-button" type="button" class="btn btn-danger btn-fab" aria-label="Add file">
                                        <i class="icon icon-plus"></i>
                                    </button>
                                    <!-- / ADD FILE BUTTON -->

                                </div>
                                <!-- / HEADER -->

                                <!-- CONTENT -->
                                <div class="page-content custom-scrollbar">
                                    <!-- LIST VIEW -->
                                    <table  style="margin-left: 30px" class="table list-view">

                                        <thead>

                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th class="d-none d-md-table-cell">Group Type</th>
                                                <th class="d-none d-sm-table-cell">Category</th>
                                                <th class="d-table-cell d-xl-none"></th>
                                            </tr>

                                        </thead>

                                        <tbody id="Group_List">

                                        </tbody>
                                    </table>
                                    <!-- / LIST VIEW -->
                                </div>
                                <!-- / CONTENT -->
                            </div>

                            
                        </div>

                    </div>
                </div>
                
            </div>
        </main>
        
        
        
        <div id="ModalLive" class="modal fade" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLiveLabel">Post Multiple Group</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div id="ModalLiveBody" class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        
    </body>

    <script type="text/javascript" src="../group/grop_list_multi.js"></script>
</html>