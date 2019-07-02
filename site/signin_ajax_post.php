<?php if (!isset($_SESSION)) {session_start();}
    include 'classes/user.php';
    $user = new user();
    
    
    $u = $_POST['AUTH'];
    $id = $_POST['PASS'];
    $user->setEmail($u);
    $user->setPassword($id);
   if($user->Login() == 1){
       echo 'Loggin In SuccessFully';
       if ($_SESSION['ACCESS']=="admin"){
       $user->pageRedirect("./404/index.php");
       }
       else {$user->pageRedirect("index.php");}
       
   }
 else {
      echo 'You have Entered Wrong Details'; 
    }     
    
    ?>