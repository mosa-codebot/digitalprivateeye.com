<?php
include('dao.php');
$dao = new dao();
$activeDevices = $dao->getActiveDevices();
$expiredDevices = $dao->getInActiveDevices();

foreach($activeDevices as $device){
    if($device['expiry_date'] <(time()-7200)){
        $dao->deActivateDevice($device['deviceId']);
    }
}

foreach($expiredDevices as $device){
    if($device['expiry_date'] >time()){
        $dao->activateDevice($device['deviceId']);
    }
}