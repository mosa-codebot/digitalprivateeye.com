<?php
include('dao.php');
$dao = new dao();
$devices = $dao->getAllDevices();
$activeDevices = $dao->getDevicesFromActiveDevicesList();
$activeDeviceIds = array();

foreach ($activeDevices as $activeDevice){
    $activeDeviceIds[] = $activeDevice['device_id'];
}
/**
 * Scan devices and add to the devices status list
 */
foreach($devices as $device){
    $deviceId = $device["deviceId"];
    if(!in_array($deviceId, $activeDeviceIds))
    {
        try{            
            $dao->setDeviceInactive($deviceId);
        }
        catch(Exception $e){
            echo $e;
        }
    }
    else
    {
        try{
            $dao->setDeviceActive($deviceId);
        }
        catch(Exception $e){
            echo $e;
        }
    }
}