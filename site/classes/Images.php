<?php

class Images {
    private $ID;
    private $IMAGE_LINK;
    private $IMG_CAPTION;
    private $CATEGORY_ID;
    private $IMG_DESCRIPTIONS;
    private $POST_BY;
    private $POST_ON;
    private $PUBLISH;


    public function InsertPhoto(){
      include('../../include/database.php');
      $pl = mysqli_real_escape_string($conn, $this->IMAGE_LINK);
      $cap = mysqli_real_escape_string($conn, $this->IMG_CAPTION);
      $Cate = mysqli_real_escape_string($conn, $this->CATEGORY_ID);
      $imddec = mysqli_real_escape_string($conn, $this->IMG_DESCRIPTIONS);
      $postby = mysqli_real_escape_string($conn, $this->POST_BY);
      $tim = time();
      
      $query = "INSERT INTO IMAGES (IMAGE_LINK, IMG_CAPTION, IMG_DESCRIPTIONS, CATEGORY_ID, POST_BY, POST_ON, PUBLISH) 
               VALUES('$pl', '$cap', '$imddec', '$Cate', '$postby', '$tim', '1')";
      mysqli_select_db($conn, $data);
      $insert = mysqli_query($conn, $query) or mysqli_error($conn) ;
      }
/* View Images in Admin Panel ---------------------------------------------------------- */
    public function ViewInAdmin($imgType){
        include('../include/database.php');
      $query = "SELECT * FROM IMAGES WHERE PARENT_ID = '$imgType' ORDER BY ID DESC";	
      mysqli_select_db($conn, $data);
      $rs = mysqli_query($conn, $query) or mysqli_error($conn) ;
      $rows = mysqli_fetch_assoc($rs);
      if($rows>0){
	do{
		echo "<div class='col-sm-12 col-xs-12 col-lg-3 col-md-3'>";
                echo "<a href='#'>";
		echo "<img src='../mapImages/".$rows['IMAGE_LINK']."' class='thumbnail img-thumbnail'/>";
                echo "</a>";
                echo "<p>";
                echo "<a href='#";
             //   echo $rows['ID'];
                echo "' class ='btn btn-danger map' id = 'id_".$rows['ID']."'>Delete</a></p>";
		echo "</div>";
	}while($rows = mysqli_fetch_assoc($rs));
       }        
    }

    public function ViewInUser($imgType, $PostBy){
        include('../include/database.php');
      $query = "SELECT * FROM IMAGES WHERE CATEGORY_ID = '$imgType' AND POST_BY ='$PostBy' ORDER BY ID DESC";	
      mysqli_select_db($conn, $data);
      $rs = mysqli_query($conn, $query) or mysqli_error($conn) ;
      $rows = mysqli_fetch_assoc($rs);
      if($rows>0){
	do{
		echo "<div class='col-sm-12 col-xs-12 col-lg-3 col-md-3'>";
                echo "<a href='#'>";
		echo "<img src='../mapImages/".$rows['IMAGE_LINK']."' class='thumbnail img-thumbnail'/>";
                echo "</a>";
                echo "<p>";
                echo "<a href='#";
             //   echo $rows['ID'];
                echo "' class ='btn btn-danger map' id = 'id_".$rows['ID']."'>Delete</a></p>";
		echo "</div>";
	}while($rows = mysqli_fetch_assoc($rs));
       }        
    }

