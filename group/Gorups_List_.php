<?php if(session_status()==PHP_SESSION_NONE){session_start();}
$tittle = "Group List";

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

                    <div id="e-commerce-products" class="page-layout carded full-width">

                        <div class="top-bg bg-secondary"></div>

                        <!-- CONTENT -->
                        <div class="page-content-wrapper">

                            <!-- HEADER -->
                            <div class="page-header light-fg row no-gutters align-items-center justify-content-between">

                                <!-- APP TITLE -->
                                <div class="col-12 col-sm">

                                    <div class="logo row no-gutters justify-content-center align-items-start justify-content-sm-start">
                                        <div class="logo-icon mr-3 mt-1">
                                            <i class="icon-cube-outline s-6"></i>
                                        </div>
                                        <div class="logo-text">
                                            <div class="h4">Group List</div>
                                            <div class="">Total Groups: 20</div>
                                        </div>
                                    </div>

                                </div>
                                <!-- / APP TITLE -->

                                <!-- SEARCH -->
                                <div class="col search-wrapper px-2">

                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-icon">
                                                <i class="icon icon-magnify"></i>
                                            </button>
                                        </span>
                                        <input id="products-search-input" type="text" class="form-control" placeholder="Search" aria-label="Search" />
                                    </div>

                                </div>
                                <!-- / SEARCH -->

                                <div class="col-auto">
                                    <a href="New_Post.php" class="btn btn-light">ADD NEW GROUP</a>
                                </div>

                            </div>
                            <!-- / HEADER -->

                            <div class="page-content-card">

                                <table id="e-commerce-products-table" class="table table-striped">
                                    <thead>
                                        
                                        <tr>
                                            
                                            <th class='text-left'>
                                                <div class="table-header">
                                                    <span class="column-title">Name</span>
                                                </div>
                                            </th>

                                            
                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Category</span>
                                                </div>
                                            </th>


                                            <th class="text-center">
                                                <div class="table-header">
                                                    <span class="column-title">Action</span>
                                                </div>
                                            </th>

                                        </tr>
                                        
                                    </thead>

                                    <tbody id="Group_List">
                                    </tbody>
                                </table>
                            <div class="dataTables_footer"><div class="dataTables_info" id="e-commerce-products-table_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div><div class="dataTables_paginate paging_simple_numbers" id="e-commerce-products-table_paginate"><a class="paginate_button previous disabled" aria-controls="e-commerce-products-table" data-dt-idx="0" tabindex="0" id="e-commerce-products-table_previous">Previous</a><span></span><a class="paginate_button next disabled" aria-controls="e-commerce-products-table" data-dt-idx="1" tabindex="0" id="e-commerce-products-table_next">Next</a></div></div>
                            </div>
                        </div>
                        <!-- / CONTENT -->
                    </div>

                    <script type="text/javascript" src="../group/grop_list.js"></script>
                    <script type="text/javascript" src="../assets/js/apps/e-commerce/products/products.js"></script>

                </div>
            </div>
            

        </div>
    </main>
</body>


</html>