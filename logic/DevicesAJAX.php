<?php
session_start();

include_once('Devices.php');
$devices = new Devices();

$function = "";
if(array_key_exists("function", $_REQUEST)){
    $function = $_REQUEST['function'];
}

if($function == 'get-device-contacts') echo (getDeviceContacts($devices, $_REQUEST));






function getDeviceContacts($devices, $REQUEST)
{
    $userId = null;
    if(array_key_exists("user_id", $_SESSION))$userId = $_SESSION['user_id'];
    return json_encode($devices->getDeviceContactsByUserId($REQUEST['device'], $REQUEST['val'], $userId));
}

