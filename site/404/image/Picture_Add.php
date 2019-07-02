<!DOCTYPE html>
<html lang="en" class="app">

<head>
    <meta charset="utf-8" />
    <title>Musik | Web Application</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="../../css/app.v1.css" type="text/css" />
    <script src="../../js/jquery-3.1.1.min.js"></script>
</head>
<?php include '../../classes/UI.php';
include '../../classes/NavBar.php'; 
include '../../classes/Menu.php'; 
$menu = new Menu();
$UI = new UI;
$N = new NavBar;


$idd = filter_input(INPUT_GET, 'i'); 
$pid = ($idd > 1)? 0 : filter_var($idd, FILTER_VALIDATE_INT);
?>
<body class="">
    <section class="vbox">
        <?php echo $UI->Work("ADMIN"); ?>
        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <?php echo $N->Admin(); ?>
                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2">
<h3 class="text-center text-info">Add Image to Photo Slider</h3>
<hr class="half-rule" />
<form action="img_Upload.php" method="POST" name="form2" id="uploadForm" enctype="multipart/form-data" role="form" > 
    <div class="form-group">
        <label for="IMAGE_LINK">Select Image from your computer</label>
        <input type="file" id="file" name="IMAGE_LINK" value="" class="btn btn-info btn-block">
    </div>
    <div class="form-group">
        <label for="CAPTIONS">Caption</label>
        <input type="text" name="IMG_CAPTION" value="" class="form-control" placeholder="CAPTIONS">
        <input type="text" name="CATEGORY_ID" value="<?php echo $pid;?>" class="form-control hidden">
    </div>
    <div class="form-group">
    <input name="SUBMIT" type="submit" class="btn btn-success btn-block" id ="gallery" value="Upload Image">
    </div>
</form>
                                </div>
        <script>
function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#uploadForm + img').remove();
            $('#uploadForm').after('<img class="text-center" src="'+e.target.result+'" width="450" height="300"/>').center();
            //$('#uploadForm + embed').remove();
            //$('#uploadForm').after('<embed src="'+e.target.result+'" width="450" height="300">');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#file").change(function () {
    filePreview(this);
});
</script>



                            </div>                        </section>
                        
                    </section>
                </section>
                
            </section>
            
        </section>
    </section>
    <!-- Javascript -->
   
<script type ="text/javascript">
$(document).ready();
</script>
    <!-- Bootstrap -->
    <!-- App -->
    <script src="../../js/app.v1.js"></script>
    <script src="../../js/app.plugin.js"></script>
</body>

</html>