    public function LOadPhotoInSiteByAlbum($id){
        include('include/database.php');
      $query = "SELECT * FROM IMAGES WHERE CATEGORY_ID = $id ORDER BY ID DESC";	
      mysqli_select_db($conn, $data);
      $rs = mysqli_query($conn, $query) or mysqli_error($conn) ;
      $rows = mysqli_fetch_assoc($rs);
      if($rows>0){
          echo "<div class='isotope-grid grid-three-column' data-gutter='20' data-columns='3'>";
	do{
     
                echo "
		<div class='grid-sizer'></div>
		<div class='item all design web'>
		<div class='image-wrapper'>
		<img src='images/".$rows['IMAGE_LINK']."' alt='".$rows['IMG_CAPTION']."' />
		<div class='gallery-detail btns-wrapper'>
		<a href='images/".$rows['IMAGE_LINK']."' data-rel='prettyPhoto[portfolio]' class='btn uni-full-screen'></a>
		</div></div></div>";
	}while($rows = mysqli_fetch_assoc($rs));
        echo "</div>";
        
        }        
       
    }
    
    
    public function LOadPhotoIndex(){
        include('include/database.php');
      $query = "SELECT * FROM IMAGES WHERE CATEGORY_ID > 0 ORDER BY ID DESC";	
      mysqli_select_db($conn, $data);
      $rs = mysqli_query($conn, $query) or mysqli_error($conn) ;
      $rows = mysqli_fetch_assoc($rs);
      if($rows>0){
          echo "<section class='pad-top-none typo-dark'>
<div class='container'><div class='title-container'>
<div class='title-wrap'>
<h3 class='title'>Photos</h3>
<span class='separator line-separator'></span>
</div></div><div class='row'><div class='col-md-12'>";
               echo "<div class='isotope-grid grid-three-column' data-gutter='20' data-columns='3'>";

	do{
                echo "
		<div class='item all design web'>
		<div class='image-wrapper'>
		<img src='images/".$rows['IMAGE_LINK']."' alt='".$rows['IMG_CAPTION']."' />
		<div class='gallery-detail btns-wrapper'>
		<a href='images/".$rows['IMAGE_LINK']."' data-rel='prettyPhoto[portfolio]' class='btn uni-full-screen'></a>
		</div></div></div>";
	}while($rows = mysqli_fetch_assoc($rs));
        
        echo "</div>";
        echo "</div></div></div></section>";
        
        }        
       
    }

    public function ViewInAdminByCategory($imgType, $Category){
        include('../include/database.php');
      $query = "SELECT * FROM IMAGES WHERE PARENT_ID = '$imgType' AND CATEGORY_ID = '$Category' ORDER BY ID DESC";	
      mysqli_select_db($conn, $data);
      $rs = mysqli_query($conn, $query) or mysqli_error($conn) ;
      $rows = mysqli_fetch_assoc($rs);
      if($rows>0){
	do{
		echo "<div class='col-sm-3'>";
                echo "<a href='#'>";
		echo "<img src='../mapImages/".$rows['IMAGE_LINK']."' class='thumbnail img-thumbnail'/>";
                echo "</a>";
                
                echo "<p>";
                echo "<a href='#";
             //   echo $rows['ID'];
                echo "' class ='btn btn-danger map' id = 'id_".$rows['ID']."'>Delete</a></p>";
                
		echo "</div>";
	}while($rows = mysqli_fetch_assoc($rs));
       }        
    }
    
    public function ViewCategoryByType($ImgType){
      include('../include/database.php');
      $query = "SELECT DISTINCT CATEGORY_ID FROM IMAGES WHERE PARENT_ID = '$ImgType' ";
      mysqli_select_db($conn, $data);
      $rs = mysqli_query($conn, $query) or mysqli_error($conn) ;
      $rows = mysqli_fetch_assoc($rs);
      if($rows>0){
	do{ 
            if(strlen($rows['CATEGORY_ID'])>0){
            $ID = str_replace(' ', '_', $rows['CATEGORY_ID']);
            echo "<h4>";
                echo "<a href='#' id='".$ID."' class='ImgCategory'>";           
		echo $rows['CATEGORY_ID'];
                echo "</a>";
            echo "</h4>";
            }
	}while($rows = mysqli_fetch_assoc($rs));
       }  
    }
    
    public function LoadCategoryInNav($ImgType){
      include('../include/database.php');
      $query = "SELECT DISTINCT CATEGORY_ID FROM IMAGES WHERE PARENT_ID = '$ImgType' ";
      mysqli_select_db($conn, $data);
      $rs = mysqli_query($conn, $query) or mysqli_error($conn) ;
      $rows = mysqli_fetch_assoc($rs);
      if($rows>0){
	do{ 
            if(strlen($rows['CATEGORY_ID'])>0){
                            $ID = str_replace(' ', '_', $rows['CATEGORY_ID']);
                            echo "<li><a href='P.php?i=$ID>".$rows['CATEGORY_ID']."</a></li>";

            }
	}while($rows = mysqli_fetch_assoc($rs));
       }  
    }
    
    
    public function ViewCategoryByTypeAndUser($ImgType, $PostBy){
      include('../include/database.php');
      $query = "SELECT DISTINCT CATEGORY_ID FROM IMAGES WHERE PARENT_ID = '$ImgType' AND POST_BY = '$PostBy' ";
      mysqli_select_db($conn, $data);
      $rs = mysqli_query($conn, $query) or mysqli_error($conn) ;
      $rows = mysqli_fetch_assoc($rs);
      if($rows>0){
	do{ 
            if(strlen($rows['CATEGORY_ID'])>0){
            $catname = str_replace(' ', '_', $rows['CATEGORY_ID']);
            echo "<h4>";
                echo "<a href='#' class='ImgCategory' id='".$catname."'>";           
		echo $rows['CATEGORY_ID'];
                echo "</a>";
            echo "</h4>";
            }
	}while($rows = mysqli_fetch_assoc($rs));
       }  
    }
        
