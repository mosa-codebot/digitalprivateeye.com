<?php
session_start();

include_once('Devices.php');
$devices = new Devices();

$function = "";
if(array_key_exists("function", $_REQUEST)){
    $function = $_REQUEST['function'];
}

if($function == 'get-device-contacts') {    
    $device = filter_input(INPUT_GET, "device");
    $val = filter_input(INPUT_GET, "val");
    echo (getDeviceContacts($devices, $device, $val));
}
if($function == 'get-device-texts'){
    $device = filter_input(INPUT_GET, "device");
    $val = filter_input(INPUT_GET, "val");
    $phoneNumber = filter_input(INPUT_GET, "phonenumber");
    echo (getDeviceTexts($devices, $device, $val, $phoneNumber));
}

function getDeviceContacts($devices, $device, $val)
{
    $userId = null;
    if(array_key_exists("user_id", $_SESSION)){
        $userId = $_SESSION['user_id'];
        return json_encode($devices->getDeviceContactsByUserId($device, $val, $userId));
    }    
}


function getDeviceTexts($devices, $device, $val, $phoneNumber)
{
    $userId = null;
    if(array_key_exists("user_id", $_SESSION)){
        $userId = $_SESSION['user_id'];
        return json_encode($devices->getDeviceTextsPhoneNumberWPage($device, $phoneNumber, $val));
    }    
}