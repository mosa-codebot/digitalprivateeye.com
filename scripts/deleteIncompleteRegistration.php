<?php
include('DPEyeMailer/mailer.php');
include('dao.php');

$dao = new dao();
$users = $dao->getIncompleteRegistrationUsersOverTwentyFourHoursElapsed();
$currentDateTime = time();
$cutOffDateTime = $currentDateTime - 86400;

foreach($users as $user)
{	
    $epoch = (int)$user['epoch'];
    $userId = $user['user_id'];
    if($epoch < $cutOffDateTime){
        notifyUser($user, $dao);
    }
}

function notifyUser($user, $dao)
{	
    $userId = $user['user_id'];	
    $devices = $dao->getUserDevices($userId);
    sendEmail($user['username']);
    $dao->deleteUser($user['user_id']);
    if ($devices)
    {
        foreach($devices as $device)
        {
            $deviceId = $device['deviceId'];
            $dao->deleteDevice($deviceId);
            $dao->deleteDeviceTexts($deviceId);
            $dao->deleteDeviceCallLogs($deviceId);
            $dao->deleteDeviceLocations($deviceId);
        }
    } 
}

function sendEmail($email)
{
    $fromEmail = "administrator@digitalprivateeye.com";
    $fromName = "Digital Private Eye";
    $mailer = new Mailer();
    $appName = "Digital Private Eye";
    $subject = "$appName - Registration Incomplete";
    $websiteUrl = "http://digitalprivateeye.com";
    $viewDevicesUrl = $websiteUrl."/devices.php";
    $deletionDays = 14;
    $freeDays = 3;
    $appName = "Digital Private Eye";
    $paymentPageUrl = $websiteUrl."/payment.php";
    $completeRegistrationUrl = $websiteUrl."/registration.php";
    $signInUrl = $websiteUrl."/sign-in.php";
    $contactUsUrl = $websiteUrl."/contact.php";
    $privacyPolicyUrl = $websiteUrl."/privacy-policy.php";
    $tosUrl =  $websiteUrl."/terms-of-use.php";
    $downloadAppUrl = "https://play.google.com/store/apps/details?id=com.ghostservice";
    $paymentPageUrl = $websiteUrl."/payment.php";
    $receiver = $email;

    $body = "Hello,

You recently registered with Digital Private Eye but did not complete the registration process. As a result your account has been deleted.

If you registered a device or devices, the devices' data has been wiped off our database.

If you tried to install Digital Private Eye but had trouble doing so, installation instructions may be found at http://digitalprivateeye.com/guide.php or if you have more specific questions, send us an email at support@digitalprivateeye.com or on our website at http://digitalprivateeye.com/contact.php

Digital Private Eye empowers you to get the answers you really deserve. Install DPEye on any supported android phone and you can view it's texts, call logs, contacts and recent locations through our website or using DPEye Viewer app.

Get a free 3 day trial.

Best wishes,
$websiteUrl
$appName ";
        
    $mailer->fromEmail = "support@digitalprivateeye.com";
    $mailer->fromName = "Digital Private Eye";
    $mailer->replyTo = "support@digitalprivateeye.com";
    $mailer->to = $receiver;
    $mailer->subject = $subject;
    $mailer->message = $body;
    $mailer->SendMail();
}