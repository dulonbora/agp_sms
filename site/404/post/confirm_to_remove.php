<?php 
$id = filter_input(INPUT_POST, 'i');
?>
<div class="modal-footer">
    <div class="btn-group">
        <button id="<?php echo $id;?>" class="btn btn-success comfirm"> Confirm</button>
        <button  type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
      </div>