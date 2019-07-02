$(document).ready(Login());


function Login() {
    $(document).on("click", "#login_btn", function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "../req_users/login.php",
            data: $("#form_login").serialize(),
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
                    $("#MessageLabel").html("Login success.");
                    window.location = "../group/My_Gorups_List.php";
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
    