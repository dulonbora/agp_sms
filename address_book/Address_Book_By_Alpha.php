

<?php

include_once '../classes/Mobile_Detect.php';
$Mobile_Detect = new Mobile_Detect();

include_once '../classes/Users.php';
$Users = new Users();

if(session_status()==PHP_SESSION_NONE){session_start();}
$tittle = "Address Book";

$id = filter_input(INPUT_GET, 'l');

$letterList = $Users->loadAllLetters();


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

                        <div id="contacts" class="page-layout simple left-sidebar-floating">

                            <div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">

                                <div class="col">

                                    <div class="row no-gutters align-items-center flex-nowrap">


                                        <!-- APP TITLE -->
                                        <div class="logo row no-gutters align-items-center flex-nowrap">
                                            <span class="logo-icon mr-4">
                                                <i class="icon-account-box s-6"></i>
                                            </span>
                                            <?php if(!$Mobile_Detect->isMobile()){ ?>
                                            <span class="logo-text h5">Address Book</span>
                                            <?php }?>
                                        </div>
                                    </div>
                                    <!-- / APP TITLE -->
                                </div>

                                <!-- SEARCH -->
                                <div class="col search-wrapper">

                                    <div class="input-group">

                                        <span class="input-group-btn">

                                            <>

                                        </span>

                                        <input id="contacts_search" type="text" class="form-control" placeholder="Search for anyone" aria-label="Search for anyone" />

                                    </div>
                                </div>
                                <!-- / SEARCH -->
                                
                                <div class="col-auto">
                                    <a href="New_Member.php" class="btn btn-light">ADD NEW</a>
                                </div>

                                
                            </div>
                            <!-- / HEADER -->

                            
                            <div class="page-content-wrapper">


                                <!-- CONTENT -->
                      
                                <div class="page-content p-4 p-sm-6">
                                    <!-- CONTACT LIST -->
                                    <div class="contacts-list card">
<ul class="pagination pagination-lg">
       
                                                    <?php
                                                    foreach ($letterList as $rows) {
                                                        ?>
    <li class="page-item"><a class="page-link" href="Address_Book_By_Alpha.php?l=<?php echo $rows["FIRST_LETER"];?>"><?php echo $rows["FIRST_LETER"];?> (<?php echo $Users->CountTotalByLtr($rows["FIRST_LETER"]);?>)</a></li>
                                                    <?php } ?>

    </ul>
                                        <!-- CONTACT LIST HEADER -->
                                        <dvi class="contacts-list-header p-4">

                                            <div class="row no-gutters align-items-center justify-content-between">

                                                <div class="list-title text-muted">
                                                    All contacts
                                                </div>

                                                <button type="button" class="btn btn-icon">
                                                    <i class="icon icon-sort-alphabetical"></i>
                                                    <?php echo $id;?>
                                                </button>
                                            </div>

                                        </dvi>
                                        <!-- / CONTACT LIST HEADER -->
                                        
                                               <div id="Member_List"></div>
                                             
                                        
                                        
                                        <dvi id="Fotter_Part" class="contacts-list-header p-4">

                                            <div class="row no-gutters align-items-center justify-content-between">
                                                <button id="Btn_More" type="button" class="btn">
                                                    Load More
                                                </button>
                                            </div>

                                        </dvi>
                                    <!-- / CONTACT LIST -->
                                </div>
                                <!-- / CONTENT -->
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </main>
    </body>
<script type="text/javascript">
<?php
  echo "var ltr = '{$id}';";
?>
    page_no = 1;
</script>
<script type="text/javascript" src="Address_bok_Alpha.js"></script>

</html>