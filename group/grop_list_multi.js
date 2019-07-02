 $(document).ready(loadTableIndex());
 $(document).ready(AddPost());


function AddPost() {
        $("#Post_Add").click(function(){
            var favorite = [];
            $.each($("input[name='groupCheck']:checked"), function(){            
                favorite.push($(this).val());
            });
            $('#ModalLiveBody').load("model_text_multi.php?i="+favorite.join("|"));
            $('#ModalLive').modal("show");
        });
}

function loadTableIndex() {
    var url = "../req_group/group_list.php?i=1";
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            
            var json = JSON.parse(data);
            if (parseInt(json.SUCCESS) === 1) {
                var output = "";
                for (var i = 0; i < json.CONTENTS.length; i++) {
                    var link = "<tr><td><label class='custom-control custom-checkbox'>"
                                + "<input type='checkbox' class='custom-control-input' value='" + json.CONTENTS[i].ID + "' name='groupCheck'>"
                                + "<span class='custom-control-indicator fuse-ripple-ready'></span>"
                                + "</label></td><td class='name'><b>" + json.CONTENTS[i].GROUP_NAME + "</b></td>";
                    output += link
                    + "<td class='type d-none d-md-table-cell'>" + json.CONTENTS[i].GROUP_TYPE + "</td>"
                                + "<td class='size d-none d-sm-table-cell'>" + json.CONTENTS[i].CATEGORY + "</td>"
                                + "</tr>";
                    
                    
                    
                    
                    
                    
                }
                $('#Group_List').html(output);
            }
        }
    });
}
