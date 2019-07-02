<?php $host = "localhost";
$user = "root";
$pass = "";
$data = "gconnect";
$conn = mysqli_connect($host, $user, $pass) or trigger_error(mysqli_error(),E_USER_ERROR); 
mysqli_set_charset($conn,"utf8"); ?>