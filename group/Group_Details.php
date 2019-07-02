

<?php include_once '../classes/Mobile_Detect.php';
$Mobile_Detect = new Mobile_Detect();
if(session_status()==PHP_SESSION_NONE){session_start();}
$id = filter_input(INPUT_GET, 'id');


include '../classes/Group_List.php';
include '../classes/View_Group_Members.php';
include '../classes/Posts.php';
include '../classes/DateSetter.php';

$Group_List             = new Group_List();
$View_Group_Members     = new View_Group_Members();
$Posts                  = new Posts();
$DateSetter             = new DateSetter();
$Group_List->loadValue($id);
$tittle                 = $Group_List->getGroupName()." | Details";

$TotalGroupMembers      = $View_Group_Members->CountTotal($id);
$MemberList             = $View_Group_Members->loadAllPagging($id, 0, 1000);

$TotalPosts             = $Posts->CountTotalByGroupId($id);
$postList               = $Posts->loadAllPaggingByGroupId($id, 0, 1000);


$role  = $View_Group_Members->UserRole($id, $_SESSION['USER_ID']);


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

                        <div id="profile" class="page-layout simple tabbed">

                            <!-- HEADER -->
                            <div class="page-header light-fg d-flex flex-column justify-content-center justify-content-lg-end p-6">

                                <div class="flex-column row flex-lg-row align-items-center align-items-lg-end no-gutters justify-content-between">

                                    <div class="user-info flex-column row flex-lg-row no-gutters align-items-center">

                                        <img class="profile-image avatar huge mr-6" src="../assets/images/logo.png">

                                        <div class="name text-green h2 my-6"><?php echo $Group_List->getGroupName();?></div>

                                    </div>
<?php if(strcasecmp($role, 'A') == 0){ ?>
         <div class="actions row align-items-center no-gutters">

                                        <a href="../posts/New_Post.php?id=<?php echo $id;?>" class="btn btn-primary btn-sm">New Post</a>
                                        <a href="../group_members/Add_Members.php?id=<?php echo $id;?>" class="btn btn-secondary btn-sm ml-2">Members</a>
                                        <a href="New_Post.php?i=<?php echo $id;?>" class="btn btn-danger btn-sm ml-2">Edit</a>

                                    </div>
<?php }?>
                               

                                </div>
                            </div>
                            <!-- / HEADER -->

                            <!-- CONTENT -->
                            <div class="page-content">

                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    <li class="nav-item">
                                        <a style="color: #A10807;" class="nav-link btn active" id="timeline-tab" data-toggle="tab" href="#timeline-tab-pane" role="tab" aria-controls="timeline-tab-pane" aria-expanded="true">Post List</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link btn" id="about-tab" data-toggle="tab" href="#about-tab-pane" role="tab" aria-controls="about-tab-pane">About</a>
                                    </li>

                                    <li class="nav-item">
                                        <a style="color: #021A84;" class="nav-link btn" id="photos-videos-tab" data-toggle="tab" href="#photos-videos-tab-pane" role="tab" aria-controls="photos-tab-pane">Members</a>
                                    </li>

                                </ul>

                                <div class="tab-content">

                                    <div role="tabpanel" class="tab-pane fade show active" id="timeline-tab-pane" aria-labelledby="timeline-tab">

                                        <div class="row">

                                            <div class="timeline col-12 col-sm-12 col-xl-12">

<div class="results table-responsive table-striped">

                                            <table class="table table-striped">

                                                <thead>
                                                    <tr>
                                                        <th>Headline</th>
                                                        <th>Posted On</th>

                                                        <th class="text-center">View</th>
                                                    </tr>
                                                </thead>

                                                <tbody>


                                                    <?php
                                                    foreach ($postList as $rows) {
                                                        ?>

                                                        <tr class="result-item">

                                                            


                                                            <td class="name"><?php echo $rows['SUBJECT'] ?></td>
                                                            <td class="phone"><?php echo $DateSetter->date($rows['CREATE_ON']); ?></td>
                                                                             
                                                            <td class="email text-center"><a class="btn btn-danger btn-sm Full_View" id="<?php echo $rows['ID'] ?>">View</a></td>
                                                        </tr>                               




                                                        </tr>
<?php } ?>

                                                                                








                                                </tbody>
                                            </table>
                                        </div>
                                            </div>

                                            
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="about-tab-pane" role="tabpanel" aria-labelledby="about-tab">

                                        <div class="row">

                                            <div class="about col-12 col-md-12 col-xl-12">

                                                <div class="profile-box info-box general card mb-4">

                                                    <header class="h6 bg-secondary text-auto p-4">
                                                        <div class="title">General Information</div>
                                                    </header>

                                                    <div class="content p-4">

                                                        <div class="info-line mb-6">
                                                            <div class="title font-weight-bold mb-1">Name</div>
                                                            <div class="info"><?php echo $Group_List->getGroupName();?></div>
                                                        </div>

                                                        <div class="info-line mb-6">
                                                            <div class="title font-weight-bold mb-1">Created Date</div>
                                                            <div class="info"><?php echo $DateSetter->date($Group_List->getCreateOn());?></div>
                                                        </div>

                                                        <div class="info-line mb-6">
                                                            <div class="title font-weight-bold mb-1">Group Type</div>
                                                            <div class="info"><?php echo $Group_List->getGroupType();?></div>
                                                        </div>

                                                        <div class="info-line mb-6">
                                                            <div class="title font-weight-bold mb-1">Group Category</div>
                                                            <div class="info"><?php echo $Group_List->getCategory();?></div>
                                                        </div>

                                                        <div class="info-line mb-6">
                                                            <div class="title font-weight-bold mb-1">Total Members</div>

                                                            <div class="info location">
                                                                <span><?php echo $TotalGroupMembers;?></span>
                                                            </div>


                                                        </div>

                                                        <div class="info-line">
                                                            <div class="title font-weight-bold mb-1">Description</div>
                                                            <div class="info"><?php echo $Group_List->getDescription();?></div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="photos-videos-tab-pane" role="tabpanel" aria-labelledby="photos-videos-tab">


                                        <!-- CONTENT -->
                                        <div class="page-content p-4 p-sm-6">
                                            <!-- CONTACT LIST -->
                                              <div class="result-info d-flex flex-column flex-sm-row align-items-center justify-content-center justify-content-sm-between pb-4">

                                            <div>

                                                <span class="title font-weight-bold h5 mr-2">Members List</span>

                                                <span class="result-count text-muted">
                                                    <span><?php echo $TotalGroupMembers;?></span>
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
                                                        <?php if(!$Mobile_Detect->isMobile()){ ?>
                                                        <th>Email</th>                                                            
                                                        <?php } ?>
