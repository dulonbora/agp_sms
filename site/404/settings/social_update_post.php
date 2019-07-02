<?php include '../../classes/Settings.php';
$setting = new Settings;
$setting->loadvalue();


if(isset($_POST['FB'])){
$fb = $_POST['FB']; 
$t = $_POST['T']; 
$g = $_POST['G']; 
$i = $_POST['I']; 
$l = $_POST['L']; 
$setting->setSITE_NAME($setting->getSITE_NAME());
$setting->setEMAIL($setting->getEMAIL());
$setting->setADDRESS($setting->getADDRESS());
$setting->setPHONE_NO($setting->getEMAIL());
$setting->setFB($fb);
$setting->setTWITTER($t);
$setting->setLINKEDIN($l);
$setting->setGOOGLEPLUS($g);
$setting->setINSTAGRAM($i);
$setting->setSHORT_NOTE($setting->getSHORT_NOTE());
$setting->setSTAFF($setting->getSTAFF());
$setting->setUSER($setting->getUSER());
$setting->setEVENT($setting->getEVENT());
$setting->setCO($setting->getCO());
$setting->setGALLERY($setting->getGALLERY());
$setting->update(1);
}

?>