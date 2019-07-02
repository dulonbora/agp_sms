<html><head>
<style>h4 {color:white;background-color: black;
padding: 3px;text-align:center;}
</style></head>
<?php
if($_POST){
$fp = fopen('include/database.php','w');
$content = '<?php $host = "'.$_POST['host'].'";
$user = "'.$_POST['user'].'";
$pass = "'.$_POST['pass'].'";
$data = "'.$_POST['name'].'";
$conn = mysqli_connect($host, $user, $pass) or trigger_error(mysqli_error(),E_USER_ERROR); 
mysqli_set_charset($conn,"utf8"); ?>';
if(!fwrite($fp,trim($content)))
$error = 1;
fclose($fp);
include "include/table.php";
if($error==1){ echo "Some error camed up. Check /include/database.php is writable or not.";
} else {echo "<h1>Installation Complete</h1>
<meta http-equiv='refresh' content='5; url=index.php'>";
// @unlink(__FILE__);
}
}else{
@chmod("include/database.php",0666);
echo "<form action='?' method='post'>
Database Host<br/><input type='text' name='host' value='localhost'><br/>
Database User<br/><input type='text' name='user'><br/>
Database Password<br/><input type='text' name='pass'><br/>
Database Name<br/>
<input type='text' name='name'><br/>
<h4>Admin Details</h4>Link: yoursite/404<br/>
<input type='submit' value='Install'>
</form>";
}
?>
