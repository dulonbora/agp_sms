<?php include '../../classes/Menu.php';
$menu = new Menu();
$id = filter_input(INPUT_POST, 'i');
$menu->loadvalue($id);
?>

<div class="modal-body"><input type="text" value="<?php echo $menu->getNAME();?>" class="btn btn-default btn-block"></div>
<div class="modal-footer">
    <div class="btn-group">
        <button id="<?php echo $id;?>" class="btn btn-success comfirmEdit"> Confirm</button>
        <button  type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
      </div>