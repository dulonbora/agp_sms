<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Menu
 *
 * @author Dulon
 */
class Menu {
    
    private $ID;
    private $NAME;
    private $CONTENT;
    private $IMAGE_ID;
    private $IS_PAGE; // type==> 0=Menu || 1=page & || 2= Post Category || 3 = Post || 4 = Events Category || 5 = Events || 6= Staff Category 
    //|| 7 = Image Category || 8 = News Category || 9 = News 
    private $IN_NAVBAR; // 0=No & 1=YES
    private $POST_BY;
    private $UPDATE_BY;
    private $POST_ON;
    private $UPDATE_ON;
    private $PUBLISH; // 0=No & 1=YES
    private $SERIAL_NO;
    private $REMOVE;
    private $SUBMENU; // 0=No & 1=YES
    private $PERANT_ID; // 0 = root
    
    
    public function AddMenu() {
        include('../../include/database.php');
        $name = mysqli_real_escape_string($conn, $this->NAME);
        $con = "";
        $ip = mysqli_real_escape_string($conn, $this->IS_PAGE);
        $in = mysqli_real_escape_string($conn, $this->IN_NAVBAR);
        $pb = mysqli_real_escape_string($conn, $this->POST_BY);
        $ub = mysqli_real_escape_string($conn, $this->UPDATE_BY);
        $uo = time();
        $p = mysqli_real_escape_string($conn, $this->PUBLISH);
        $sln = mysqli_real_escape_string($conn, $this->SERIAL_NO);
        $smn = mysqli_real_escape_string($conn, $this->SUBMENU);
        $prnid = mysqli_real_escape_string($conn, $this->PERANT_ID);
        $im = 1;
        mysqli_select_db($conn, $data);
        $save = "INSERT INTO MENU(NAME, CONTENT, IMAGE_ID, IS_PAGE, IN_NAVBAR, POST_BY, UPDATE_BY, UPDATE_ON, POST_ON, PUBLISH, SERIAL_NO, SUBMENU, PERANT_ID) 
                VALUES('$name', '$con', '$im', '$ip', '$in', '$pb', '$ub', '$uo', '$uo', '$p', '$sln', '$smn', '$prnid')";
        $success = mysqli_query($conn, $save) or die(mysqli_error($conn));
    }
    
    public function AddPost() {
        include('../../include/database.php');
        $name = mysqli_real_escape_string($conn, $this->NAME);
        $con = mysqli_real_escape_string($conn, $this->CONTENT);
        $ip = mysqli_real_escape_string($conn, $this->IS_PAGE);
        $in = mysqli_real_escape_string($conn, $this->IN_NAVBAR);
        $pb = mysqli_real_escape_string($conn, $this->POST_BY);
        $ub = mysqli_real_escape_string($conn, $this->UPDATE_BY);
        $uo = time();
        $p = mysqli_real_escape_string($conn, $this->PUBLISH);
        $sln = mysqli_real_escape_string($conn, $this->SERIAL_NO);
        $smn = mysqli_real_escape_string($conn, $this->SUBMENU);
        $prnid = mysqli_real_escape_string($conn, $this->PERANT_ID);
        $im = 1;


        mysqli_select_db($conn, $data);
        $save = "INSERT INTO MENU(NAME, CONTENT, IMAGE_ID, IS_PAGE, IN_NAVBAR, POST_BY, UPDATE_BY, UPDATE_ON, POST_ON, PUBLISH, SERIAL_NO, SUBMENU, PERANT_ID) 
                VALUES('$name', '$con', '$im', '$ip', '$in', '$pb', '$ub', '$uo', '$uo', '$p', '$sln', '$smn', '$prnid')";
        $success = mysqli_query($conn, $save) or die(mysqli_error($conn));
     //   $page = "Menu_Index.php";
       // $this->pageRedirect($page);
    }
    
    public function Update($id) {
        include('../../include/database.php');
        $name = mysqli_real_escape_string($conn, $this->NAME);
        $con = mysqli_real_escape_string($conn, $this->CONTENT);
        $ip = mysqli_real_escape_string($conn, $this->IS_PAGE);
        $in = mysqli_real_escape_string($conn, $this->IN_NAVBAR);
        $ub = mysqli_real_escape_string($conn, $this->UPDATE_BY);
        $uo = time();
        $p = mysqli_real_escape_string($conn, $this->PUBLISH);
        $sln = mysqli_real_escape_string($conn, $this->SERIAL_NO);
        $smn = mysqli_real_escape_string($conn, $this->SUBMENU);
        $prnid = mysqli_real_escape_string($conn, $this->PERANT_ID);
        $im = mysqli_real_escape_string($conn, $this->IMAGE_ID);


        mysqli_select_db($conn, $data);
        $save = "UPDATE MENU SET NAME='$name', CONTENT='$con', IMAGE_ID='$im', IS_PAGE='$ip', IN_NAVBAR='$in',"
                . " UPDATE_BY='$ub', UPDATE_ON='$uo', PUBLISH='$p', SERIAL_NO='$sln', SUBMENU='$smn', PERANT_ID='$prnid' WHERE ID = '$id'";
        $success = mysqli_query($conn, $save) or die(mysqli_error($conn));
     //   $page = "Menu_Index.php";
       // $this->pageRedirect($page);
    }
    
    public function UpdateImage($id) {
        include('../../include/database.php');
        $im = mysqli_real_escape_string($conn, $this->IMAGE_ID);
        mysqli_select_db($conn, $data);
        $save = "UPDATE MENU SET IMAGE_ID='$im' WHERE ID = '$id'";
        $success = mysqli_query($conn, $save) or die(mysqli_error($conn));
    }
    
