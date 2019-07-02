<?php include '../../classes/Settings.php';
$setting = new Settings();
$setting->loadvalue();
?>

<div class="wrapper">
    <div id="errrror"></div>
    
                <form  method="POST" id="fmenu" role="form">
                <div class="form-group">
                <label>Facebook</label>
                <input type="text" name="EditFb" id="EditFb" value="<?php echo $setting->getFB();?>" placeholder="Facebook" class="input-sm form-control">
                </div>
                
                <div class="form-group">
                <label>Google Plus</label>
                <input type="text" name="EditGplus" id="EditGplus" value="<?php echo $setting->getGOOGLEPLUS();?>" placeholder="Google Plus" class="input-sm form-control">
                </div>
                
                <div class="form-group">
                <label>Instragram</label>
                <input type="text" name="EditInsta" id="EditInsta" value="<?php echo $setting->getINSTAGRAM();?>" placeholder="Instragram" class="input-sm form-control">
                </div>
                
                <div class="form-group">
                <label>Twitter</label>
                <input type="text" name="EditTwitter" id="EditTwitter" value="<?php echo $setting->getTWITTER();?>" placeholder="Twitter" class="input-sm form-control">
                </div>
                
                <div class="form-group">
                <label>Linked In</label>
                <input type="text" name="EditLink" id="EditLink" value="<?php echo $setting->getLINKEDIN();?>" placeholder="Linked In" class="input-sm form-control">
                </div>
                
                    <div class="m-t-lg">
                        <input type="submit" id="updateSocial" value="Update" class="btn btn-primary btn-block "></div> 
                </form> </div>