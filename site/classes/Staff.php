<?php

class Staff {
        
    private $ID;
    private $USER_ID;
    private $SUBJECT;
    private $QUALIFICATION;
    private $SERIAL_NO;
    private $DESIGNATION;
    private $CATEGORY_ID;

    /* -------------------------------------------------------------------- */

    public function getLastSerialNo() {
        include('../include/database.php');
        $SL = 0;
        mysqli_select_db($conn, $data);
        $view = "SELECT ID FROM STAFF WHERE ID = (SELECT MAX(ID) FROM STAFF)";
        $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
        $rows = mysqli_fetch_assoc($v);
        if ($rows > 0) {
            $SL = $rows['ID'];
        }
        return $SL + 1;
    }

    public function AddStaff() {
        include('../../include/database.php');
        $mn = mysqli_real_escape_string($conn, $this->USER_ID);
        $s = mysqli_real_escape_string($conn, $this->SUBJECT);
        $d = mysqli_real_escape_string($conn, $this->DESIGNATION);
        $k = mysqli_real_escape_string($conn, $this->QUALIFICATION);
        $ty = mysqli_real_escape_string($conn, $this->CATEGORY_ID);
        mysqli_select_db($conn, $data);
        $save = "INSERT INTO STAFF(USER_ID, SUBJECT, SERIAL_NO, QUALIFICATION, DESIGNATION, CATEGORY_ID) 
                VALUES('$mn', '$s', '1', '$k', '$d', '$ty')";
        $success = mysqli_query($conn, $save) or die(mysqli_error($conn));
        if($success){
                        //echo 'sdsdasd';
                        
        }  else {
    //echo 'shkhdskhfk';
}
    }

    /* -------------------------------------------------------------------- */

    public function ViewTeacher() {
        include('../include/database.php');
        mysqli_select_db($conn, $data);
        $view = "SELECT * FROM STAFF ORDER BY SERIAL_NO ASC ";
        $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
        $rows = mysqli_fetch_assoc($v);
        if ($rows > 0) {
            do {
                echo "<div class='col-sm-3 center-block'>";
                echo "<div class='jumbotron' style='padding:30px 10px 30px 10px; text-align:center;'>";
                echo "<img src = '../image/" . $rows['TEACHER_PHOTO'] . "' width='150' class='center-block' />";
                echo "<h4 class='text-center'>" . $rows['USER_ID'] . "</h3>";
                echo "<p class='text-center'>" . $rows['DESIGNATION'] . "</p>";
                echo "<a href='Teacher_Detail.php?i=" . $rows['ID'] . "' class='btn btn-default'>View Detail</a>";
                echo "</div>";
                echo "</div>";
            } while ($rows = mysqli_fetch_assoc($v));
        }
    }
    
    
        public function SingleStaff($id){
    include('include/database.php');
    mysqli_select_db($conn, $data);
    $view = "SELECT * FROM staff_view WHERE ID = $id";
    $rs = mysqli_query($conn, $view) or die(mysqli_error($conn));
    $rows = mysqli_fetch_assoc($rs);
    $count = 0;
    echo "<section class='pad-top-none typo-dark'>
    <div class='container'>";
    if($rows > 0)
        {
            do{
                echo "<div class='row'>
        <div class='col-xs-12 col-sm-12 col-md-4 col-md-4 text-center'>
	<div class='member-img-wrap'>
            <img src='images/".$rows['IMAGE_LINK']."' class='img-responsive img-center' alt='Menber'>
	</div>
	</div>
	<div class='col-md-8 col-md-8 hidden-sm hidden-xs'>
	<div class='title-wrap' style='text-align: left;'>
        <h4 class='position'><a href='team-single-left.html'>".$rows['FIRST_NAME']." ".$rows['LAST_NAME']."</a></h4>
        <h5 class='position'>".$rows['DESIGNATION']."</h5>
	<p>".$rows['ABOUT']."</p>	
	</div></div>
        
	<div class='col-xs-12 col-sm-12 hidden-md hidden-lg text-center'>
	<div class='title-wrap'>
        <h4 class='position'><a href='team-single-left.html'>".$rows['FIRST_NAME']." ".$rows['LAST_NAME']."</a></h4>
        <h5 class='position'>".$rows['DESIGNATION']."</h5>
	</div></div>
        
        </div>";
            }
        while($rows=mysqli_fetch_assoc($rs));   
                                   
        }
         echo "
             
</div>
	</section>";  
    }



    /* -------------------------------------------------------------------- */

