<?php include '../include/Header_Admin.php';
include '../classes/Settings.php';
$s = new Settings;
$s->loadvalue();


if($_SERVER['REQUEST_METHOD']=='POST'){
$sn = $_POST['SCHOOL_NAME'];
$e = $_POST['EMAIL'];
$add = $_POST['ADDRESS'];
$ph = $_POST['PHONE_NO'];
$fb = $_POST['FB'];
$tw = $_POST['TWITTER'];
$lk = $_POST['LINKEDIN'];
$gp = $_POST['GOOGLEPLUS'];
$ins = $_POST['INSTAGRAM'];
$snote = $_POST['SHORT_NOTE'];

$s->setSITE_NAME($sn);
$s->setEMAIL($e);
$s->setADDRESS($add);
$s->setPHONE_NO($ph);
$s->setFB($fb);
$s->setTWITTER($tw);
$s->setLINKEDIN($lk);
$s->setGOOGLEPLUS($gp);
$s->setINSTAGRAM($ins);
$s->setSHORT_NOTE($snote);
$s->setSTAFF($snote);
$s->setUSER($snote);
$s->setEVENT($snote);
$s->setCO($snote);
$s->setGALLERY($snote);
$s->update(1);


}
?>