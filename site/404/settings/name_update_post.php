<?php include '../../classes/Settings.php';
$setting = new Settings;
$setting->loadvalue();


if(isset($_POST['NAME'])){
$nm = $_POST['NAME']; 
$setting->setSITE_NAME($nm);
$setting->setEMAIL($setting->getEMAIL());
$setting->setADDRESS($setting->getADDRESS());
$setting->setPHONE_NO($setting->getEMAIL());
$setting->setFB($setting->getFB());
$setting->setTWITTER($setting->getTWITTER());
$setting->setLINKEDIN($setting->getLINKEDIN());
$setting->setGOOGLEPLUS($setting->getGOOGLEPLUS());
$setting->setINSTAGRAM($setting->getINSTAGRAM());
$setting->setSHORT_NOTE($setting->getSHORT_NOTE());
$setting->setSTAFF($setting->getSTAFF());
$setting->setUSER($setting->getUSER());
$setting->setEVENT($setting->getEVENT());
$setting->setCO($setting->getCO());
$setting->setGALLERY($setting->getGALLERY());
$setting->update(1);
}

?>