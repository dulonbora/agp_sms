
<?php include '../../include/AHeader.php';
include '../../classes/UI.php';
include '../../classes/NavBar.php'; 
include '../../classes/Menu.php'; 

$menu = new Menu();
$UI = new UI;
$N = new NavBar;
$id = 0;
if(isset($_GET['i'])){$id = $_GET['i'];}
?>
<body class="">
    <section class="vbox">
        <?php echo $UI->Work("ADMIN"); ?>
        

        <section>
            
            <section class="hbox stretch">
                <!-- .aside -->
                <?php echo $N->Admin(); ?>
                
                <!-- /.aside -->
                <section id="content"> <section class="vbox">
                        <header class="header bg-info lter hidden-print">
                            
                            <a href="javascript:void(0);" class="btn btn-success reorder_link" id="save_reorder">Click To Save</a>
                            <a href="javascript:void(0);" class="btn btn-primary pull-right" id="save_reorder">Back To Menu</a>
             
            </header>
                        <section class="scrollable wrapper">   <div class="row">   
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2"> 
                                    <div id="mmmmm"></div>
                                    <div class="dd " id="nestable3"> 
                                        <ol class="dd-list">
                                        
                                        <?php echo $menu->MainMenuByID($id);?>
                                        </ol> </div> </div> 
                            </div>  </section> 
                    </section> 
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a> </section>
                
            </section>
            
        </section>
    </section>
    <!-- Javascript -->
    
<script type="text/javascript">
$(document).ready(function(){
	$('#save_reorder').on('click',function(){
				var h = [];
                                var id = $("li.dd-item").attr("id");
				//$("ol.dd-list li").each(function() {  h.push($(this).attr('id').substr(9));  });
				$("ol.dd-list li").each(function() {  h.push(this.id);  });
				$.ajax({
					type: "POST",
					url: "order_update.php",
					data: {i: " " + h + ""},
					success: function(html) 
					{
                                            //alert(html);
                                            //alert(id);
                                            $('.reorder_link').html('Menu Saved');
						window.location.reload();
						//$('#mmmmm').html(html);
						//$('#nestable3').fadeToggle(600);
                                                //alert(html);
                                                
					}
                                        
				});	
	});
	
});
</script>

    <!-- Bootstrap -->
    <!-- App -->
    <script src="../../js/nestable/jquery.nestable.js"></script>
    <script src="../../js/nestable/demo.js"></script>
    <script src="../../js/app.plugin.js"></script>
</body>

</html>