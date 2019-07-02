
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$tittle = "Add Members";
include '../classes/Users.php';
include '../classes/Mobile_Detect.php';
$Users = new Users();
$Mobile_Detect = new Mobile_Detect();
$id = filter_input(INPUT_GET, 'id');



$Total = $Users->CountTotal();
$limit = 20;
$TotalPage = ceil($Total / $limit);
$page = (int) (!isset($_GET['page']) ? 1 : $_GET['page']);
if (($page + 1) == $TotalPage) {
    $page == 0;
}
$start = ($page - 1) * $limit;
$userList = $Users->loadAllPagging($start, $limit);



include '../classes/View_Group_Members.php';
$View_Group_Members = new View_Group_Members();

$TotalRow = $View_Group_Members->CountTotal($id);
$MemberList = $View_Group_Members->loadAllPagging($id, 0, 1000);



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

                        <div id="search" class="page-layout simple tabbed">

                            <!-- HEADER -->
                            <div class="page-header bg-secondary text-auto d-flex flex-column justify-content-center p-6">

                                <!-- SEARCH -->
                                <div class="search-bar">

                                    <div class="input-group">

                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-icon">
                                                <i class="icon icon-magnify"></i>
                                            </button>
                                        </span>

                                        <input type="text" class="search-input form-control" placeholder="Search.." aria-label="Search.." />

                                    </div>
                                </div>
                                <!-- / SEARCH -->
                            </div>
                            <!-- / HEADER -->

                            <!-- CONTENT -->
                            <div class="page-content">

                                <ul class="nav nav-tabs" id="myTab" role="tablist">


                                    <li class="nav-item">
                                        <a class="nav-link btn active" id="users-tab" data-toggle="tab" href="#users-tab-pane" role="tab" aria-controls="users-tab-pane">All Users</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link btn" id="contacts-tab" data-toggle="tab" href="#contacts-tab-pane" role="tab" aria-controls="about-tab-pane">Members</a>
                                    </li>

                                </ul>

                                <div class="tab-content">


                                    <div class="tab-pane fade show active" id="users-tab-pane" role="tabpanel" aria-labelledby="users-tab">


                                        <div class="result-info d-flex flex-column flex-sm-row align-items-center justify-content-center justify-content-sm-between pb-4">





                                            <div>

                                                <span class="title font-weight-bold h5 mr-2">Address Book</span>

                                                <span class="result-count text-muted ">
                                                    <span><?php echo $Total; ?></span>
                                                    <span>Results</span>
                                                </span>

                                            </div>


                                        </div>

                                        <div class="results table-responsive">

                                            <table class="table table-striped">

                                                <thead>





                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <?php if (!$Mobile_Detect->isMobile()) { ?>
                                                            <th>Email</th>
                                                        <?php } ?>
                                                        <th class="text-center">Add As Member</th>
                                                    </tr>
                                                </thead>

                                                <tbody>



                                                    <?php
                                                    foreach ($userList as $rows) {
                                                        ?>

                                                        <tr class="result-item">




                                                            <td class="name"><?php echo $rows['NAME'] ?></td>
                                                            <td class="phone"><?php echo $rows['MOBILE_NO']; ?></td>

                                                            <?php if (!$Mobile_Detect->isMobile()) { ?>
                                                                <td class="email"><?php echo $rows['EMAIL']; ?></td>
                                                            <?php } ?>                                                            
                                                                <td class="email text-center"><button class="btn btn-secondary btn-sm AddMember" id="<?php echo $rows['ID'];?>">Add</button></td>
                                                        </tr>                               




                                                        </tr>
                                                    <?php } ?>




                                                </tbody>
                                            </table>
                                        </div>


                                        <ul style="margin-left: 10px; margin-right: 10px;" class="pager text-center m-t-lg m-b-lg">
                                            <?php $p = $page - 1;
                                            if ($page > 1) { ?>
                                                <li><a href="permit_list.php?page=<?php echo $p; ?>" class="btn btn-rounded pull-left">Previous</a></li>
                                                <?php };
                                                if ($Total > $limit) {
                                                    $n = $page + 1;
                                                    if ($page < $TotalPage) { ?>
                                                    <li><a href="permit_list.php?page=<?php echo $n; ?>" class="btn btn-rounded pull-right">Next</a><li>
    <?php }
}; ?>
                                        </ul>                                        



                                        <nav aria-label="pagination" class="my-8">

                                            <ul class="pagination">

                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Go to previous page">
                                                        <i class="icon icon-chevron-left"></i>
                                                    </a>
                                                </li>



                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Go to next page">
                                                        <i class="icon icon-chevron-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>

                                    <div class="tab-pane fade" id="contacts-tab-pane" role="tabpanel" aria-labelledby="contacts-tab">

                                        <div class="result-info d-flex flex-column flex-sm-row align-items-center justify-content-center justify-content-sm-between pb-4">

                                            <div>

                                                <span class="title font-weight-bold h5 mr-2">Members List</span>

                                                <span class="result-count text-muted">
                                                    <span><?php echo $TotalRow;?></span>
                                                    <span>Results</span>
                                                </span>

                                            </div>

                                        </div>

                                        <div class="results table-responsive table-striped">

                                            <table class="table table-striped">

                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Phone</th>
<?php if (!$Mobile_Detect->isMobile()) { ?>
                                                            <th>Email</th>
<?php } ?>
                                                        <th class="text-center">Remove</th>
                                                    </tr>
                                                </thead>

                                                <tbody>


                                          <?php
                                                    foreach ($MemberList as $rows) {
                                                        ?>

                                                        <tr class="result-item">

                                                            


                                                            <td class="name"><?php echo $rows['NAME'] ?></td>
                                                            <td class="phone"><?php echo $rows['MOBILE_NO']; ?></td>

                                                        <?php if(!$Mobile_Detect->isMobile()){ ?>
                                                            <td class="phone"><?php echo $rows['EMAIL']; ?></td>
                                                        <?php } ?>
                                                                             
                                                            <td class="email text-center"><button class="btn btn-danger btn-sm Btn_Remove" id="<?php echo $rows['USER_ID']; ?>">Remove</button></td>
                                                        </tr>                               




                                                        </tr>
<?php } ?>




                                                </tbody>
                                            </table>
                                        </div>

                                        <nav aria-label="pagination" class="my-8">

                                            <ul class="pagination">

                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Go to previous page">
                                                        <i class="icon icon-chevron-left"></i>
                                                    </a>
                                                </li>



                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Go to next page">
                                                        <i class="icon icon-chevron-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <!-- / CONTENT -->
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
                        <h5 class="modal-title" id="ModalLiveLabel">Join Member</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div id="ModalLiveBody" class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="Btn_Save">Add Member</button>
                    </div>
                </div>
            </div>
        </div>
        
        
        

        <div id="ModalLive1" class="modal fade" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLiveLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLiveLabel">Remove Member</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div id="ModalLiveBody1" class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="Btn_Confirm_Remove">Remove Member</button>
                    </div>
                </div>
            </div>
        </div>
        
        
        
    <script type="text/javascript">
    <?php
      echo "var groupId = '{$id}';";
    ?>
    </script>
        <script type="text/javascript" src="Add_Member.js"></script>

    </body>


</html>