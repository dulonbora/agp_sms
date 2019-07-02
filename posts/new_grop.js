$(document).ready(Register());


function Register() {
    $(document).on("click", "#Btn_Save", function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "../req_post/add_new.php",
            data: $("#PostForm").serialize(),
            error: function (html)
            {
                $("#MessageLabel").html("Something happened wrong.");
            },
            success: function (html)
            {
                var success = parseJsonData(html);
                if (success === 0) {
                    ShowNotification('Signup failed. Please Try Again!');
                }
                if (success === 2) {
                    ShowNotification('Group Successfully Updated');
                }
                if (success === 1) {
                    $("#SUBJECT").val('');
                    $("#DESCRIPTION").val('');
                    ShowNotification('Post Successfully Sent all group members');
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


