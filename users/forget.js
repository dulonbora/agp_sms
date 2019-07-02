$(document).ready(Login());


function Login() {
    $(document).on("click", "#SentToEmail", function (e) {
        e.preventDefault();
        var imput = $("forgotPasswordFormInputEmail").val();
        $.ajax({
            type: 'POST',
            url: "../req_users/forget_passowrd.php",
            data: {EMAIL_OR_PHONE : imput},
            error: function (html)
            {
                $("#MessageLabel").html("Something happened wrong.");
            },
            success: function (html)
            {
                var success = parseJsonData(html);
                if (success === 0) {
                    $("#MessageLabel").css("color", "red");
                    $("#MessageLabel").html("Login failed.");
                }
                if (success === 1) {
                    ShowNotification("Login Successfull Please Wait..")
                }
            }
        });
    });
}




function parseJsonData(html) {
    var json = JSON.parse(html);
    var success = json["SUCCESS"];
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
    