    public function LoadInNavBar(){
    include('../classes/Image_Category.php');
    include('../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM MAIN_MENU";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    $i= new ImageCategory();
    $count = 0;
    if($rows > 0)
        {
            do{
                $count = ($count > 6) ? $count-1 : $count%2;
                if($rows['SUBMENU']==1  && $rows['IS_PAGE']!=0){
                echo "<li><a href='post.php?i=".$rows['ID']."'>".$rows['NAME']."hghg</a></li>";}
                else if($rows['SUBMENU']==1 && $rows['IS_PAGE']==0){
                echo "<li class='dropdown has-submenu'>
                <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>
                ".$rows['NAME']." 
                <span class='fa fa-angle-down'></span></a>
                <ul class='dropdown-menu'>";
                                      //  echo $page->LoadInNavBar($rows['ID']);
                echo "</ul></li>";}else {
                echo "<li><a href='page.php?i=".$rows['ID']."'>".$rows['NAME']."</a></li>";}
                if($count){
                echo "<li class='dropdown has-submenu'>
                <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>
                Gallery
                <span class='fa fa-angle-down'></span></a>
                <ul class='dropdown-menu'>";
                echo $i->LoadCategoryInNav(2); 
                echo "</ul></li>";    
                }
               $count++;}
        while($rows=mysqli_fetch_assoc($rs));    
        }
    }
    
    public function LoadPostIndexM($tittle, $pid, $limit){
    include('include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM MENU WHERE PUBLISH = 1 AND IS_PAGE = 3 AND PERANT_ID = $pid AND REMOVE = 0 ORDER BY `SERIAL_NO` DESC LIMIT $limit";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    $count = 0;
    echo "<section class='pad-top-none typo-dark hidden-lg hidden-md'>
<div class='container'>
<div class='title-container'>
<div class='title-wrap'>
<h3 class='title'>$tittle</h3>
<span class='separator line-separator'></span>
</div>
</div>
<div class='row'>
";
    if($rows > 0)
        {
            do{
                
                $cat = ($rows['PERANT_ID']==0) ? 'Uncategorized' : $this->ReturnCategorySIte($rows['PERANT_ID']) ;
                $img = ($rows['PERANT_ID']==0) ? 'Uncategorized' : $this->ReturnImageLinkSIte($rows['IMAGE_ID']) ;
                $date = $this->date(date('d-m-Y', $rows['POST_ON']));    
                $s = $this->substrwords($rows['CONTENT'], 150, "");
                
                echo "<div class='col-xs-12 col-sm-12 col-md-4 col-lg-4'><div style='margin-top:10px;' class='course-wrapper'>
						<div class='course-banner-wrap'>
							<img src='images/$img' class='img-responsive img-center' alt='Course'>
							<span class='cat bg-yellow'>$cat</span>
						</div>
						<div class='course-detail-wrap'>
							<div class='teacher-wrap'>
							</div>
							<div class='course-content'>
								<h5><a href='post_view.php?i=".$rows['ID']."'>".$rows['NAME']."</a></h5>
								<p>$s</p>
							</div>
						</div>
					</div></div>";
            }
        while($rows=mysqli_fetch_assoc($rs));   
                                   
        }
         echo "</div>
<h3 style='margin-top:10px;' class='title'><a class='btn btn-success' href='post.php?i=$pid'>See More Posts..</a></h3>
             
</div>
	</section>";  
    }
    
    public function LoadPostIndex($tittle, $pid, $limit){
    include('include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM MENU WHERE PUBLISH = 1 AND IS_PAGE = 3 AND PERANT_ID = $pid AND REMOVE = 0 ORDER BY `SERIAL_NO` DESC LIMIT $limit";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    $count = 0;
    echo "<section class='pad-top-none typo-dark hidden-sm hidden-xs'>
<div class='container'>
<div class='title-container'>
<div class='title-wrap'>
<h3 class='title'>$tittle</h3>
<span class='separator line-separator'></span>
</div>
</div>
<div class='row'>
";
    if($rows > 0)
        {
            do{
                
                $cat = ($rows['PERANT_ID']==0) ? 'Uncategorized' : $this->ReturnCategorySIte($rows['PERANT_ID']) ;
                $img = strlen($this->ReturnImageLinkSIte($rows['IMAGE_ID'])) > 2 ? $this->ReturnImageLinkSIte($rows['IMAGE_ID']) : "agp_logo.jpg" ;
                $date = $this->date(date('d-m-Y', $rows['POST_ON']));    
                $s = $this->substrwords($rows['CONTENT'], 150, "");
                
                echo "<div class='col-xs-6 col-sm-6 col-md-4 col-lg-4'><div style='margin-top:10px;' class='course-wrapper'>
						<div class='course-banner-wrap'>
							<img src='images/$img' class='img-responsive img-center' alt='Course'>
							<span class='cat bg-yellow'>$cat</span>
						</div>
						<div class='course-detail-wrap'>
							<div class='teacher-wrap'>
							</div>
							<div class='course-content'>
								<h5><a href='post_view.php?i=".$rows['ID']."'>".$rows['NAME']."</a></h5>
								<p>$s</p>
							</div>
						</div>
					</div></div>";
            }
        while($rows=mysqli_fetch_assoc($rs));   
                                   
        }
         echo "</div>
<h3 style='margin-top:10px;' class='title text-center'><a class='btn btn-success pull-right' href='post.php?i=$pid'>See More Posts..</a></h3>

</div>
	</section>";  
    }
    
    public function LoadPostIndexM2($tittle, $pid, $limit){
    include('include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM MENU WHERE PUBLISH = 1 AND IS_PAGE = 3 AND PERANT_ID = $pid AND REMOVE = 0 ORDER BY `SERIAL_NO` DESC LIMIT $limit";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    $count = 0;
    echo "<section class='pad-top-none typo-dark hidden-lg hidden-md'>
<div class='container'>
<div class='title-container'>
<div class='title-wrap'>
<h3 class='title'>$tittle</h3>
<span class='separator line-separator'></span>
</div>
</div>
<div class='row'>
";
    if($rows > 0)
        {
            do{
                
                $cat = ($rows['PERANT_ID']==0) ? 'Uncategorized' : $this->ReturnCategorySIte($rows['PERANT_ID']) ;
                $img = ($rows['PERANT_ID']==0) ? 'Uncategorized' : $this->ReturnImageLinkSIte($rows['IMAGE_ID']) ;
                $date = $this->date(date('d-m-Y', $rows['POST_ON']));    
                $s = $this->substrwords($rows['CONTENT'], 150, "");
                echo "<div class='col-xs-12 col-sm-12 col-md-4 col-lg-4'>
					<div style='margin-top:10px;' class='blog-wrap'>
						<div class='blog-img-wrap'>
							<img src='images/$img' class='img-responsive img-center' alt='Course'>
						</div>
                                            	<div class='blog-details'>
							<h5><a href='post_view.php?i=".$rows['ID']."'>".$rows['NAME']."</a></h5>
							<ul class='blog-meta'>
								<li><i class='fa fa-calendar-o'></i>$date</li>
							</ul>
                                                        <p>$s</p>
							<a class='btn' href='post_view.php?i=".$rows['ID']."'>Read More</a>
						</div>
					</div>
				</div>";
                
            }
        while($rows=mysqli_fetch_assoc($rs));   
                                   
        }
         echo "</div>
<h3 style='margin-top:10px;' class='title text-center'><a class='btn btn-success pull-right' href='post.php?i=$pid'>See More Posts..</a></h3>
             
</div>
	</section>";  
    }
    
    public function LoadPostIndex2($tittle, $pid, $limit){
    include('include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM MENU WHERE PUBLISH = 1 AND IS_PAGE = 3 AND PERANT_ID = $pid AND REMOVE = 0 ORDER BY `SERIAL_NO` DESC LIMIT $limit";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    $count = 0;
    echo "<section class='pad-top-none typo-dark  hidden-sm hidden-xs'>
<div class='container'>
<div class='title-container'>
<div class='title-wrap'>
<h3 class='title'>$tittle</h3>
<span class='separator line-separator'></span>
</div>
</div>
<div class='row'>
";
    if($rows > 0)
        {
            do{
                
                $cat = ($rows['PERANT_ID']==0) ? 'Uncategorized' : $this->ReturnCategorySIte($rows['PERANT_ID']) ;
                $img = ($rows['PERANT_ID']==0) ? 'Uncategorized' : $this->ReturnImageLinkSIte($rows['IMAGE_ID']) ;
                $date = $this->date(date('d-m-Y', $rows['POST_ON']));    
                $s = $this->substrwords($rows['CONTENT'], 150, "");
                echo "<div class='col-xs-6 col-sm-6 col-md-4 col-lg-4'>
					<div style='margin-top:10px;' class='blog-wrap'>
						<div class='blog-img-wrap'>
							<img src='images/$img' class='img-responsive img-center' alt='Course'>
						</div>
                                            	<div class='blog-details'>
							<h5><a href='post_view.php?i=".$rows['ID']."'>".$rows['NAME']."</a></h5>
							<ul class='blog-meta'>
								<li><i class='fa fa-calendar-o'></i>$date</li>
							</ul>
                                                        <p>$s</p>
							<a class='btn' href='post_view.php?i=".$rows['ID']."'>Read More</a>
						</div>
					</div>
				</div>";
                
            }
        while($rows=mysqli_fetch_assoc($rs));   
                                   
        }
         echo "</div>
<h3 style='margin-top:10px;' class='title'><a class='btn btn-success' href='post.php?i=$pid'>See More Posts..</a></h3>
             
</div>
	</section>";  
    }
    
    public function LoadPostIndex3($tittle, $pid, $limit){
    include('include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM MENU WHERE PUBLISH = 1 AND IS_PAGE = 3 AND PERANT_ID = $pid AND REMOVE = 0 ORDER BY `SERIAL_NO` DESC LIMIT $limit";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    $count = 0;
    echo "<section class='pad-top-none typo-dark hidden-sm hidden-xs'>
<div class='container'>
<div class='title-container'>
<div class='title-wrap'>
<h3 class='title'>$tittle</h3>
<span class='separator line-separator'></span>
</div>
</div>
<div class='row'>
";
    if($rows > 0)
        {
            do{
                
                $cat = ($rows['PERANT_ID']==0) ? 'Uncategorized' : $this->ReturnCategorySIte($rows['PERANT_ID']) ;
                $img = ($rows['PERANT_ID']==0) ? 'Uncategorized' : $this->ReturnImageLinkSIte($rows['IMAGE_ID']) ;
                $date = $this->date(date('d-m-Y', $rows['POST_ON']));    
                $s = $this->substrwords($rows['CONTENT'], 150, "");
                echo "<div class='col-sm-4'>
					<div style='margin-top:10px;' class='event-wrap'>
						<div class='event-img-wrap'>
                                                    <img src='images/$img' class='img-responsive img-center' alt='Course'>
						</div>
						<div class='event-details'>
							<h4><a href='post_view.php?i=".$rows['ID']."'>".$rows['NAME']."</a></h4>
							<ul class='events-meta'>
								<li><i class='fa fa-calendar-o'></i> $date</li>
								<li><i class='fa fa-map-marker'></i> $cat</li>
							</ul>
							<p>$s</p>
							<a href='post_view.php?i=".$rows['ID']."' class='btn'>Read More</a>
						</div>
					</div>
				</div>";
            }
        while($rows=mysqli_fetch_assoc($rs));   
                                   
        }
         echo "</div>
<h3 style='margin-top:10px;' class='title'><a class='btn btn-success' href='post.php?i=$pid'>See More Posts..</a></h3>
             
</div>
	</section>";  
    }
    
    
    public function LoadPostIndex3M($tittle, $pid, $limit){
    include('include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM MENU WHERE PUBLISH = 1 AND IS_PAGE = 3 AND PERANT_ID = $pid AND REMOVE = 0 ORDER BY `SERIAL_NO` DESC LIMIT $limit";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    $count = 0;
    echo "<section class='pad-top-none typo-dark hidden-lg hidden-md'>
<div class='container'>
<div class='title-container'>
<div class='title-wrap'>
<h3 class='title'>$tittle</h3>
<span class='separator line-separator'></span>
</div>
</div>
<div class='row'>
";
    if($rows > 0)
        {
            do{
                
                $cat = ($rows['PERANT_ID']==0) ? 'Uncategorized' : $this->ReturnCategorySIte($rows['PERANT_ID']) ;
                $img = ($rows['PERANT_ID']==0) ? 'Uncategorized' : $this->ReturnImageLinkSIte($rows['IMAGE_ID']) ;
                $date = $this->date(date('d-m-Y', $rows['POST_ON']));    
                $s = $this->substrwords($rows['CONTENT'], 150, "");
                echo "<div class='col-xs-12 col-sm-12 col-md-4 col-lg-4'>
					<div style='margin-top:10px;' class='event-wrap'>
						<div class='event-img-wrap'>
                                                    <img src='images/$img' class='img-responsive img-center' alt='Course'>
						</div>
						<div class='event-details'>
							<h4><a href='post_view.php?i=".$rows['ID']."'>".$rows['NAME']."</a></h4>
							<ul class='events-meta'>
								<li><i class='fa fa-calendar-o'></i> $date</li>
								<li><i class='fa fa-map-marker'></i> $cat</li>
							</ul>
							<p>$s</p>
							<a href='post_view.php?i=".$rows['ID']."' class='btn'>Read More</a>
						</div>
					</div>
				</div>";
            }
        while($rows=mysqli_fetch_assoc($rs));   
                                   
        }
         echo "</div>
<h3 style='margin-top:10px;' class='title'><a class='btn btn-success' href='post.php?i=$pid'>See More Posts..</a></h3>
             
</div>
	</section>";  
    }
    
    public function LoadPostIndexALL($pid){
    include('include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM MENU WHERE PUBLISH = 1 AND PERANT_ID = $pid ORDER BY `ID` DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    $count = 0;
    echo "<section class='pad-top-none typo-dark'>
<div class='container'>
<div class='title-container'>
</div><div class='row'>
";
    if($rows > 0)
        {
            do{
                
                $cat = ($rows['PERANT_ID']==0) ? 'Uncategorized' : $this->ReturnCategorySIte($rows['PERANT_ID']) ;
                $img = ($rows['PERANT_ID']==0) ? 'Uncategorized' : $this->ReturnImageLinkSIte($rows['IMAGE_ID']) ;
                $date = $this->date(date('d-m-Y', $rows['POST_ON']));    
                $s = $this->substrwords($rows['CONTENT'], 150, "");
                
                echo "<div class='col-xs-12 n col-sm-12 col-md-4 col-lg-4'><div style='margin-top:10px;' class='course-wrapper'>
						<div class='course-banner-wrap animated fadeInRight visible'>
							<img src='images/$img' class='img-responsive img-center' alt='Course'>
							<span class='cat bg-yellow animated fadeInLeft visible'>$cat</span>
						</div>
						<div class='course-detail-wrap'>
							<div class='teacher-wrap'>
							</div>
							<div class='course-content'>
								<h5 class='animated fadeInRight visible'><a href='post_view.php?i=".$rows['ID']."'>".$rows['NAME']."</a></h5>
								<p class='animated fadeInRight visible'>$s</p>
							</div>
						</div>
					</div></div>";
            }
        while($rows=mysqli_fetch_assoc($rs));   
                                   
        }
         echo "</div></div>
	</section>";  
    }
    
    public function substrwords($text, $maxchar, $end='') {
    if (strlen($text) > $maxchar || $text == '') {
        $words = preg_split('/\s/', $text);      
        $output = '';
        $i      = 0;
        while (1) {
            $length = strlen($output)+strlen($words[$i]);
            if ($length > $maxchar) {
                break;
            } 
            else {
                $output .= " " . $words[$i];
                ++$i;
            }
        }
        $output .= $end;
    } 
    else {
        $output = $text;
    }
    return $output;
}
    
    public function MainMenuIndex(){
    include('include/database.php');
   // include('classes/Settings.php');
    $setting = new Settings();
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME, IS_PAGE, SUBMENU FROM MAIN_MENU ORDER BY `SERIAL_NO` DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    $count = 0;
    if($rows > 0)
        {
            do{
                //$count1 = ($count > 6) ? $count-1 : $count%2;
               if($rows['SUBMENU']==0  && $rows['IS_PAGE']==1){
                echo "<li class=''><a href='page.php?i=".$rows['ID']."' class='dropdown-toggle'>".$rows['NAME']."</a></li>";                
                }
                else if($rows['SUBMENU']==1 && $rows['IS_PAGE']==0){
                echo "<li class='dropdown'><a class='dropdown-toggle' href='#'>
							".$rows['NAME']."
							<i class='fa fa-caret-down'></i>
						</a>
                <ul class='dropdown-menu' style=''>";
                echo $this->AdminParentLoadInNavBarIndex($rows['ID']);
                echo "</ul> </li>";}else {
                echo "<li class=''><a class='dropdown-toggle' href='post.php?i=".$rows['ID']."'>".$rows['NAME']."</a></li>";                
                }
                if($count%6==0){
                    if($setting->getGALLERY()==0){
                    echo $this->ImageAlbumsMenuIndex();    
                    }
                    
                }
                $count++;
            }
        while($rows=mysqli_fetch_assoc($rs));   
                                        
        }
    }
    
    public function AdminParentLoadInNavBarIndex($pid){
    include('include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME, IS_PAGE, SUBMENU, PERANT_ID FROM MENU WHERE IN_NAVBAR = 1 AND PUBLISH = 1 AND PERANT_ID = $pid  ORDER BY `SERIAL_NO` DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
                if($rows['IS_PAGE']==1){
                echo "<li class=''><a class='dropdown-toggle' href='#'>".$rows['NAME']."</a></li>";                
                }
 else {                echo "<li class=''><a href='post.php?i=".$rows['ID']."'class='dropdown-toggle'>".$rows['NAME']."</a></li>";                
}
                
               
            }
        while($rows=mysqli_fetch_assoc($rs));    
           
        }
    }
    
    public function ImageAlbumsMenuIndex(){
    include('include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME, PERANT_ID, PUBLISH, POST_ON, IN_NAVBAR FROM MENU WHERE IS_PAGE = 7 AND REMOVE = 0 ORDER BY ID DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
        echo "<li class='dropdown'><a class='dropdown-toggle' href='#'>
							Gallery
							<i class='fa fa-caret-down'></i>
						</a>
                <ul class='dropdown-menu' style=''>";
        do{                echo "<li class=''><a class='dropdown-toggle' href='gallery.php?i=".$rows['ID']."'>".$rows['NAME']."</a></li>";}
        while($rows=mysqli_fetch_assoc($rs));   
        echo "</ul> </li>";
        }
    }

    public function MainMenu(){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME, IS_PAGE, SUBMENU FROM MAIN_MENU ORDER BY `SERIAL_NO` ASC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    $count = 0;
    if($rows > 0)
        {
            do{
                //$count1 = ($count > 6) ? $count-1 : $count%2;
               if($rows['SUBMENU']==1  && $rows['IS_PAGE']!=0){
                echo "<li class='dd-item' data-id='".$rows['ID']."'> <div class='dd-handle'>".$rows['NAME']."
                <span class='pull-right'> 
                <b><i id='".$rows['ID']."' class='fa fa-pencil fa-fw m-r-xs editmenu'></i></b> "
                        . "<b><i id='".$rows['ID']."' class='fa fa-ban fa-fw m-r-xs btndel'></i></b>                         
                </div></li>";                
                }
                else if($rows['SUBMENU']==1 && $rows['IS_PAGE']==0){
                echo "<li class='dd-item' data-id='".$rows['ID']."'><div class='dd-handle'>".$rows['NAME']."
                <span class='pull-right'> 
                <b><i id='".$rows['ID']."' class='fa fa-pencil fa-fw m-r-xs editmenu'></i></b> "
                        . "<b><i id='".$rows['ID']."' class='fa fa-ban fa-fw m-r-xs btndel'></i></b>                         
                </div></li>
                <ol class='dd-list' style=''>";
                echo $this->AdminParentLoadInNavBar($rows['ID']);
                echo "</ol> </li>";}else {
                echo "<li class='dd-item' data-id='".$rows['ID']."'> <div class='dd-handle'>".$rows['NAME']."
                <span class='pull-right'> 
                <b><i id='".$rows['ID']."' class='fa fa-pencil fa-fw m-r-xs editmenu'></i></b> "
                        . "<b><i id='".$rows['ID']."' class='fa fa-ban fa-fw m-r-xs btndel'></i></b>                         
                </div></li>";                
                }
                if($count%6==0){
                    echo $this->ImageAlbumsMenu();
                  //  echo $this->StaffMenu();
                }
                $count++;
            }
        while($rows=mysqli_fetch_assoc($rs));   
                                        
        }
    }
    
    public function MainMenuByID($id){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT `ID`, `NAME`, `IS_PAGE`, `SUBMENU` FROM MENU WHERE `IN_NAVBAR` = 1 AND `PERANT_ID` = $id AND IS_PAGE < 2  ORDER BY `SERIAL_NO` ASC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    $count = 0;
    if($rows > 0)
        {
            do{
                echo "<li id='".$rows['ID']."' class='dd-item ui-sortable-handle' > <a href='serial.php?i=".$rows['ID']."' Target='_blank' class='dd-handle'>".$rows['NAME']."</a></li>";
            }
        while($rows=mysqli_fetch_assoc($rs));   
        }
    }
    
    public function date($dt){
        $date = "";
        $category = "";
        $ddt = explode('-', $dt);
        switch ($ddt[1]){
        case 1: $category = "Jan"; break;
        case 2: $category = "Feb"; break;
        case 3: $category = "Mar"; break;
        case 4: $category = "Apr"; break;
        case 5: $category = "May"; break;
        case 6: $category = "Jun"; break;
        case 7: $category = "Jul"; break;
        case 8: $category = "Aug"; break;
        case 9: $category = "Sep"; break;
        case 10: $category = "Oct"; break;
        case 11: $category = "Nov"; break;
    default : $category = "Dec";
}
$date = $category." ".$ddt[1]." ".$ddt[2];
        return $date;
    }
    
    private function ReturnCategorySIte($id){
    $cat = "";    
    include('include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT NAME FROM MENU WHERE ID = $id";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0){
        $cat = $rows['NAME'];
    }
    return $cat;
}

    private function ReturnImageLinkSIte($id){
    $cat = "";    
    include('include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT IMAGE_LINK FROM IMAGES WHERE ID = $id";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0){
        $cat = $rows['IMAGE_LINK'];
    }
    return $cat;
}

    private function ReturnImageLinkSIteAdmin($id){
    $cat = "";    
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT IMAGE_LINK FROM IMAGES WHERE ID = $id";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0){
        $cat = $rows['IMAGE_LINK'];
    }
    return $cat;
}

    private function ReturnCategory($id){
    $cat = "";    
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT NAME FROM MENU WHERE ID = $id";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0){
        $cat = $rows['NAME'];
    }
    return $cat;
}

    public function LoadPostsInAdmin(){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME, PERANT_ID, PUBLISH, POST_ON, IN_NAVBAR FROM MENU WHERE PERANT_ID != 0 AND SUBMENU = 0 AND IS_PAGE = 3 AND REMOVE = 0 ORDER BY ID DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
                $cat = ($rows['PERANT_ID']==0) ? 'Uncategorized' : $this->ReturnCategory($rows['PERANT_ID']) ;
                $nav = ($rows['IN_NAVBAR']==1)?"<buttom class='fa fa-check text-success text navbtn' id='".$rows["ID"]."'></buttom>":"<buttom class='fa fa-times text-danger text navbtn' id='".$rows["ID"]."'></buttom>";
                $pub = ($rows['PUBLISH']==1) ? "<buttom class='fa fa-check text-success text btnpub' id='".$rows["ID"]."'></buttom>" : "<buttom class='fa fa-times  text-danger text btnpub' id='".$rows["ID"]."'></buttom>";
                $date = $this->date(date('d-m-Y', $rows['POST_ON']));


                    echo "<tr id='tr".$rows["ID"]."'> <td><a href='Post_View.php?i=".$rows['ID']."'>".$rows['NAME']."</a></td>
                        <td>$cat <buttom class='fa fa-file text-danger text catupdate' id='".$rows["ID"]."'></buttom></td>
                        <td class='text-center'>$nav</td>
                        <td class='text-center'>$date</td>
                        <td class='text-center'><a href='Post_Edit.php?i=".$rows["ID"]."' class='fa fa-file text-primary text'></a></td>
                        <td class='text-center'><buttom class='fa fa-times-circle-o text-danger text btndel' id='tr".$rows["ID"]."'></buttom></td>
                        <td class='text-center'>$pub</td>";  
                        
            }
        while($rows=mysqli_fetch_assoc($rs));   

        }
    }
    
    
    public function LoadRelatedPostsInSite($id){
    include('include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME, PERANT_ID, PUBLISH, IMAGE_ID, POST_ON, IN_NAVBAR FROM MENU WHERE PERANT_ID != 0 AND SUBMENU = 0 AND IS_PAGE = 3 AND REMOVE = 0 AND ID <> '$id' ORDER BY ID DESC LIMIT 10";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
 $date = $this->date(date('d-m-Y', $rows['POST_ON']));
 $img_id = ($rows['IMAGE_ID']==0) ? 1 : $rows['IMAGE_ID'];
 $img = $this->ReturnImageLinkSIte($img_id);
                
                
                echo "<li><div class='thumb-wrap'>
                    <img width='60' height='60' alt='$img' class='img-responsive' src='images/$img'>
			</div>
			<div class='thumb-content'><a href='post_view.php?i=".$rows['ID']."'>".$rows['NAME']."</a><span>$date</span></div>	
			</li>";
                        
            }
        while($rows=mysqli_fetch_assoc($rs));   

        }
    }
    
    public function LoadRelatedPostsInAdmin($id){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME, PERANT_ID, PUBLISH, IMAGE_ID, POST_ON, IN_NAVBAR FROM MENU WHERE PERANT_ID != 0 AND SUBMENU = 0 AND IS_PAGE = 3 AND REMOVE = 0 AND ID <> '$id' ORDER BY ID DESC LIMIT 10";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
 $date = $this->date(date('d-m-Y', $rows['POST_ON']));
 $img_id = ($rows['IMAGE_ID']==0) ? 1 : $rows['IMAGE_ID'];
 $img = $this->ReturnImageLinkSIteAdmin($img_id);
                echo "<li><div class='thumb-wrap'>
                    <img width='60' height='60' alt='$img' class='img-responsive' src='../../images/$img'>
			</div>
			<div class='thumb-content'><a href='post_view.php?i=".$rows['ID']."'>".$rows['NAME']."</a><span>$date</span></div>	
			</li>";
                        
            }
        while($rows=mysqli_fetch_assoc($rs));   

        }
    }
    
    
    public function LoadRelatedpagesInAdmin($id){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME, PERANT_ID, PUBLISH, POST_ON, IN_NAVBAR FROM MENU WHERE PERANT_ID = 0 AND SUBMENU = 0 AND IS_PAGE = 1 AND REMOVE = 0 AND ID <> '$id' ORDER BY ID DESC LIMIT 10";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
                $date = $this->date(date('d-m-Y', $rows['POST_ON']));
                $cat = ($rows['PERANT_ID']==0) ? 'Uncategorized' : $this->ReturnCategory($rows['PERANT_ID']) ;


                    echo "<article class='media'> <div class='pull-left'> 
                           <span class='fa-stack fa-lg'> <i class='fa fa-circle fa-stack-2x icon-muted'></i> 
                               <i class='fa fa-mobile fa-stack-1x text-white'></i> </span> </div> 
                       <div class='media-body'> <a href='Page_View.php?i=".$rows['ID']."' class='h4 text-success'>".$rows['NAME']."</a> 
                           <small class='block m-t-xs'></small> 
                           <em class='text-xs'>Posted on <span class='text-danger'>$date</span></em> 
                       </div> </article>";
                        
            }
        while($rows=mysqli_fetch_assoc($rs));   

        }
    }
    
    public function LoadRelatedpagesInSite($id){
    include('include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME, PERANT_ID, PUBLISH, POST_ON, IMAGE_ID, IN_NAVBAR FROM MENU WHERE PERANT_ID = 0 AND SUBMENU = 0 AND IS_PAGE = 1 AND REMOVE = 0 AND ID <> '$id' ORDER BY ID DESC LIMIT 10";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
                $date = $this->date(date('d-m-Y', $rows['POST_ON']));
                $img_id = ($rows['IMAGE_ID']==0) ? 1 : $rows['IMAGE_ID'];
                $img = $this->ReturnImageLinkSIte($img_id);


                   
                echo "<li><div class='thumb-content'><a href='page.php?i=".$rows['ID']."'>".$rows['NAME']."</a><span>$date</span></div>	
			</li>";
                        
            }
        while($rows=mysqli_fetch_assoc($rs));   

        }
    }
    
    public function LoadPostCategoryInAdmin(){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME, PERANT_ID, PUBLISH, POST_ON, IN_NAVBAR FROM MENU WHERE PERANT_ID != 0 AND SUBMENU = 0 AND IS_PAGE = 0 OR IS_PAGE = 2 AND REMOVE = 0 ORDER BY ID DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
                $nav = ($rows['IN_NAVBAR']==1)?"<buttom class='fa fa-check text-success text navbtn' id='".$rows["ID"]."'></buttom>":"<buttom class='fa fa-times text-danger text navbtn' id='".$rows["ID"]."'></buttom>";
                $pub = ($rows['PUBLISH']==1) ? "<buttom class='fa fa-check text-success text btnpub' id='".$rows["ID"]."'></buttom>" : "<buttom class='fa fa-times  text-danger text btnpub' id='".$rows["ID"]."'></buttom>";
                $date = $this->date(date('d-m-Y', $rows['POST_ON']));


                    echo "<tr id='tr".$rows["ID"]."'> <td>".$rows['NAME']."</td>
                        <td class='text-center'>$nav</td>
                        <td class='text-center'>$date</td>
                        <td class='text-center'><buttom class='fa fa-file text-primary text btnedit' id='".$rows["ID"]."'></buttom></td>
                        <td class='text-center'><buttom class='fa fa-times-circle-o text-danger text btndel' id='tr".$rows["ID"]."'></buttom></td>
                        <td class='text-center'>$pub</td>";
                    
                        
            }
        while($rows=mysqli_fetch_assoc($rs));   

        }
    }
    
    public function LoadPostCategoryInSite($id){
    include('include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME, PERANT_ID, IMAGE_ID, PUBLISH, POST_ON, IN_NAVBAR FROM MENU WHERE PERANT_ID != 0 AND SUBMENU = 0 AND IS_PAGE = 0 OR IS_PAGE = 2 AND REMOVE = 0 AND ID <> $id ORDER BY ID DESC LIMIT 10";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
               
                
                                echo "<li><a href='post.php?i=".$rows['ID']."'>".$rows['NAME']."</a></li>";


                        
            }
        while($rows=mysqli_fetch_assoc($rs));   

        }
    }
    
    public function LoadStaffCategoryInAdmin(){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME, PERANT_ID, PUBLISH, POST_ON, IN_NAVBAR FROM MENU WHERE SUBMENU = 0 AND IS_PAGE = 6 AND REMOVE = 0 ORDER BY ID DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
               $nav = ($rows['IN_NAVBAR']==1)?"<buttom class='fa fa-check text-success text navbtn' id='".$rows["ID"]."'></buttom>":"<buttom class='fa fa-times text-danger text navbtn' id='".$rows["ID"]."'></buttom>";
                $pub = ($rows['PUBLISH']==1) ? "<buttom class='fa fa-check text-success text btnpub' id='".$rows["ID"]."'></buttom>" : "<buttom class='fa fa-times  text-danger text btnpub' id='".$rows["ID"]."'></buttom>";
                $date = $this->date(date('d-m-Y', $rows['POST_ON']));


                    echo "<tr id='tr".$rows["ID"]."'> <td><a href='../staff/staff_by_category.php?i=".$rows["ID"].""
                            . "'>".$rows['NAME']."</a></td>
                        <td class='text-center'>$nav</td>
                        <td class='text-center'>$date</td>
                        <td class='text-center'><buttom class='fa fa-file text-primary text btnedit' id='".$rows["ID"]."'></buttom></td>
                        <td class='text-center'><buttom class='fa fa-times-circle-o text-danger text btndel' id='tr".$rows["ID"]."'></buttom></td>
                        <td class='text-center'>$pub</td>";
                    
                        
            }
        while($rows=mysqli_fetch_assoc($rs));   

        }
    }
    
    public function ImageAlbums(){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME, PERANT_ID, PUBLISH, POST_ON, IN_NAVBAR FROM MENU WHERE IS_PAGE = 7 AND REMOVE = 0 ORDER BY ID DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
                $nav = ($rows['IN_NAVBAR']==1)?"<buttom class='fa fa-check text-success text navbtn' id='".$rows["ID"]."'></buttom>":"<buttom class='fa fa-times text-danger text navbtn' id='".$rows["ID"]."'></buttom>";
                $pub = ($rows['PUBLISH']==1) ? "<buttom class='fa fa-check text-success text btnpub' id='".$rows["ID"]."'></buttom>" : "<buttom class='fa fa-times  text-danger text btnpub' id='".$rows["ID"]."'></buttom>";
                $date = $this->date(date('d-m-Y', $rows['POST_ON']));


                    echo "<tr id='tr".$rows["ID"]."'> <td><a href='image_by_albumwise.php?i=".$rows['ID']."'>".$rows['NAME']."</a></td>
                        <td class='text-center'>$nav</td>
                        <td class='text-center'>$date</td>
                        <td class='text-center'><buttom class='fa fa-file text-primary text btnedit' id='".$rows["ID"]."'></buttom></td>
                        <td class='text-center'><buttom class='fa fa-times-circle-o text-danger text btndel' id='tr".$rows["ID"]."'></buttom></td>
                        <td class='text-center'>$pub</td>";
                    
                        
            }
        while($rows=mysqli_fetch_assoc($rs));   

        }
    }
    
    public function ImageAlbumsMenu(){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME, PERANT_ID, PUBLISH, POST_ON, IN_NAVBAR FROM MENU WHERE IS_PAGE = 7 AND PUBLISH = 1 AND IN_NAVBAR = 1 ORDER BY ID DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
        echo "<li class='dd-item' data-id='g'><div class='dd-handle'>Gallery</div>
                        <ol class='dd-list' style=''>";
        do{echo "<li class='dd-item' data-id='".$rows['ID']."'> <div class='dd-handle'>".$rows['NAME']."</div> </li>";}
        while($rows=mysqli_fetch_assoc($rs));   
        echo "</ol> </li>";
        }
    }
    public function StaffMenu(){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME, PERANT_ID, PUBLISH, POST_ON, IN_NAVBAR FROM MENU WHERE SUBMENU = 0 AND IS_PAGE = 6 AND REMOVE = 0 AND PUBLISH = 1 AND IN_NAVBAR = 1 ORDER BY ID DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
        echo "<li class='dd-item' data-id='g'><div class='dd-handle'>Staff</div>
                        <ol class='dd-list' style=''>";
        do{echo "<li class='dd-item' data-id='".$rows['ID']."'> <div class='dd-handle'>".$rows['NAME']."</div> </li>";}
        while($rows=mysqli_fetch_assoc($rs));   
        echo "</ol> </li>";
        }
    }
    
    public function AdminLoadPost(){
    include('../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME, PERANT_ID, PUBLISH, POST_ON, IN_NAVBAR FROM MENU WHERE SUBMENU = 1 OR IS_PAGE = 3 ORDER BY ID DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
                $nav = (!$rows['IN_NAVBAR']==1)?"<i class='fa fa-check text-success text'></i>":"<i class='fa fa-times text-danger text'></i>";
                $pub = (!$rows['PUBLISH']==1)?"<i class='fa fa-check text-success text'></i>":"<i class='fa fa-times text-danger text'></i>";
                $date = $this->date(date('d-m-Y', $rows['POST_ON']));


                    echo "<tr id='tr".$rows["ID"]."'> <td>".$rows['NAME']."</td>
                        <td>".$rows['PERANT_ID']."</td>
                        <td>".$nav."</td>
                        <td>".$date."</td>
                        <td><a href='Post_Edit.php?i=".$rows["ID"]."' class='btnviewsss'><i class='fa fa-arrows-alt text-success text'></i> Edit</a></td>
                        <td><buttom class='fa fa-times-circle-o text-danger text btnview' id='tr".$rows["ID"]."'></buttom></td>
                        <td>".$pub."</td>";
                    
                        
            }
        while($rows=mysqli_fetch_assoc($rs));   

        }
    }
    
    public function AdminLoadPage(){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME, PERANT_ID, PUBLISH, POST_ON, IN_NAVBAR FROM MENU WHERE IS_PAGE = 1 ORDER BY ID DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
                $nav = ($rows['IN_NAVBAR']==1)?"<buttom class='fa fa-check text-success text navbtn' id='".$rows["ID"]."'></buttom>":"<buttom class='fa fa-times text-danger text navbtn' id='".$rows["ID"]."'></buttom>";
                $pub = ($rows['PUBLISH']==1) ? "<buttom class='fa fa-check text-success text btnpub' id='".$rows["ID"]."'></buttom>" : "<buttom class='fa fa-times  text-danger text btnpub' id='".$rows["ID"]."'></buttom>";
                $date = $this->date(date('d-m-Y', $rows['POST_ON']));


                    echo "<tr id='tr".$rows["ID"]."'> <td><i class='fa fa-signal text-success text'> <a href='Page_View.php?i=".$rows["ID"]."''>".$rows['NAME']."</a></td>
                        <td class='text-center'>$nav</td>
                        <td class='text-center'>$date</td>
                        <td class='text-center'><a class='fa fa-arrows text-success text' href='Page_Edit.php?i=".$rows["ID"]."' id='".$rows["ID"]."'></a></td>
                        <td class='text-center'><buttom class='fa fa-times-circle-o text-danger text btndel' id='tr".$rows["ID"]."'></buttom></td>
                        <td class='text-center'>$pub</td>";
                    
                    
                        
            }
        while($rows=mysqli_fetch_assoc($rs));   

        }
    }
    
    public function AdminGalleryLoadInNavBar(){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME, IS_PAGE, SUBMENU, PERANT_ID FROM MENU WHERE IN_NAVBAR = 1 AND PUBLISH = 1 AND IS_PAGE = 7 ORDER BY ID DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
                if($rows['IS_PAGE']==1){
                    echo "<li class='dd-item' data-id='".$rows['ID']."'> <div class='dd-handle'>".$rows['NAME']."</div> </li>";
                }
            }
        while($rows=mysqli_fetch_assoc($rs));    
           
        }
    }
    
    public function AdminParentLoadInNavBar($pid){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME, IS_PAGE, SUBMENU, PERANT_ID FROM MENU WHERE IN_NAVBAR = 1 AND PUBLISH = 1 AND PERANT_ID = $pid  ORDER BY `SERIAL_NO` ASC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
                if($rows['IS_PAGE']==1){
                    echo "<li class='dd-item' data-id='".$rows['ID']."'> "
                            . "<div class='dd-handle'>".$rows['NAME']."
                <span class='pull-right'> 
                <b><i id='".$rows['ID']."' class='fa fa-pencil fa-fw m-r-xs pull-right editmenu'></i></b> "
                        . "<b><i id='".$rows['ID']."' class='fa fa-ban pull-right fa-fw m-r-xs btndel'></i></b>                         
                </div>"
                            . " </li>";
                  //  echo "<li><a href='page.php?i=".$rows['ID']."'>".$rows['NAME']."</a></li>";
                }
                else{
                    if($rows['SUBMENU']==1)
                        {echo "<li class='dd-item' data-id='".$rows['ID']."'> <div class='dd-handle'>".$rows['NAME']."
                <span class='pull-right'> 
                <b><i id='".$rows['ID']."' class='fa fa-pencil fa-fw m-r-xs pull-right editmenu'></i></b> "
                        . "<b><i id='".$rows['ID']."' class='fa fa-ban pull-right fa-fw m-r-xs btndel'></i></b>                         
                </div> </li>";}
                    else{echo "<li class='dd-item' data-id='".$rows['ID']."'><div class='dd-handle'>".$rows['NAME']."
                <span class='pull-right'> 
                <b><i id='".$rows['ID']."' class='fa fa-pencil fa-fw m-r-xs pull-right editmenu'></i></b> "
                        . "<b><i id='".$rows['ID']."' class='fa fa-ban pull-right fa-fw m-r-xs btndel'></i></b>                         
                </div>
                        <ol class='dd-list' style=''>";
                                        
                                      //  echo $this->AdminParentLoadInNavBar($rows['ID']);
                                        
                                    echo "</ol> </li>";}
                    
                }
               
            }
        while($rows=mysqli_fetch_assoc($rs));    
           
        }
    }
    
    public function LoadInNavBarAdmin($type){
    include('../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME FROM MENU WHERE IN_NAVBAR = 1 AND IS_PAGE = '$type' ORDER BY ID DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
               echo "<li><a href='Pages_View.php?i=".$rows['ID']."'>".$rows['NAME']."</a></li>";
            }
        while($rows=mysqli_fetch_assoc($rs));        
        }
    }
    
    
    public function LoadPostCategory(){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME, PERANT_ID, PUBLISH, POST_ON, IN_NAVBAR FROM MENU WHERE PERANT_ID != 0 AND SUBMENU = 0 AND IS_PAGE = 0 OR IS_PAGE = 2 AND REMOVE = 0 ORDER BY ID DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
               echo "<li class='list-group-item'>".$rows['NAME']."</li>";
            }
        while($rows=mysqli_fetch_assoc($rs));        
        }
    }
    
    public function LoadPostParent(){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME, PERANT_ID, PUBLISH, POST_ON, IN_NAVBAR FROM MENU WHERE IS_PAGE = 0 OR IS_PAGE = 2 AND REMOVE = 0 AND SUBMENU = 1 ORDER BY ID DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
               echo "<option value='".$rows['ID']."'>".$rows['NAME']."</option>";
            }
        while($rows=mysqli_fetch_assoc($rs));        
        }
    }
    public function LoadStaffParent(){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME, PERANT_ID, PUBLISH, POST_ON, IN_NAVBAR FROM MENU WHERE SUBMENU = 0 AND IS_PAGE = 6 AND REMOVE = 0 ORDER BY ID DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
               echo "<option value='".$rows['ID']."'>".$rows['NAME']."</option>";
            }
        while($rows=mysqli_fetch_assoc($rs));        
        }
    }
    
    public function LoadParent(){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME FROM MENU WHERE SUBMENU = 1 OR IS_PAGE = 2 ORDER BY ID DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
               echo "<option value='".$rows['ID']."'>".$rows['NAME']."</option>";
            }
        while($rows=mysqli_fetch_assoc($rs));        
        }
    }
    
    public function CountSubMenu(){
    $sub = 0;
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT COUNT(ID) AS TOTALSUBMNEU FROM MENU WHERE IN_NAVBAR = 1 AND SUBMENU = 1 AND PERANT_ID =0 ORDER BY ID DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
    $sub = $rows['TOTALSUBMNEU'];
        }
        return $sub;
    }
    
    public function LoadMenuParent(){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT ID, NAME FROM MENU WHERE IN_NAVBAR = 1 AND SUBMENU = 1 AND PERANT_ID = 0 ORDER BY ID DESC";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    if($rows > 0)
        {
            do{
               echo "<option value='".$rows['ID']."'>".$rows['NAME']."</option>";
            }
        while($rows=mysqli_fetch_assoc($rs));        
        }
    }
    
    public function ViewMenuInAdmin() {
        include('../include/database.php');
        mysqli_select_db($conn, $data);
        $view = "SELECT ID, NAME FROM MENU WHERE IS_PAGE = 0 ORDER BY ID ASC";
        $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
        $rows = mysqli_fetch_assoc($v);
        $sl = 1;
        if ($rows > 0) {
            do {
                echo "<table class='table table-responsive'>";
                echo "<tr>";
                echo "<td width='20'>";
                echo $sl;
                echo "</td>";
                
                echo "<td>";
                echo $rows['NAME'];
                echo "</td>";

                echo "<td width='100'>";
                echo "<a href='Teacher_View.php?i=".$rows['ID']."' class='btn btn-default'>";
                echo "Detail</a>";
                echo "</td>";
                
                echo "<td width='100'>";
                echo "<a href='Teacher_View.php?i=".$rows['ID']."' class='btn btn-default'>";
                echo "Edit | Delete</a>";
                echo "</td>";

                echo "</tr>";
                echo "</table>";
                $sl++;
            } while ($rows = mysqli_fetch_assoc($v));
        }
    }
    
    public function loadvalue($id){
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $query = "SELECT * FROM MENU WHERE ID = '$id'";
    $resultset = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($resultset);
    if($rows > 0)
    {
    $this->ID=$rows['ID'];
    $this->NAME=$rows['NAME'];
    $this->CONTENT=$rows['CONTENT'];
    $this->IMAGE_ID=$rows['IMAGE_ID'];
    $this->IS_PAGE=$rows['IS_PAGE'];
    $this->IN_NAVBAR=$rows['IN_NAVBAR'];
    $this->PUBLISH=$rows['PUBLISH'];
    $this->POST_BY=$rows['POST_BY'];
    $this->UPDATE_BY=$rows['UPDATE_BY'];
    $this->POST_ON=$rows['POST_ON'];
    $this->UPDATE_ON=$rows['UPDATE_ON'];
    $this->SERIAL_NO=$rows['SERIAL_NO'];
    $this->SUBMENU=$rows['SUBMENU'];
    $this->PERANT_ID=$rows['PERANT_ID'];
    $this->REMOVE=$rows['REMOVE'];
    }
}
    public function loadvalueSite($id){
    include('include/database.php');
    mysqli_select_db($conn, $data);
    $query = "SELECT * FROM MENU WHERE ID = '$id'";
    $resultset = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($resultset);
    if($rows > 0)
    {
    $this->ID=$rows['ID'];
    $this->NAME=$rows['NAME'];
    $this->CONTENT=$rows['CONTENT'];
    $this->IMAGE_ID=$rows['IMAGE_ID'];
    $this->IS_PAGE=$rows['IS_PAGE'];
    $this->IN_NAVBAR=$rows['IN_NAVBAR'];
    $this->PUBLISH=$rows['PUBLISH'];
    $this->POST_BY=$rows['POST_BY'];
    $this->UPDATE_BY=$rows['UPDATE_BY'];
    $this->POST_ON=$rows['POST_ON'];
    $this->UPDATE_ON=$rows['UPDATE_ON'];
    $this->SERIAL_NO=$rows['SERIAL_NO'];
    $this->SUBMENU=$rows['SUBMENU'];
    $this->PERANT_ID=$rows['PERANT_ID'];
    $this->REMOVE=$rows['REMOVE'];
    }
}

        public function MenuRemove($id) {
        include('../../include/database.php');
        $set = 1;
        mysqli_select_db($conn, $data);
        $save = "UPDATE MENU SET REMOVE ='$set' WHERE ID = '$id'";
        $success = mysqli_query($conn, $save) or die(mysqli_error($conn));
    }

    public function MenuRemovePermently($id) {
        include('../../include/database.php');
        mysqli_select_db($conn, $data);
        $save = "DELETE FROM MENU WHERE ID = '$id'";
        $success = mysqli_query($conn, $save) or die(mysqli_error($conn));
    }

    //--------------------------------------------------------------------------
    
   	public function getID(){
		return $this->ID;
	}

	public function setID($ID){
		$this->ID = $ID;
	}

	public function getNAME(){
		return $this->NAME;
	}

	public function setNAME($NAME){
		$this->NAME = $NAME;
	}

	public function getCONTENT(){
		return $this->CONTENT;
	}

	public function setCONTENT($CONTENT){
		$this->CONTENT = $CONTENT;
	}

	public function getIMAGE_ID(){
		return $this->IMAGE_ID;
	}

	public function setIMAGE_ID($IMAGE_ID){
		$this->IMAGE_ID = $IMAGE_ID;
	}

	public function getIS_PAGE(){
		return $this->IS_PAGE;
	}

	public function setIS_PAGE($IS_PAGE){
		$this->IS_PAGE = $IS_PAGE;
	}

	public function getIN_NAVBAR(){
		return $this->IN_NAVBAR;
	}

	public function setIN_NAVBAR($IN_NAVBAR){
		$this->IN_NAVBAR = $IN_NAVBAR;
	}

	public function getPOST_BY(){
		return $this->POST_BY;
	}

	public function setPOST_BY($POST_BY){
		$this->POST_BY = $POST_BY;
	}

	public function getUPDATE_BY(){
		return $this->UPDATE_BY;
	}

	public function setUPDATE_BY($UPDATE_BY){
		$this->UPDATE_BY = $UPDATE_BY;
	}

	public function getPOST_ON(){
		return $this->POST_ON;
	}

	public function setPOST_ON($POST_ON){
		$this->POST_ON = $POST_ON;
	}

	public function getUPDATE_ON(){
		return $this->UPDATE_ON;
	}

	public function setUPDATE_ON($UPDATE_ON){
		$this->UPDATE_ON = $UPDATE_ON;
	}

	public function getPUBLISH(){
		return $this->PUBLISH;
	}

	public function setPUBLISH($PUBLISH){
		$this->PUBLISH = $PUBLISH;
	}

	public function getSERIAL_NO(){
		return $this->SERIAL_NO;
	}

	public function setSERIAL_NO($SERIAL_NO){
		$this->SERIAL_NO = $SERIAL_NO;
	}

	public function getSUBMENU(){
		return $this->SUBMENU;
	}

	public function setSUBMENU($SUBMENU){
		$this->SUBMENU = $SUBMENU;
	}

	public function getPERANT_ID(){
		return $this->PERANT_ID;
	}

	public function setPERANT_ID($PERANT_ID){
		$this->PERANT_ID = $PERANT_ID;
	}
    
        public function pageRedirect($page){
echo "<script type=\"text/javascript\">	"; echo "document.location = '".$page."' "; echo "</script>";} 

}
