<?php
include './classes/songs.php';
$s = new songs;
include './classes/NavBar.php';
$n = new NavBar;
include './classes/UI.php';
$UI = new UI;
include '../../classes/Paggination.php';
$Page = new Paggination();
$cat = "-1";
if (isset($_GET['i']) == true){$cat = $_GET['i'];}
$catt = str_replace('_', ' ', $cat);
$tittle = $catt;

$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
if ($page <= 0){$page = 1;}
?>
<!DOCTYPE html><html lang="en" class="app">
    <head>
    <meta name="title" content="<?php echo $tittle; ?> New Assamese 2016 Songs Assam Full Entertaning , Joke, Assamese picture, Songs" />
<meta charset="utf-8" /> <title><?php echo $tittle; ?> New Assamese 2016 Songs Download All Mp3s | Asomi.Mobi</title> 
<meta name="language" content="en" />
<meta name="description" content="<?php echo $tittle; ?> New Assamese Songs <?php echo $tittle; ?> old Assamese Songs offers large collection of mp3, jokes, photos" />
<meta name="keywords" content="<?php echo $tittle; ?> New Assamese 2016 Songs , asomi, wap8.in, newsongscyber.com, whatsapp videos, download,">
<meta name="author" content="Asomi.Mobi">
<meta name="revisit-after" content="5 days" />
<meta name="copyright" content="asomi.mobi">
<meta name="generator" content="wap8.in">
<meta name="creationdate" content="2015">
<meta name="distribution" content="global">
<meta name="rating" content="general">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
<link rel="stylesheet" href="css/app.v1.css" type="text/css" /> 
</head>

    <body class="">
        <section class="vbox"> 
<?php $UI->Work("Songs"); ?> 

            <section class="hbox stretch"> <!-- .aside --> 

<?php $n->Worked(); ?> 

                    <!-- /.aside --> <section id="content"> 
                        <section class="vbox">
                            <section class="w-f-md" id="bjax-target"> 
                                <section class="hbox stretch">
                                    <section class="vbox"> <section class="scrollable padder-lg"> 
                                                <h2 class="font-thin m-b"><?php echo $tittle ?> 
                                                    <span class="musicbar animate inline m-l-sm" style="width:20px;height:30px">
                                                        <span class="bar1 a1 bg-primary lter"></span>
                                                        <span class="bar2 a2 bg-info lt"></span>
                                                        <span class="bar3 a3 bg-success"></span>
                                                        <span class="bar4 a4 bg-warning dk"></span> 
                                                        <span class="bar5 a5 bg-danger dker"></span>
                                                    </span></h2>
                                                 

<?php echo $Page->PagginationWith($catt, 10, $page);?>


                                            </section> </section></section></section> 
                        </section></section> </section></section>
        <script src="js/app.v1.js"></script>
        <script src="js/app.plugin.js"></script>
</html>
