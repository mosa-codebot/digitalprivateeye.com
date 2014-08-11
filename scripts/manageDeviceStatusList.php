<?php

include('dao.php');

$dao = new dao();
$activeDevicesFromDevices = $dao->getActiveDevicesFromDevices();

foreach($activeDevicesFromDevices as $device)
{
    $deviceId = $device["deviceId"];
    $dao->addDeviceToActiveDevicesList($deviceId);
}

$activeDevicesFromActiveDevicesList = $dao->getDevicesFromActiveDevicesList();

foreach($activeDevicesFromActiveDevicesList as $device)
{
    $deviceId = $device["device_id"];

    if($dao->deviceExists($deviceId))
    {
        try{
             $expiryDateArray = $dao->getDeviceExpiryDate($deviceId);
             $expiryDate = (int)$expiryDateArray[0]["expiry_date"];
             $currentDate = time();
             if($currentDate > $expiryDate)
                $dao->removeDeviceFromActiveDevicesList($deviceId);
        }
        catch(Exception $e){
            echo $e;
        }
    }
    else{
           $dao->removeDeviceFromActiveDevicesList($deviceId);
    }
}
?>


