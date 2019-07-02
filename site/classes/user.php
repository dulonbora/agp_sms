<?php

class user {
    private $ID;
    private $EMAIL;
    private $PASSWORD;
    private $USERNAME;
    private $FIRST_NAME;
    private $LAST_NAME;
    private $ADDRESS;
    private $IMAGE_ID;
    private $ABOUT;
    private $PHONE;
    private $ACCESS;
    
    
    
    /*--------------------------------------------------------------- */
//This javascript function will redirect a another page
//after the execution of a function.
public function pageRedirect($page){
echo "<script type=\"text/javascript\">	";
echo "document.location = '".$page."' ";
echo "</script>";
}
/*--------------------------------------------------------------- */
/*
This function shows the username on the top of the every page.
If the user is not logged in his name will not appear.
*/
public function showLogin(){
ob_start();	

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['USERNAME']))
{
    echo "<li class='dropdown'><a class='dropdown-toggle' href='#'>
							".$_SESSION['USERNAME'] . "
							<i class='fa fa-caret-down'></i>
						</a>
                <ul class='dropdown-menu' style=''>";
        echo "<li class=''><a class='dropdown-toggle' href='gallery.php?i='>Profile</a></li>";
        echo "<li class=''><a class='dropdown-toggle' href='logout.php'>Logout</a></li>";
        echo "</ul> </li>";
}

else{
echo " <li><a href=\"../users/login.php\">Log in</a> </li>" ;	
}
}

/*--------------------------------------------------------------- */
/*
This function will register a user.
*/
public function Register(){
include('../../include/database.php');
$query = "INSERT INTO USERS_ADMIN (EMAIL , PASSWORD ,	USERNAME , ADDRESS ,  PHONE ,	
	ACCESS, FIRST_NAME, LAST_NAME, ABOUT)	
	VALUES('$this->EMAIL', '$this->PASSWORD', '$this->USERNAME', "
        . "'$this->ADDRESS', '$this->PHONE' , '$this->ACCESS', '$this->FIRST_NAME' , '$this->LAST_NAME', '$this->ABOUT') "; 
mysqli_select_db($conn, $data);
$insert = mysqli_query($conn, $query) or mysqli_error($conn);
if($insert){
        echo 'right';}  else {
        echo 'wrong';
    
}
}

public function CheckEmail($Email){
    $found = FALSE;
    include('../include/database.php');	
$query = "SELECT EMAIL FROM USERS_ADMIN WHERE EMAIL =  '$Email' ";
mysqli_select_db($conn, $data);
$select = mysqli_query($conn, $query) or mysqli_error($conn) ;
$row = mysqli_fetch_assoc($select);
if($row>0){
 $found = TRUE;   
}
return $found;
}

public function AccessChangeToMember($str){
    include('../include/database.php');	
$query = "UPDATE USERS_ADMIN SET ACCESS = 'MEM' WHERE ID = '$str' "; 
	
mysqli_select_db($conn, $data);
$insert = mysqli_query($conn, $query) or mysqli_error($conn) ;
}

/*--------------------------------------------------------------- */
/*
This function will set Session of a user.
*/
public function Login(){
if (!isset($_SESSION)) {
  session_start();
}

include('include/database.php');	
$query = "SELECT * FROM USERS_ADMIN WHERE EMAIL =  '$this->EMAIL' 
 AND PASSWORD  = '$this->PASSWORD' "; 
$ok = 0;
mysqli_select_db($conn, $data);
$select = mysqli_query($conn, $query) or mysqli_error($conn) ;
$row = mysqli_fetch_assoc($select);
if($row>0){
	$_SESSION['USER_ID'] = $row['ID'];
	$_SESSION['EMAIL'] = $row['EMAIL'];
	$_SESSION['USERNAME'] = $row['USERNAME'];
	$_SESSION['ACCESS'] = $row['ACCESS'];
        $ok = 1;
}
return $ok;
}
/*--------------------------------------------------------------- */
/*
This function will unset Session of a user.
*/
public function LogOut(){
if (!isset($_SESSION)) {
  session_start();
}
$_SESSION['USER_ID'] = NULL;
$_SESSION['EMAIL'] = NULL;
$_SESSION['USERNAME'] = NULL;
$_SESSION['ACCESS'] = NULL;
$_SESSION['REDIRECT'] = NULL;



unset($_SESSION['USER_ID']);
unset($_SESSION['EMAIL']);
unset($_SESSION['USERNAME']);	
unset($_SESSION['ACCESS']);	
unset($_SESSION['REDIRECT']);

$this->pageRedirect("index.php");
}
/*--------------------------------------------------------------- */