      public function ViewCategoryByTypeInSite($ImgType){
      include('../include/database.php');
      $query = "SELECT DISTINCT CATEGORY_ID FROM IMAGES WHERE PARENT_ID = '$ImgType' ";
      mysqli_select_db($conn, $data);
      $rs = mysqli_query($conn, $query) or mysqli_error($conn) ;
      $rows = mysqli_fetch_assoc($rs);
      if($rows>0){
	do{ 
            echo "<div class='col-sm-6 col-xs-12 col-md-2 col-lg-2' style='margin-bottom:30px;'>";
            if(strlen($rows['CATEGORY_ID'])>0){
            $ID = str_replace(' ', '_', $rows['CATEGORY_ID']);
            echo "<h4>";
                echo "<a href='#' id='".$ID."' class='ImgCategory'>";           
		echo $rows['CATEGORY_ID'];
                echo "</a>";
            echo "</h4>";
            }
            echo "</div>";
	}while($rows = mysqli_fetch_assoc($rs));
       }  
    }
    
   
public function ViewImage($ParentID){
      include('../include/database.php');
      $query = "SELECT * FROM IMAGES WHERE PARENT_ID = '$ParentID' ORDER BY ID DESC";	
      mysqli_select_db($conn, $data);
      $rs = mysqli_query($conn, $query) or mysqli_error($conn) ;
      $rows = mysqli_fetch_assoc($rs);
      if($rows>0){
	do{
		echo "<div class='col-sm-6 col-xs-6 col-lg-3 col-md-4'>";
                echo "<a title='Image 1' href='#'>";
		echo "<img src='../mapImages/".$rows['IMAGE_LINK']."' class='img-thumbnail img-responsive' style='margin-bottom:5px'/>";
                echo "</a>";
                echo "<div class='text-center btn btn-default' style='margin-bottom:5px'><a href='../img_manager_ajax/img_Delete.php?i=";
                echo $rows['ID'];
                echo "'>Delete";
                echo "</a></div>";
		echo "</div>";
	}while($rows = mysqli_fetch_assoc($rs));
       }
}
public function LoadCategoty($ParentID){
      include('../include/database.php');
      $query = "SELECT DISTINCT CATEGORY_ID FROM IMAGES WHERE PARENT_ID = '$ParentID' ORDER BY ID DESC";	
      mysqli_select_db($conn, $data);
      $rs = mysqli_query($conn, $query) or mysqli_error($conn) ;
      $rows = mysqli_fetch_assoc($rs);
      if($rows>0){
	do{
            echo "<li><a class='btn btn-default' href='#' data-filter='.".$rows['CATEGORY_ID']."'>".$rows['CATEGORY_ID']."</a></li> 
";
	}while($rows = mysqli_fetch_assoc($rs));
       }
}

//------------------------------------------------------------------------------
public function LoadGallery($id){
    include('../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM IMAGES WHERE PARENT_ID = '$id' ORDER BY RAND() LIMIT 10 ";
    $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($v);
    $sl = 1;
    if($rows > 0){
        do{
echo "<div class='col-md-3 col-md-4 col-sm-6 col-xs-6'>"
            . "<div class='pitem gallery-item item-w1 item-h1 ".$rows['CATEGORY_ID']."' style='margin-bottom: 1cm;'>
                            <div class='media-element'>
                                <div class='entry'>
                                                            <img src='" . $rows['IMAGE_LINK'] . "' alt='' class='img-responsive img-rounded hidden-md hidden-lg'>
    <img src='" . $rows['IMAGE_LINK'] . "' alt='' class='img-responsive img-rounded hidden-xs hidden-sm hidden-md' style='width:350px; height:300px;'>
<img src='" . $rows['IMAGE_LINK'] . "' alt='' class='img-responsive img-rounded hidden-xs hidden-sm hidden-lg' style='width: calc(100% - 5px); height: 300px;'>
      
                                    <div class='magnifier'>
                                        <div class='magni-desc'>
                                            <p>".$rows['IMG_CAPTION']."</p>
                                            <h4><a href='#'>".$rows['CATEGORY_ID']."</a></h4>
                                            <a class='firsticon' data-rel='prettyPhoto' href='".$rows['IMAGE_LINK']."'><i class='fa fa-search'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>";
           

        }while($rows = mysqli_fetch_assoc($v));
    }
    
}

public function LoadSliderS(){
    include('include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM IMAGES WHERE CATEGORY_ID = -1 ORDER BY ID DESC LIMIT 10 ";
    $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($v);
    $sl = 1;
    if($rows > 0){
        echo "
	<section class='pad-bottom-50 pad-none hero'>
		<div class='owl-carousel full-screen dots-inline' 
			data-animatein='' 
			data-animateout='' 
			data-items='1' data-margin='' 
			data-loop='true'
			data-merge='true' 
			data-nav='true' 
			data-dots='false' 
			data-stagepadding='' 
			data-mobile='1' 
			data-tablet='1' 
			data-desktopsmall='1' 
			data-desktop='1' 
			data-autoplay='false' 
			data-delay='3000' 
			data-navigation='true'>";
        do{
            
            $SLD = ($sl%2==1) ?
             "<div class='item animated jello visible'>
				<img src='images/".$rows['IMAGE_LINK']."' alt='' class='img-responsive' height='1000' width='2000'>
				<div class='container slider-content vmiddle text-left'>
					<div class='row'>
						<div class='col-md-offset-6 col-md-6'>
							<h3 class='text-uppercase animated' data-animate='fadeInUp' data-animation-delay='1200'>".$rows['IMG_CAPTION']."</h3>
							<p class='animated' data-animate='fadeInUp' data-animation-delay='1700'>".$rows['IMG_DESCRIPTIONS']."</p>
						</div>	
					</div>	
				</div>
			</div>" :
			
			"<div class='item typo-light animated jello visible'>
				<img src='images/".$rows['IMAGE_LINK']."' class='img-responsive' height='1000' width='2000'>
				<div class='container slider-content vmiddle text-left'>
					<div class='row'>
						<div class='col-md-6'>
							<h3 class='text-uppercase animated' data-animate='fadeInUp' data-animation-delay='1200'>".$rows['IMG_CAPTION']."</h3>
							<p class='animated' data-animate='fadeInUp' data-animation-delay='1700'>".$rows['IMG_DESCRIPTIONS']."</p>
						</div>	
					</div>	
				</div>
			</div>";
            
                echo $SLD;
           $sl++; 
        }while($rows = mysqli_fetch_assoc($v));
        echo '</div></section>';
    }
    
}


public function LoadGalleryIndex($limit){
    include('../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM IMAGES WHERE PARENT_ID != 1 ORDER BY RAND() LIMIT $limit";
    $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($v);
    $sl = 1;
    if($rows > 0){
        do{
echo "<div class='pitem gallery-item item-w1 item-h1 ".$rows['CATEGORY_ID']."'>
                            <div class='media-element colormagnifier'>
                                <div class='entry'>
                                    <img src='" . $rows['IMAGE_LINK'] . "' alt='' class='img-responsive img-rounded hidden-md hidden-lg'>
    <img src='" . $rows['IMAGE_LINK'] . "' alt='' class='img-responsive img-rounded hidden-xs hidden-sm hidden-md' style='width:350px; height:350px;'>
<img src='" . $rows['IMAGE_LINK'] . "' alt='' class='img-responsive img-rounded hidden-xs hidden-sm hidden-lg' style='width: calc(100% - 5px); height: 400px;'>
      
                                    <div class='magnifier'>
                                        <div class='magni-desc'>
                                            <p>".$rows['IMG_CAPTION']."</p>
                                            <h4><a href='#'>".$rows['CATEGORY_ID']."</a></h4>
                                            <a class='firsticon' data-rel='prettyPhoto' href='".$rows['IMAGE_LINK']."'><i class='fa fa-search'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
           

        }while($rows = mysqli_fetch_assoc($v));
    }
    
}
public function LoadGalleryIndex4(){
    include('../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM IMAGES WHERE PARENT_ID != 1 ORDER BY RAND() LIMIT 4";
    $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($v);
    $sl = 1;
    if($rows > 0){
        do{
echo "<div class='pitem gallery-item item-w1 item-h1 ".$rows['CATEGORY_ID']."'>
                            <div class='media-element colormagnifier'>
                                <div class='entry'>
                                                            <img src='" . $rows['IMAGE_LINK'] . "' alt='' class='img-responsive img-rounded hidden-md hidden-lg'>
    <img src='" . $rows['IMAGE_LINK'] . "' alt='' class='img-responsive img-rounded hidden-xs hidden-sm hidden-md' style='width:350px; height:350px;'>
<img src='" . $rows['IMAGE_LINK'] . "' alt='' class='img-responsive img-rounded hidden-xs hidden-sm hidden-lg' style='width: calc(100% - 5px); height: 400px;'>
      
                                    <div class='magnifier'>
                                        <div class='magni-desc'>
                                            <p>".$rows['IMG_CAPTION']."</p>
                                            <h4><a href='#'>".$rows['CATEGORY_ID']."</a></h4>
                                            <a class='firsticon' data-rel='prettyPhoto' href='".$rows['IMAGE_LINK']."'><i class='fa fa-search'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
           

        }while($rows = mysqli_fetch_assoc($v));
    }
    
}


public function LoadSlider($ParentId){
    include('../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM IMAGES WHERE PARENT_ID = '$ParentId' ORDER BY RAND() LIMIT 10 ";
    $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($v);
    $sl = 1;
    if($rows > 0){
        do{
            if($sl==1){
            echo "<div class='item active'>";}
            else{
                echo "<div class='item'>";
            }
            echo "<div class='row' style='background-image:url(../mapImages/".$rows['IMAGE_LINK']."); background-repeat: no-repeat;' id ='SliderBackground'>";
            echo "<table align='center' width='70%' height='550'><tr><td valign='bottom'>";
            echo "<div class='jumbotron' style='background-color: rgba(0, 0, 0, 0.5)'>";
            if(strlen($rows['CATEGORY_ID'])>0){
            echo "<h1 id='sliderHeadline' class='text-center animated rollIn' style='color:#ffffff'>";
            echo $rows['CATEGORY_ID'];
            echo "</h1>";
            }
            if(strlen($rows['IMG_CAPTION'])>0){
            echo "<h3 class='text-center animated slideInRight' style='color:#ffffff'>";
            echo $rows['IMG_CAPTION'];
            echo "</h3>";
            }
            echo "</div>";
            echo "</td></tr></table>";
            echo "</div>";
            echo "</div>";
           $sl++; 
        }while($rows = mysqli_fetch_assoc($v));
    }
    
}
//------------------------------------------------------------------------------
public function LoadSlider_Small($ParentId){
    include('../include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM IMAGES WHERE PARENT_ID = '$ParentId' ORDER BY RAND() LIMIT 10 ";
    $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($v);
    $sl = 1;
    if($rows > 0){
        do{
            if($sl==1){
            echo "<div class='item active'>";}
            else{
                echo "<div class='item'>";
            }
            echo "<div class='row' style='background-image:url(../mapImages/".$rows['IMAGE_LINK'].");' id ='SliderBackground'>";
            echo "<table align='center' width='70%' height='200' style='margin-top:80px'><tr><td valign='bottom'>";
            echo "<div class='jumbotron' style='background-color: rgba(0, 0, 0, 0.5)'>";
            if(strlen($rows['CATEGORY_ID'])>0){
            echo "<h1 id='sliderHeadline' class='text-center animated bounceInDown' style='color:#ffffff'>";
            echo $rows['CATEGORY_ID'];
            echo "</h1>";
            }
            if(strlen($rows['IMG_CAPTION'])>0){
            echo "<h3 class='text-center animated slideInLeft' style='color:#ffffff'>";
            echo $rows['IMG_CAPTION'];
            echo "</h3>";
            }
            echo "</div>";
            echo "</td></tr></table>";
            echo "</div>";
            echo "</div>";
           $sl++; 
        }while($rows = mysqli_fetch_assoc($v));
    }
    
}


    public function getLastId() {
        include('../../include/database.php');
        $SL = 0;
        mysqli_select_db($conn, $data);
        $query = "SELECT ID FROM IMAGES WHERE ID = (SELECT MAX(ID) FROM IMAGES)";
        $resultset = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $rows = mysqli_fetch_assoc($resultset);
        if ($rows > 0) {
            $SL = $rows['ID'];
        }
        return $SL;
    }


public function LoadValue($id){
    $ok = false;
      include('../../include/database.php');
      $query = "SELECT * FROM IMAGES WHERE ID ='$id'";	
      mysqli_select_db($conn, $data);
      $rs = mysqli_query($conn, $query) or mysqli_error($conn) ;
      $rows = mysqli_fetch_assoc($rs);
      if($rows>0){
          $this->ID = $rows['ID'];
          $this->IMG_CAPTION = $rows['IMG_CAPTION'];
          $this->IMAGE_LINK = $rows['IMAGE_LINK'];
          $this->CATEGORY_ID = $rows['CATEGORY_ID'];
          $ok = true;
       }
       return $ok;
}
public function LoadValueSite($id){
    $ok = false;
      include('include/database.php');
      $query = "SELECT * FROM IMAGES WHERE ID ='$id'";	
      mysqli_select_db($conn, $data);
      $rs = mysqli_query($conn, $query) or mysqli_error($conn) ;
      $rows = mysqli_fetch_assoc($rs);
      if($rows>0){
          $this->ID = $rows['ID'];
          $this->IMG_CAPTION = $rows['IMG_CAPTION'];
          $this->IMAGE_LINK = $rows['IMAGE_LINK'];
          $this->CATEGORY_ID = $rows['CATEGORY_ID'];
          $ok = true;
       }
       return $ok;
}

     
public function Delete($id){
      include('../../include/database.php');
      $query = "DELETE FROM IMAGES WHERE ID = $id";	
      mysqli_select_db($conn, $data);
      $success = mysqli_query($conn, $query) or mysqli_error($conn);
}
/* This function will return the image extension ------------------------------------------------------ */
public function GetImageExtension($imagetype)
   	 {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }

/* Getter / Setter -------------------------------------------------------------------- */
function setID($ID) { $this->ID = $ID; }
function getID() { return $this->ID; }
function setIMAGE_LINK($IMAGE_LINK) { $this->IMAGE_LINK = $IMAGE_LINK; }
function getIMAGE_LINK() { return $this->IMAGE_LINK; }
function setIMG_CAPTION($IMG_CAPTION) { $this->IMG_CAPTION = $IMG_CAPTION; }
function getIMG_CAPTION() { return $this->IMG_CAPTION; }
function setCATEGORY_ID($CATEGORY_ID) { $this->CATEGORY_ID = $CATEGORY_ID; }
function getCATEGORY_ID() { return $this->CATEGORY_ID; }
function setPOST_BY($POST_BY) { $this->POST_BY = $POST_BY; }
function getPOST_BY() { return $this->POST_BY; }
function setPOST_ON($POST_ON) { $this->POST_ON = $POST_ON; }
function getPOST_ON() { return $this->POST_ON; }
function setPUBLISH($PUBLISH) { $this->PUBLISH = $PUBLISH; }
function getPUBLISH() { return $this->PUBLISH; }
function setIMG_DESCRIPTIONS($IMG_DESCRIPTIONS) { $this->IMG_DESCRIPTIONS = $IMG_DESCRIPTIONS; }
function getIMG_DESCRIPTIONS() { return $this->IMG_DESCRIPTIONS; }

function setRedirectPage($RedirectPage) { $this->RedirectPage = $RedirectPage; }
function getRedirectPage() { return $this->RedirectPage; }
    
    

/* -------------------------------------------------------------------- */


function pageRedirect($page){
echo "<script type=\"text/javascript\">	"; echo "document.location = '".$page."' "; echo "</script>";} 
    
}
