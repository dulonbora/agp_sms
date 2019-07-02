<?php include '../../classes/Settings.php';
$setting = new Settings();
$setting->loadvalue();
?>

<div class="wrapper">
    <div id="errrror"></div>
    
                <form  method="POST" id="fmenu" role="form">
                <div class="form-group">
                <label>Name</label>
                <input type="text" name="EditAdd" id="EditAdd" value="<?php echo $setting->getADDRESS();?>" placeholder="Address" class="input-sm form-control">
                </div>
                
                    <div class="m-t-lg">
                        <input type="submit" id="UpdateAdd" value="Update" class="btn btn-primary btn-block "></div> 
                </form> </div>