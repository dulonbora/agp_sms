<?php
include '../classes/Users.php';
$Users = new Users();
$id  = filter_input(INPUT_GET, 'i');
$Users->loadValue($id);
?>

<p>Name : <?php echo $Users->getName();?><br/>
    Phone No :<?php echo $Users->getMobileNo();?><br/>
    Email : <?php echo $Users->getEmail();?><br/>
</p>

