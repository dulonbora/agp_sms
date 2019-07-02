$(document).ready(AddMember());
$(document).ready(RemoveMember());
$(document).ready(AddMemberConfirm());
$(document).ready(RemoveMemberConfirm());


function AddMember() {
    $(document).on("click", ".AddMember", function (e) {
        member_id = $(this).attr("id");
        $('#ModalLiveBody').load("model_text.php?i="+member_id);
        $('#ModalLive').modal("show");
    });
}

function RemoveMember() {
    $(document).on("click", ".Btn_Remove", function (e) {
        member_id = $(this).attr("id");
        $('#ModalLiveBody1').load("model_text.php?i="+member_id);
        $('#ModalLive1').modal("show");
    });
}

function AddMemberConfirm() {
    $(document).on("click", "#Btn_Save", function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "../req_grp_members/add_new.php",
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
                    $('#ModalLive').modal("hide");
                    ShowNotification('Please Try Again!');
                }
                if (success === 2) {
                    member_id = 0;
                    $('#ModalLive').modal("hide");
                    ShowNotification('Member Already Exits!');
                }
                if (success === 1) {
                    member_id = 0;
                    $('#ModalLive').modal("hide");
                    ShowNotification('Member Success Fully Added');
                }
            }
        });
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


