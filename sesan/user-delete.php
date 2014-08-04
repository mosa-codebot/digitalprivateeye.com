<?php
    session_start();
    if(($_SESSION["user_id"] != "Sesan") && ($_SESSION["is"] != "Admin")) header( 'Location: sign-in.php' ) ;

    include_once("../logic/Devices.php");
    $devices = new Devices();
    $userId = $_GET["user_id"];
    $devices->deleteUser($userId);
    header( 'Location: users.php' ) ;