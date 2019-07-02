<?php include '../../classes/Menu.php';
$menu = new Menu();
?>

<div class="wrapper"> <h4 class="m-t-none">Add New Staff Category</h4> 
                <form  method="POST" id="fmenu" role="form">
                <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" id="name" value="" placeholder="Staff Category" class="input-sm form-control">
                </div>
                
                <div class="form-group">
                <label>Publush Yet</label> 
                <select name="is_publish" id="is_publish" class="form-control">
                <option class="form-control" value='1'>Yes</option>
                <option class="form-control" value='0'>No</option>
                </select>
                </div>
                
                    <div class="m-t-lg">
                        <input type="text" name="prentid" id="prentid" value="0" class="input-sm form-control hide">
                        <input type="text" name="is_menu" id="is_menu" value="6" class="input-sm form-control hide">
                        <input type="text" name="is_navbar" id="is_navbar" value="0" class="input-sm form-control hide">
                        <input type="text" name="is_submenu" id="is_submenu" value="0" class="input-sm form-control hide">
                        <a id="addcat" class="btn btn-lg btn-primary btn-block">Add Category</a></div> 
                </form> </div>