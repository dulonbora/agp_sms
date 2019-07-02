$(document).ready(Register());


function Register() {
    $(document).on("click", "#Btn_Save", function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "../req_users/reg.php",
            data: $("#MemberForm").serialize(),
            error: function (html)
            {
                $("#MessageLabel").html("Something happened wrong.");
            },
            success: function (html)
            {
                var success = parseJsonData(html);
                if (success === 0) {
                    ShowNotification('Membership failed. Please Try Again!');
                }
                if (success === 2) {
                    ShowNotification('Email Already Exist.. Please Try Another!');
                }
                if (success === 3) {
                    ShowNotification('Phone No Already Exist.. Please Try Another!');
                }
                if (success === 1) {
                    Clear_Field();
                    ShowNotification('Member Added Success fully to Address book');
                }
            }
        });
    });
}



function Clear_Field() {
    $("#ADDRESS").val('');
    $("#DISTRICT").val('');
    $("#EMAIL").val('');
    $("#MOBILE_NO").val('');
    $("#NAME").val('');
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


