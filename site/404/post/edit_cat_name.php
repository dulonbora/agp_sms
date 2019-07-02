<?php include '../../classes/Menu.php';
$menu = new Menu();
$id = filter_input(INPUT_POST, 'i');
?>

<div class="wrapper">
    <div id="errrror"></div>
    
                <form  method="POST" id="fmenu" role="form">
                    <div class="form-group"> <label>Select Category</label> 
        <select name="Editcatname" id="Editcatname" class="form-control">
        <?php $menu->LoadPostParent();?></select> </div>
                
                    <div class="m-t-lg">
                        <input type="text" name="getid" id="getid" value="<?php echo $id;?>" class="input-sm form-control hide">
                        <input type="submit" id="updatecat" value="Update" class="btn btn-primary btn-block "></div> 
                </form> </div>