<?php include '../../classes/Menu.php';
$menu = new Menu();
$id = filter_input(INPUT_POST, 'i');
$menu->loadvalue($id);
?>

<div class="wrapper">
    <div id="errrror"></div>
    
                <form  method="POST" id="fmenu" role="form">
                <div class="form-group">
                <label>Name</label>
                <input type="text" name="Editcatname" id="Editcatname" value="<?php echo $menu->getNAME();?>" placeholder="Category Name" class="input-sm form-control">
                </div>
                
                    <div class="m-t-lg">
                        <input type="text" name="getid" id="getid" value="<?php echo $id;?>" class="input-sm form-control hide">
                        <input type="submit" id="updatecat" value="Update" class="btn btn-primary btn-block "></div> 
                </form> </div>