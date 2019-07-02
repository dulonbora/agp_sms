 $(document).ready(loadTableIndex());
 $(document).ready(Search());
 $(document).ready(More());
 
 
 
 function Search() {
    $(document).on("keyup", "#contacts_search", function (e) {
        var s = $(this).val();
        SearchList(s);
    });
}


function More() {
    $(document).on("click", "#Btn_More", function () {
        page_no = page_no+1;
        $(this).html("Please Wait Loading..");
        loadTableIndex();
    });
}



function loadTableIndex() {
    var url = "../req_addbook/group_list_alpha.php?i="+page_no+"&l="+ltr;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                

                
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    
                var ok = "<div class='contact-item ripple row no-gutters align-items-center py-2 px-3 py-sm-4 px-sm-6'>";
                output += ok
                        +"<img class='avatar mx-4' alt='Abbott' src='../assets/images/logo.png' />"
                        +"<div class='col text-truncate font-weight-bold'><a href='New_Member.php?i="+json.CONTENTS[i].ID+"'>" + json.CONTENTS[i].NAME + "</a></div>"
                        +"<div class='col phone text-truncate px-1 d-none d-xl-flex'>" + json.CONTENTS[i].EMAIL + "</div>"
                        +"<div class='col job-title text-truncate px-1 d-none d-sm-flex'>" + json.CONTENTS[i].MOBILE_NO + "</div>"
                        +"<div class='col-auto actions'><div class='row no-gutters'>"
                        +"<a href='New_Member.php?i="+json.CONTENTS[i].ID+"' class='btn btn-icon'>"
                        +"<i class='icon icon-dots-vertical'></i></a></div></div>"
                        +"</div>";
                           }
                $('#Member_List').append(output);
                $("#Btn_More").html("Load More");
            }
            else{
                $("#Btn_More").html("Please Wait Loading..");
                $("#Fotter_Part").html("No More Record Available");
            }
        }
    });
}


function SearchList(s) {
    var url = "../req_addbook/member_list_search.php?s="+s;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    
                var ok = "<div id='Member_List'><div class='contact-item ripple row no-gutters align-items-center py-2 px-3 py-sm-4 px-sm-6'>";
                output += ok
                        +"<img class='avatar mx-4' alt='Abbott' src='../assets/images/logo.png' />"
                        +"<div class='col text-truncate font-weight-bold'><a href='New_Member.php?i="+json.CONTENTS[i].ID+"'>" + json.CONTENTS[i].NAME + "</a></div>"
                        +"<div class='col phone text-truncate px-1 d-none d-xl-flex'>" + json.CONTENTS[i].EMAIL + "</div>"
                        +"<div class='col job-title text-truncate px-1 d-none d-sm-flex'>" + json.CONTENTS[i].MOBILE_NO + "</div>"
                        +"<div class='col-auto actions'><div class='row no-gutters'>"
                        +"<a href='New_Member.php?i="+json.CONTENTS[i].ID+"' class='btn btn-icon'>"
                        +"<i class='icon icon-dots-vertical'></i></a></div></div>"
                        +"</div></div>";
                }
                $('#Member_List').html(output);
            }
            else{
                $("#Fotter_Part").html("No More Record Available");
            }
        }
    });
}
