<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Paggination
 *
 * @author Dulon
 */
class Paggination {
    
    
    
public function PagginationForImageAlbum($catt){
include('../../include/database.php');
mysqli_select_db($conn, $data);
$statement = "IMAGES WHERE CATEGORY_ID = $catt ORDER BY `id` DESC";
$results = mysqli_query($conn, "SELECT ID, IMAGE_LINK FROM {$statement}") or die(mysqli_error($conn));
$rows = mysqli_fetch_assoc($results);
if ($rows > 0) {
    echo '<div class="row row-sm">';
    do{
        $noimage = "AlbumArts/Asomi.jpg";
        $image = $rows['IMAGE_LINK'];
        echo '<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">';
        echo "<div id='img_".$rows['ID']."' class='item'>";
        echo '<div class="pos-rlt">';
        echo "<a href='staff_view.php?i=".$rows['ID']."'><img class='r r-2x img-full' alt='' src='../../images/".$rows['IMAGE_LINK']."' height='200px'></a> </div>";
        echo '<div class="padder-v">';
        echo "<div class='btn-group'><button id='".$rows['ID']."' class='btn btn-danger btn-block btndel'>Remove</button></div>";
        echo"</div> </div> </div>";
    }
    while($rows=mysqli_fetch_assoc($results));
    echo '</div>';
}
    }
    
    
public function SLiders(){
include('../../include/database.php');
mysqli_select_db($conn, $data);
$statement = "IMAGES WHERE CATEGORY_ID = -1 ORDER BY `id` DESC";
$results = mysqli_query($conn, "SELECT ID, IMAGE_LINK FROM {$statement}") or die(mysqli_error($conn));
$rows = mysqli_fetch_assoc($results);
if ($rows > 0) {
    echo '<div class="row row-sm">';
    do{
        $noimage = "AlbumArts/Asomi.jpg";
        $image = $rows['IMAGE_LINK'];
        echo '<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">';
        echo "<div id='img_".$rows['ID']."' class='item'>";
        echo '<div class="pos-rlt">';
        echo "<a href='staff_view.php?i=".$rows['ID']."'><img class='r r-2x img-full' alt='' src='../../images/".$rows['IMAGE_LINK']."' height='200px'></a> </div>";
        echo '<div class="padder-v">';
        echo "<div class='btn-group'><button id='".$rows['ID']."' class='btn btn-danger btn-block btndel'>Remove</button></div>";
        echo"</div> </div> </div>";
    }
    while($rows=mysqli_fetch_assoc($results));
    echo '</div>';
}
    }
    
    
public function PagginationWith($catt , $per_page, $page){
include('../../include/database.php');
mysqli_select_db($conn, $data);
$startpoint = ($page * $per_page) - $per_page;
$statement = "STAFF_VIEW WHERE CATEGORY_ID = $catt ORDER BY `id` DESC";
$results = mysqli_query($conn, "SELECT FIRST_NAME, LAST_NAME, ID, IMAGE_LINK FROM {$statement} LIMIT {$startpoint} , {$per_page}") or die(mysqli_error($conn));
$rows = mysqli_fetch_assoc($results);
if ($rows > 0) {
    echo '<div class="row row-sm">';
    do{
        $noimage = "AlbumArts/Asomi.jpg";
        $image = $rows['IMAGE_LINK'];
        echo '<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2"><div class="item"><div class="pos-rlt"><div class="item-overlay opacity r r-2x bg-black">
        <div class="center text-center m-t-n"> ';
        echo "<a href='staff_view.php?i=" . $rows['ID'] . "'>";
        echo '<i class="fa fa-play-circle i-2x">
        </i></a> </div> </div>';
        echo "<a href='staff_view.php?i=".$rows['ID']."'><img class='r r-2x img-full' alt='' src='../image/'></a> </div>";
        echo '<div class="padder-v">';
        echo"<a class='text-ellipsis' data-replace='true' data-el='#bjax-el' data-target='#bjax-target' data-bjax='' href='staff_view.php?i=".$rows['ID']."'>" . $rows['FIRST_NAME'] . "</a>";
        echo"</div> </div> </div>";
    }
    while($rows=mysqli_fetch_assoc($results));
    echo '</div>';
}
echo '<div class="text-center m-t-lg m-b-lg">';
$this->paginationWith($statement, $per_page, $page, $url = '?', $catt);
echo '</div>';
    }
    
    
    
    function paginationWith($query, $per_page, $page, $url, $cat) {
    include('../../include/database.php');
    mysqli_select_db($conn, $data);
    $query = "SELECT COUNT(*) as `num` FROM {$query}";
    $row = mysqli_fetch_array(mysqli_query($conn, $query)) or die(mysqli_error($conn));
    $total = $row['num'];
    $adjacents = "2";
    $prevlabel = "&lsaquo; Prev";
    $nextlabel = "Next &rsaquo;";
    $lastlabel = "Last &rsaquo;&rsaquo;";
    $page = ($page == 0 ? 1 : $page);
    $start = ($page - 1) * $per_page;

    $prev = $page - 1;
    $next = $page + 1;

    $lastpage = ceil($total / $per_page);

    $lpm1 = $lastpage - 1; // //last page minus 1
    $counter = 0;
    $pagination = "";
    if ($lastpage > 1) {
        $pagination .= "<nav><ul class='pager'>";
        //  $pagination .= "";

        if ($page > 1)
            $pagination.= "<li class='previous'>"
                    . "<a href='{$url}page={$prev}&i={$cat}'>{$prevlabel}</a></li>";

        if ($page < $counter - 1) {
            $pagination.= "<li class='next'>"
                    . "<a href='{$url}page={$next}&i={$cat}'>{$nextlabel}</a></li>";
        }

        $pagination.= "</ul></nav>";
    }

    return $pagination;
}


    function pagination($query, $per_page = 12, $page = 1, $url = '?') {
    global $conDB;
    $query = "SELECT COUNT(*) as `num` FROM {$query}";
    $row = mysqli_fetch_array(mysqli_query($conDB, $query));
    $total = $row['num'];
    $adjacents = "2";
    $prevlabel = "&lsaquo; Prev";
    $nextlabel = "Next &rsaquo;";
    $lastlabel = "Last &rsaquo;&rsaquo;";
    $page = ($page == 0 ? 1 : $page);
    $start = ($page - 1) * $per_page;
    $prev = $page - 1;
    $next = $page + 1;
    $lastpage = ceil($total / $per_page);
    $lpm1 = $lastpage - 1; // //last page minus 1
    $counter = 0;
    $pagination = "";
    if ($lastpage > 1) {
        $pagination .= "<nav><ul class='pager'>";
        if ($page > 1)
            $pagination.= "<li class='previous'>"
                    . "<a href='{$url}page={$prev}'>{$prevlabel}</a></li>";

        if ($lastpage < 3 + ($adjacents * 2)) {

            for ($counter = 1; $counter <= $lastpage; $counter++) {
            }
        } elseif ($lastpage > 5 + ($adjacents * 2)) {

            if ($page < 1 + ($adjacents * 2)) {

                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                    
                }
            } elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {

                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    
                }
            } else {

                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    
                }
            }
        }

        if ($page < $counter - 1) {
            $pagination.= "<li class='next'>"
                    . "<a href='{$url}page={$next}'>{$nextlabel}</a></li>";
        }

        $pagination.= "</ul></nav>";
    }

    return $pagination;
}
}
