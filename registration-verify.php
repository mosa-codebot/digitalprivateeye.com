<?php
session_start();
if($_GET['username'])
{
    include("logic/RegistrationHandler.php");
    $registrationHandler = new RegistrationHandler($_POST);
    $registrationHandler->verify($_GET['username']);
    $userName =  $_GET['username'];
    header("Location: registration.php?username=".$userName);
}