/*--------------------------------------------------------------- */
/*
If the logged user is not admin, 
He will be not able to edit any page content.
This function will prompt the user to relogin as admin.
*/
public function RestrictUser(){
ob_start();	
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['ACCESS']))
{
if(strcmp($_SESSION['ACCESS'], "ADMIN") == 0){}
else{$this->pageRedirect("../login.php");}
}
else{
    $this->pageRedirect("../login.php");
}
}
/*--------------------------------------------------------------- */
/*
If the logged user is not Member, 
He will be not able to edit any page content.
This function will prompt the user to relogin as member.
*/
public function RestrictNonMember(){
ob_start();	
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['ACCESS']))
{
if(strcmp($_SESSION['ACCESS'], "MEM") == 0){}
else{$this->pageRedirect("../site/login.php");}
}
else{
    $this->pageRedirect("../site/login.php");
}
}


/*--------------------------------------------------------------- */
/*
If the logged user is admin, 
He will be redirected to Administrator Home.
*/
public function ProfileRedirect(){
ob_start();	
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['ACCESS']))
{
if(strcmp($_SESSION['ACCESS'], "ADMIN") == 0){
$this->pageRedirect("../site/Administrator.php");
}
else{$this->pageRedirect("../site/UserProfile.php");}
}
}

/*--------------------------------------------------------------- */
/*
If the logged user is not admin, 
He will be not able to edit any page content.
This function will prompt the user to relogin as admin.
*/
public function RestrictUserIfNotLogin(){
ob_start();	
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['EMAIL'])){
if($_SESSION['EMAIL'] != NULL){}
else{$this->pageRedirect("../site/login.php");}
}
else{$this->pageRedirect("../site/login.php");}
}

/*--------------------------------------------------------------- */

public function LoadValue($id){
      include('../../include/database.php');
      $query = "SELECT * FROM USERS_ADMIN WHERE ID = '$id' "; 
      mysqli_select_db($conn, $data);
      $rs = mysqli_query($conn, $query) or mysqli_error($conn) ;
      $rows = mysqli_fetch_assoc($rs);
      if($rows>0){
          $this->ID = $rows['ID'];
          $this->FIRST_NAME = $rows['FIRST_NAME'];
          $this->LAST_NAME = $rows['LAST_NAME'];
          $this->EMAIL = $rows['EMAIL'];
          $this->USERNAME = $rows['USERNAME'];
          $this->ADDRESS = $rows['ADDRESS'];
          $this->ABOUT = $rows['ABOUT'];
          $this->ACCESS = $rows['ACCESS'];
          $this->IMAGE_ID = $rows['IMAGE_ID'];
          $this->PHONE = $rows['PHONE'];
       }
}

/*--------------------------------------------------------------- */
public function loadValueByEmail($email){
include('../include/database.php');
$query = "SELECT * FROM USERS_ADMIN WHERE EMAIL = '$email' "; 
mysqli_select_db($conn, $data);
$select = mysqli_query($conn, $query) or mysqli_error($conn) ;
$row = mysqli_fetch_assoc($select);

if($row>0){
$this->setId($row['ID']);
$this->setEmail($row['EMAIL']);
$this->setUserName($row['USERNAME']);
$this->setAddress($row['ADDRESS']);
$this->setPhone($row['PHONE']);
$this->setAccess($row['ACCESS']);
}
}

