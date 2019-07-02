<?php include '../../classes/Settings.php';
$setting = new Settings();
$setting->loadvalue();
?>

<div class="wrapper">
    <div id="errrror"></div>
    
                <form  method="POST" id="fmenu" role="form">
                <div class="form-group">
                <label>Name</label>
                <input type="text" name="Editsitename" id="Editsitename" value="<?php echo $setting->getSITE_NAME();?>" placeholder="Category Name" class="input-sm form-control">
                </div>
                
                    <div class="m-t-lg">
                        <input type="submit" id="updatesitename" value="Update" class="btn btn-primary btn-block "></div> 
                </form> </div>