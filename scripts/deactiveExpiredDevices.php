<?php
include('dao.php');
$dao = new dao();
$devices = $dao->getAllDevices();
$activeDevices = $dao->getActiveDevicesFromDevices();
/**
 * Scan devices and add to the devices status list
 */
foreach($devices as $device){
    $deviceId = $device["deviceId"];
    if(!in_array($deviceId, $activeDevices[0]))
    {
        try{            
            $dao->setDeviceInactive($deviceId);
        }
        catch(Exception $e){
            echo $e;
        }
    }
}