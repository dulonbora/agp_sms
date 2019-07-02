<?php
include '../classes/Posts.php';
$Posts = new Posts();
$id  = filter_input(INPUT_GET, 'i');
$Posts->loadValue($id);
?>

<h4><?php echo $Posts->getSubject();?></h4>

<p><?php echo $Posts->getDescription();?></p>

