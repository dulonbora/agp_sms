<?php include '../../classes/Menu.php';
$menu = new Menu();
?>

<div class="wrapper"> <h4 class="m-t-none">Add New Menu</h4>
    <div class="btn-group-justified"><button id="sidehide" class="btn-primary btn-block"><< Back</button></div>
                <form  method="post" id="fmenu" role="form">
                <div class="form-group"> <label>Name</label>
                    <input type="text" name="menu" id="name" placeholder="Menu name" class="input-sm form-control"> </div>
                
                    <input type="text" name="prentid" id="prentid" value='0' class="input-sm form-control hide">
                    <input type="text" name="is_menu" id="is_menu" value='0' class="input-sm form-control hide">
                    <input type="text" name="is_navbar" id="is_navbar" value='1' class="input-sm form-control hide">
                    
                    <div class="form-group"> <label>Sub Menu</label> 
                    <select name="is_submenu" id="is_submenu" class="form-control">
                    <option class="form-control" value='0'>No</option>
                    <option class="form-control" value='1'>Yes</option>
                                                 </select> </div>
                
                <div class="form-group"> <label>Publush Yet</label> 
                    <select name="IS_PUBLISH" name="is_publish" id="is_publish" class="form-control">
                    <option class="form-control" value='1'>Yes</option>
                                                    <option class="form-control" value='0'>No</option>
                                                 </select> </div>
                
                    <div class="m-t-lg"><input type="submit" id="addmenu" value="Add Menu" class="btn btn-primary btn-block"></div> 
                </form> </div>