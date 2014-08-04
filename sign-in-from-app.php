<?php
    session_start();
    if($_SESSION['user_id'])header("Location: devices.php");

    include("logic/AuthenticationHandler.php");
    $authenticationHandler = new AuthenticationHandler($_POST);
    $userId = $_GET['id'];
    $key = $_GET['key'];
    $authToken= $_GET['auth_token'];

    if(($userId) && ($key) && ($authToken))
    {
        $result = $authenticationHandler->signInUsingApi($userId, $key, $authToken);

        if(is_numeric($result))
        {
            $_SESSION['user_id'] = $result;
            $success=true;
            header("Location: devices.php");
        }
    }
    echo "authentication failed";