<?php if($role=='A'){ ?>
                                                        <th class="text-center">Edit</th>
                                                        <?php } ?>
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
<?php if($role=='A'){ ?>
                                                            <td class="email text-center"><button class="btn btn-danger btn-sm Btn_Remove" id="<?php echo $rows['USER_ID']; ?>">Edit</button></td>
                                                        <?php } ?>
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
                                            <!-- / CONTACT LIST -->
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!-- / CONTENT -->
                        </div>

                    </div>
                </div>

            </div>
        </main>
        
        
        
   <div id="bd-example-modal-lg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">

                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myLargeModalLabel">Post Details</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body" id="ModalLiveBody">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
        
        

        <div id="ModalLive1" class="modal fade" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLiveLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLiveLabel">Update Member</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div id="ModalLiveBody1" class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="Btn_Confirm_Remove">Remove Member</button>
                    </div>
                </div>
            </div>
        </div>
        
    </body>


</html>
       
    <script type="text/javascript">
    <?php
      echo "var groupId = '{$id}';";
    ?>
    </script>
<script type="text/javascript">
$(document).ready(View_Full());
$(document).ready(RemoveMember());
$(document).ready(RemoveMemberConfirm());
$(document).ready(UpdateRole());

function View_Full() {
    $(document).on("click", ".Full_View", function (e) {
        member_id = $(this).attr("id");
        $('#ModalLiveBody').load("model_text.php?i="+member_id);
        $('#bd-example-modal-lg').modal("show");
    });
}



function RemoveMember() {
    $(document).on("click", ".Btn_Remove", function (e) {
        member_id = $(this).attr("id");
        $('#ModalLiveBody1').load("model_text_remove.php?i="+member_id);
        $('#ModalLive1').modal("show");
    });
}


function RemoveMemberConfirm() {
    $(document).on("click", "#Btn_Confirm_Remove", function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "../req_grp_members/remove_member.php",
            data: {USER_ID : member_id, GROUP_ID : groupId},
            error: function (html)
            {
                $("#MessageLabel").html("Something happened wrong.");
            },
            success: function (html)
            {
                var success = parseJsonData(html);
                if (success === 0) {
                    member_id = 0;
                    $('#ModalLive1').modal("hide");
                    ShowNotification('Please Try Again!');
                }
                if (success === 1) {
                    member_id = 0;
                    $('#ModalLive1').modal("hide");
                    ShowNotification('Member Removed from Group');
                }
            }
        });
    });
}


function UpdateRole() {
    $(document).on("click", "#UpdateRole", function (e) {
        role = $("#inlineFormCustomSelectPref").val();
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "../req_grp_members/update_role.php",
            data: {USER_ID : member_id, GROUP_ID : groupId, ROLE : role},
            error: function (html)
            {
                $("#MessageLabel").html("Something happened wrong.");
            },
            success: function (html)
            {
                var success = parseJsonData(html);
                if (success === 0) {
                    member_id = 0;
                    $('#ModalLive1').modal("hide");
                    ShowNotification('Please Try Again!');
                }
                if (success === 1) {
                    member_id = 0;
                    $('#ModalLive1').modal("hide");
                    ShowNotification('Role Updated');
                }
            }
        });
    });
}




function parseJsonData(html) {
    var json = JSON.parse(html);
    var success = parseInt(json["SUCCESS"]);
    return success;
}

function ShowNotification(text) {
        new PNotify({
            text    : text,
            confirm : {
                confirm: true,
                buttons: [
                    {
                        text    : 'Dismiss',
                        addClass: 'btn btn-link',
                        click   : function (notice) {
                            notice.remove();
                        }
                    },
                    null
                ]
            },
            buttons : {
                closer : false,
                sticker: false
            },
            animate : {
                animate  : true,
                in_class : 'slideInDown',
                out_class: 'slideOutUp'
            },
            addclass: 'md multiline'
        });
}



</script>>