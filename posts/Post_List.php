
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$tittle = "All Post List";
include '../classes/Posts.php';
include '../classes/Group_List.php';
include '../classes/Mobile_Detect.php';
include '../classes/DateSetter.php';
$Posts              = new Posts();
$Group_List         = new Group_List();
$Mobile_Detect      = new Mobile_Detect();
$DateSetter         = new DateSetter();

$Total = $Posts->CountTotal();
$limit = 20;
$TotalPage = ceil($Total / $limit);
$page = (int) (!isset($_GET['page']) ? 1 : $_GET['page']);
if (($page + 1) == $TotalPage) {$page == 0;}
$start = ($page - 1) * $limit;
$userList = $Posts->loadAllPagging($start, $limit);
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
    <div class="page-content">
    <div class="tab-content">
                                    <div class="tab-pane fade show active" id="users-tab-pane" role="tabpanel" aria-labelledby="users-tab">
                                        <div class="result-info d-flex flex-column flex-sm-row align-items-center justify-content-center justify-content-sm-between pb-4">

                                            <div>

                                                <span class="title font-weight-bold h5 mr-2">All Post List</span>

                                                <span class="result-count text-muted ">
                                                    <span><?php echo $Total;?></span>
                                                    <span>Results</span>
                                                </span>

                                            </div>

                                            
                                        </div>

                                        <div class="results table-responsive">

                                            <table class="table table-striped">

                                                <thead>





                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Group Name</th>
                                                        <th>Posted On</th>
                                                   
                                                        <th class="text-center">View full</th>
                                                    </tr>
                                                </thead>

                                                <tbody>



                                                    <?php
                                                    foreach ($userList as $rows) {
                                                        ?>

                                                        <tr class="result-item">

                                                            


                                                            <td class="name"><?php echo $rows['SUBJECT'] ?></td>
                                                            <td class="phone"><a href="../group/Group_Details.php?id=<?php echo $rows['GROUP_ID'];?>"><?php echo $Group_List->returnGroupName($rows['GROUP_ID']); ?></a></td>
                                                            <td class="phone"><?php echo $DateSetter->date($rows['CREATE_ON']);?></td>
                                                                             
                                                            <td class="email text-center"><button class="btn btn-secondary btn-sm">View</button></td>
                                                        </tr>                               




                                                        </tr>
<?php } ?>




                                                </tbody>
                                            </table>
                                        </div>
                                        
                                                                               
                                        
                                        

                                        <nav aria-label="pagination" class="my-8">

                                            <ul class="pagination">


                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Go to next page">
                                                        Load More <i class="icon icon-chevron-right"></i>
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
    </body>


</html>