    public function ViewTeacherInSite($type) {
        include('../include/database.php');
        mysqli_select_db($conn, $data);
        $view = "SELECT * FROM STAFF WHERE CATEGORY_ID = '$type' ORDER BY SERIAL_NO DESC";
        $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
        $rows = mysqli_fetch_assoc($v);
        if ($rows > 0) {
            do {

                 echo "<div class='col-xs-12 col-sm-12 col-md-6 col-lg-4'>
                        <div class='team-boxes text-center' style='margin-top:15px;'>
                            <div class='image-boxes entry'>
    <img src='" . $rows['TEACHER_PHOTO'] . "' alt='' class='img-responsive img-rounded hidden-md hidden-lg'>
    <img src='" . $rows['TEACHER_PHOTO'] . "' alt='' class='img-responsive img-rounded hidden-xs hidden-sm hidden-md' style='width:350px; height: 350px;'>
<img src='" . $rows['TEACHER_PHOTO'] . "' alt='' class='img-responsive img-rounded hidden-xs hidden-sm hidden-lg' style='width: calc(100% - 5px); height: 400px;'>
                            
</div>
                          <div class='image-boxes entry'>
                                <h4><a href='Teacher_Detail.php?i=" . $rows['ID'] . "'>" . $rows['USER_ID'] . "</a></h4>
                                <p style='font-size:1em; line-height:1em; min-height:1em; max-height:1em; overflow:hidden;'>" . $rows['DESIGNATION'] . "</p>
                                <a href='Teacher_Detail.php?i=" . $rows['ID'] . "' class='btn btn-sm btn-success'><i class='glyphicon glyphicon-list'></i> View Details</a>    
                            </div>  
                        </div>
                    </div>";
            } while ($rows = mysqli_fetch_assoc($v));
        }
    }

    public function RelatedTeacher($type, $ID) {
        include('../include/database.php');
        mysqli_select_db($conn, $data);
        $view = "SELECT * FROM STAFF WHERE CATEGORY_ID = '$type' AND ID != $ID ORDER BY SERIAL_NO DESC LIMIT 4";
        $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
        $rows = mysqli_fetch_assoc($v);
        if ($rows > 0) {
            do {

                echo "<div class='col-xs-12 col-md-6 col-sm-12 col-lg-3'>
                        <div class='team-boxes text-center' style='margin-top:15px;'>
                            <div class='image-boxes entry'>
                              <img src='" . $rows['TEACHER_PHOTO'] . "' alt='' class='img-responsive img-rounded hidden-md hidden-lg'>
    <img src='" . $rows['TEACHER_PHOTO'] . "' alt='' class='img-responsive img-rounded hidden-xs hidden-sm hidden-md' style='width:350px; height: 350px;'>
<img src='" . $rows['TEACHER_PHOTO'] . "' alt='' class='img-responsive img-rounded hidden-xs hidden-sm hidden-lg' style='width: calc(100% - 5px); height: 400px;'>
              </div>
                                <h4><a href='Teacher_Detail.php?i=" . $rows['ID'] . "'>" . $rows['USER_ID'] . "</a></h4>
                                <p style='font-size:1em; line-height:1em; min-height:1em; max-height:1em; overflow:hidden;'>" . $rows['DESIGNATION'] . "</p>
                                <a href='Teacher_Detail.php?i=" . $rows['ID'] . "' class='btn btn-sm btn-success'>View Details</a>    
                        </div>
                    </div>";
            } while ($rows = mysqli_fetch_assoc($v));
        }
    }

    /* -------------------------------------------------------------------- */

    public function viewMemberIndex() {
        include('../include/database.php');
        mysqli_select_db($conn, $data);
        $view = "SELECT * FROM STAFF ORDER BY SERIAL_NO DESC LIMIT 10";
        $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
        $rows = mysqli_fetch_assoc($v);
        if ($rows > 0) {
            echo '<div class="px_100"><h1>List Of Members</h1></div><hr class="style2"/>';
            do {

                echo "<div style='width:48%; height:150px; float:left; margin:5px; border:1px dotted #000;'> <table width='100%'><tr><td> <img src='" . $rows['TEACHER_PHOTO'] . "' width='80'/>  </td> <td valign='bottom'>  <h4>" . $rows['USER_ID'] . "</h4>  <p><strong>" . $rows['DESIGNATION'] . "</strong></p>  <p>" . $rows['OCUPATION'] . ", " . $rows['ADDRESS'] . ", " . $rows['DRISTIC'] . ", " . $rows['PHONE_NUMBER'] . ", " . $rows['POST_OFFICE'] . "</p>  </td></tr></table></div>";
            } while ($rows = mysqli_fetch_assoc($v));
            echo '';
        }
    }

    /* -------------------------------------------------------------------- */

    public function loadvalue($id) {
        include('../../include/database.php');
        mysqli_select_db($conn, $data);
        $view = "SELECT * FROM STAFF WHERE USER_ID = '$id'";
        $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
        $rows = mysqli_fetch_assoc($v);
        if ($rows > 0) {
            $this->ID = $rows['ID'];
            $this->USER_ID = $rows['USER_ID'];
            $this->SERIAL_NO = $rows['SERIAL_NO'];
            $this->SUBJECT = $rows['SUBJECT'];
            $this->DESIGNATION = $rows['DESIGNATION'];
            $this->QUALIFICATION = $rows['QUALIFICATION'];
            $this->CATEGORY_ID = $rows['CATEGORY_ID'];
        }
    }

