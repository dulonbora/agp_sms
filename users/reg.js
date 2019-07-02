$(document).ready(Register());


function Register() {
    $(document).on("click", "#Btn_Reg", function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "../req_users/reg.php",
            data: $("#registerForm").serialize(),
            error: function (html)
            {
                $("#MessageLabel").html("Something happened wrong.");
            },
            success: function (html)
            {
                var success = parseJsonData(html);
                if (success === 0) {
                    ShowNotification('Signup failed. Please Try Again!');
                    $("#MessageLabel").css("color", "red");
                    $("#MessageLabel").html("Signup failed. Please Try Again!");
                }
                if (success === 2) {
                    ShowNotification('Email Already Exist.. Please Try Another!');
                    $("#MessageLabel").css("color", "red");
                    $("#MessageLabel").html("Email Already Exist.");
                }
                if (success === 3) {
                    ShowNotification('Phone Already Exist.. Please Try Another!');
                    $("#MessageLabel").css("color", "red");
                    $("#MessageLabel").html("Phone Number Already Exist.");
                }
                if (success === 4) {
                    ShowNotification('Password Mismached.');
                    $("#MessageLabel").css("color", "red");
                    $("#MessageLabel").html("Password Mismached.");
                }
                if (success === 1) {
                    $("#MessageLabel").html("Signup success.");
                 //   window.location = "../user/Redirect.php";
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


