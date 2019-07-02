 $(document).ready(loadTableIndex());


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
                    var link = "<tr><td class='file-icon'><i class='icon-folder'></i></td><td class='name'><b>" + json.CONTENTS[i].GROUP_NAME + "</b></td>";
                    output += link
                    + "<td class='type d-none d-md-table-cell'>" + json.CONTENTS[i].GROUP_TYPE + "</td>"
                                + "<td class='size d-none d-sm-table-cell'>" + json.CONTENTS[i].CATEGORY + "</td>"
                                + "<td class='last-modified d-none d-lg-table-cell'><a href=Group_Details.php?i=" + json.CONTENTS[i].ID + "' class='btn btn-success btn-sm'>View</a></td>"
                                + "<td class='d-table-cell d-xl-none'>"
                                + "<a class='btn btn-icon' href='Group_Details.php?i=" + json.CONTENTS[i].ID + "'>"
                                + "<i class='icon icon-information-outline'></i>"
                                + "</a>"
                                + "</td>"
                                + "</tr>";
                    
                    
                    
                    
                    
                    
                }
                $('#Group_List').html(output);
            }
        }
    });
}