    /* -------------------------------------------------------------------- */

    public function UpdateImage($id) {
        include('../include/database.php');
        $imagelink = mysqli_real_escape_string($conn, $this->TEACHER_PHOTO);
        $query = "UPDATE STAFF SET TEACHER_PHOTO  = '$imagelink' WHERE ID = '$id'";
        mysqli_select_db($conn, $data);
        $select = mysqli_query($conn, $query) or mysqli_error($conn);
        if (!$select) {
            echo mysqli_error($conn);
        } else {
            $redirectTo = "../admin/Teacher_Detail.php?i=" . $id;
            $this->pageRedirect($redirectTo);
        }
    }

    /* -------------------------------------------------------------------- */

    public function updateStaff($id) {
        include('../../include/database.php');
        $CAT_ID = mysqli_real_escape_string($conn, $this->CATEGORY_ID);
        $s = mysqli_real_escape_string($conn, $this->SUBJECT);
        $k = mysqli_real_escape_string($conn, $this->QUALIFICATION);
        $d = mysqli_real_escape_string($conn, $this->DESIGNATION);
        mysqli_select_db($conn, $data);
        $save = "UPDATE STAFF SET SUBJECT='$s', QUALIFICATION='$s', DESIGNATION='$d', CATEGORY_ID='$CAT_ID' WHERE USER_ID = '$id'";
        $success = mysqli_query($conn, $save) or die(mysqli_error($conn));
    }

    public function DeleteTeacher($id) {
        include('../include/database.php');
        mysqli_select_db($conn, $data);
        $save = "DELETE FROM STAFF WHERE ID = '$id'";

        $success = mysqli_query($conn, $save) or die(mysqli_error($conn));
        $page = "../admin/Teacher_Home.php";
        $this->pageRedirect($page);
    }

    public function DeleteImage($delpath) {
        if (file_exists($delpath)) {
            if (strcmp($delpath, "../image/NoImage.jpg") == 0) {
                
            } else {
                unlink($delpath);
            }
        }
    }

    public function viewTeacherIndex() {
        include('../include/database.php');
        mysqli_select_db($conn, $data);
        $view = "SELECT * FROM STAFF ORDER BY ID DESC LIMIT 10";
        $v = mysqli_query($conn, $view) or die(mysqli_error($conn));
        $v1 = mysqli_fetch_assoc($v);
        if ($v1 > 0) {
            echo "<table class='table table-responsive bg-success'>";
            do {
                echo "<tr style='margin-bottom:5px'>";
                echo "<td class=col-lg-10' v-align='left' ><b>Name : " . $v1['USER_ID'] . "</b>"
                . "<br/>Designation : " . $v1['DESIGNATION'] . ""
                . " <br/>Subject : " . $v1['SUBJECT'] . ""
                . "<br/>Address : " . $v1['ADDRESS'] . "</td>";
                echo "<td class='col-lg-2' align='center'> <img class='thumbnail' src='" . $v1['TEACHER_PHOTO'] . "' hight='140' width='120'/></td>";
                echo "</tr>";
            } while ($v1 = mysqli_fetch_assoc($v));
            echo '</table>';
        }
    }
    /* -------------------------------------------------------------------- */

    public function getID(){return $this->ID;}
    public function setID($ID){$this->ID = $ID;}
    
    public function getSERIAL_NO(){return $this->SERIAL_NO;}
    public function setSERIAL_NO($SERIAL_NO){$this->SERIAL_NO = $SERIAL_NO;}
    
    public function getQUALIFICATION(){return $this->QUALIFICATION;}
    public function setQUALIFICATION($QUALIFICATION){$this->QUALIFICATION = $QUALIFICATION;}
    
    public function getDESIGNATION(){return $this->DESIGNATION;}
    public function setDESIGNATION($DESIGNATION){$this->DESIGNATION = $DESIGNATION;}
    
    public function getUSER_ID(){return $this->USER_ID;}
    public function setUSER_ID($USER_ID){$this->USER_ID = $USER_ID;}
    
    public function setSUBJECT($SUBJECT){$this->SUBJECT = $SUBJECT;}
    public function getSUBJECT(){return $this->SUBJECT;}
    
    public function getCATEGORY_ID(){return $this->CATEGORY_ID;}
    public function setCATEGORY_ID($CATEGORY_ID){$this->CATEGORY_ID = $CATEGORY_ID;}
    /* -------------------------------------------------------------------- */

    public function pageRedirect($page) {echo "<script type=\"text/javascript\">";echo "document.location = '" . $page . "' ";echo "</script>";}

}