public function showAllUsers(){
include('../include/database.php');
$query = "SELECT * FROM USERS_ADMIN ORDER BY ID DESC"; 
	
mysqli_select_db($conn, $data);
$select = mysqli_query($conn, $query) or mysqli_error($conn) ;
$row = mysqli_fetch_assoc($select);

if($row>0){
echo "<table class='table table-responsive table-stripped table bordered'>";
echo "<tr>";
echo "<td>User Name</td>";
echo "<td>Address</td>";
echo "<td>Phone</td>";
echo "<td>View</td>";
echo "</tr>";

do{
echo "<tr>";
echo "<td>"; echo $row['USERNAME'] . "</td><td>" . $row['ADDRESS'] ; echo "</td>";
echo "<td>"; echo $row['PHONE']; echo "</td>";
echo "<td><a href='../user/User_Detail.php?i=";
echo $row['ID'];
echo "' class='btn btn-default'>View</td>";
echo "</tr>";
}
while($row = mysqli_fetch_assoc($select));
echo "</table>";

}

}



    public function AdminLoad(){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM USERS_ADMIN WHERE ACCESS != 'staff' ORDER BY ID DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
                    echo "<tr id='tr".$rows["ID"]."'>
                        <td><a href='user_view.php?i=".$rows["ID"]."' class='text-danger text' id='tr".$rows["ID"]."'>".$rows['USERNAME']."</a></td>
                        <td>".$rows['FIRST_NAME']." ".$rows['LAST_NAME']."</td>
                        <td>".$rows['EMAIL']."</td>
                        <td>".$rows['ACCESS']."</td>";
                    
                        
            }
        while($rows=mysqli_fetch_assoc($rs));   

        }
    }
    
    
    public function AdminStaff(){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM USERS_ADMIN WHERE ACCESS = 'staff' ORDER BY ID DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
                    echo "<tr id='tr".$rows["ID"]."'>
                        <td><a href='staff_view.php?i=".$rows["ID"]."' class='text-danger text btnview' id='tr".$rows["ID"]."'>".$rows['USERNAME']."</a></td>
                        <td>".$rows['FIRST_NAME']." ".$rows['LAST_NAME']."</td>
                        <td>".$rows['EMAIL']."</td>
                        <td>".$rows['ACCESS']."</td>
                        <td>".$rows['ID']."</td>";
                    
                        
            }
        while($rows=mysqli_fetch_assoc($rs));   

        }
    }
    
        public function LoadStaffCategoryInAdmin($id){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM STAFF_VIEW WHERE CATEGORY_ID = $id ORDER BY SERIAL_NO DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
                    echo "<tr id='tr".$rows["ID"]."'> <td><a href='../staff/staff_view.php?i=".$rows["ID"].""
                            . "'>".$rows['FIRST_NAME']." ".$rows['LAST_NAME']." </a></td>
                        <td>".$rows['DESIGNATION']."</td>
                        <td>".$rows['QUALIFICATION']."</td>
                        <td class='text-center'><a  href='staff_edit.php?i=".$rows["ID"]."' class='fa fa-file text-primary text btnedit'></a></td>
                        <td class='text-center'><buttom class='fa fa-times-circle-o text-danger text btndel' id='tr".$rows["ID"]."'></buttom></td>
                        <td class='text-center'>".$rows['SERIAL_NO']."</td>";
                    
                        
            }
        while($rows=mysqli_fetch_assoc($rs));   

        }
    }
    
    
    public function LoadRelatedStaffInAdmin($CATid, $ID){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM staff_view WHERE CATEGORY_ID = $CATid AND ID <> $ID ORDER BY SERIAL_NO DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
                    echo "<article class='media'> <div class='pull-left'> 
                           <span class='fa-stack fa-lg'> <i class='fa fa-circle fa-stack-2x icon-muted'></i> 
                               <i class='fa fa-mobile fa-stack-1x text-white'></i> </span> </div> 
                       <div class='media-body'> <a href='staff_view.php?i=".$rows['ID']."' class='h4 text-success'>".$rows['FIRST_NAME']." ".$rows['LAST_NAME']." </a> 
                           <small class='block m-t-xs'></small> 
                           <em class='text-xs'>Posted on <span class='text-danger'>".$rows['DESIGNATION']."</span></em> 
                       </div> </article>";
                        
            }
        while($rows=mysqli_fetch_assoc($rs));   

        }
    }
    
    
        public function LoadRelatedUserInAdmin($ID){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM USERS_ADMIN WHERE ID <> $ID AND ACCESS <> 'staff' ORDER BY ID DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
                    echo "<article class='media'> <div class='pull-left'> 
                           <span class='fa-stack fa-lg'> <i class='fa fa-circle fa-stack-2x icon-muted'></i> 
                               <i class='fa fa-mobile fa-stack-1x text-white'></i> </span> </div> 
                       <div class='media-body'> <a href='staff_view.php?i=".$rows['ID']."' class='h4 text-success'>".$rows['FIRST_NAME']." ".$rows['LAST_NAME']." </a> 
                           <small class='block m-t-xs'></small> 
                           <em class='text-xs'>Posted on <span class='text-danger'>".$rows['ACCESS']."</span></em> 
                       </div> </article>";
                        
            }
        while($rows=mysqli_fetch_assoc($rs));   

        }
    }


    
    
        public function LoadStaffForSerial($id){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM staff_view WHERE CATEGORY_ID = $id ORDER BY SERIAL_NO DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    $count = 0;
    if($rows > 0)
        {
            do{
                echo "<li id='".$rows['ID']."' class='dd-item ui-sortable-handle'> <div class='dd-handle'>".$rows['FIRST_NAME']." ".$rows['LAST_NAME']." </div></li>";
            }
        while($rows=mysqli_fetch_assoc($rs));   
        }
    }


    
        public function getLastId() {
        include('../../include/database.php');
        $SL = 0;
        mysqli_select_db($conn, $data);
        $query = "SELECT ID FROM USERS_ADMIN WHERE ID = (SELECT MAX(ID) FROM users)";
        $resultset = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $rows = mysqli_fetch_assoc($resultset);
        if ($rows > 0) {
            $SL = $rows['ID'];
        }
        return $SL;
    }
    
        public function UpdateUser($id) {
        include('../../include/database.php');
        $email = mysqli_real_escape_string($conn, $this->EMAIL);
        $add = mysqli_real_escape_string($conn, $this->ADDRESS);
        $about = mysqli_real_escape_string($conn, $this->ABOUT);
        $phone = mysqli_real_escape_string($conn, $this->PHONE);
        $fname = mysqli_real_escape_string($conn, $this->FIRST_NAME);
        $lname = mysqli_real_escape_string($conn, $this->LAST_NAME);
        mysqli_select_db($conn, $data);
        $save = "UPDATE userS SET EMAIL='$email', ADDRESS='$add',"
                . " ABOUT='$about', PHONE='$phone',"
                . " FIRST_NAME='$fname', LAST_NAME='$lname' WHERE ID = '$id'";
        $success = mysqli_query($conn, $save) or die(mysqli_error($conn));
    }
    
    public function UpdateImage($id) {
        include('../../include/database.php');
        $im = mysqli_real_escape_string($conn, $this->IMAGE_ID);
        mysqli_select_db($conn, $data);
        $save = "UPDATE USERS_ADMIN SET IMAGE_ID='$im' WHERE ID = '$id'";
        $success = mysqli_query($conn, $save) or die(mysqli_error($conn));
    }

    


    
    
    public function getId(){return $this->ID;}
    public function getEmail(){return $this->EMAIL;}
    public function getPassword(){return $this->PASSWORD;}
    public function getUserName(){return $this->USERNAME;}
    public function getAddress(){return $this->ADDRESS;}
    public function getAbout(){return $this->ABOUT;}
    public function getPhone(){return $this->PHONE;}
    public function getAccess(){return $this->ACCESS;}
    public function getFIRSTNAME(){return $this->FIRST_NAME;}
    public function getLASTNAME(){return $this->LAST_NAME;}
    public function getIMAGE_ID(){return $this->IMAGE_ID;}
    
    
    public function setId($a){$this->ID=$a;}
    public function setEmail($a){$this->EMAIL=$a;}
    public function setPassword($a){$this->PASSWORD=$a;}
    public function setUserName($a){$this->USERNAME=$a;}
    public function setAddress($a){$this->ADDRESS=$a;}
    public function setAbout($a){$this->ABOUT=$a;}
    public function setPhone($a){$this->PHONE=$a;}
    public function setAccess($a){$this->ACCESS=$a;}
    public function setFIRST_NAME($a){$this->FIRST_NAME=$a;}
    public function setLAST_NAME($a){$this->LAST_NAME=$a;}
    public function setIMAGE_ID($a){$this->IMAGE_ID=$a;}



    }
