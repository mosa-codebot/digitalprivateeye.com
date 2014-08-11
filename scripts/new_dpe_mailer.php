<?php

include('Mailer.php');
include('dao.php');

$dao = new dao();
$users = $dao->getAllUsers();
$mailer = new Mailer();

$fromEmail = "administrator@digitalprivateeye.com";
$fromName = "Digital Private Eye";

$appName = "Digital Private Eye";
$subject = "Great News- DPEye Spy and DPEye Viewer";
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

foreach($users as $user)
{
    $receiver = $user['username'];
    $userId = $user['user_id'];
    if((!$user['firstName'])&&(!$user['lastName']))
    {
        $usersName = "Customer";
    }
    else if((!$user['firstName'])&&($user['lastName']))
    {
        $usersName = $user['lastName'];
    }
    else if((!$user['lastName'])&&($user['firstName']))
    {
        $usersName = $user['firstName'];
    }
    else $usersName = $user['firstName']. " " . $user['lastName'];

$body = "Hello $usersName,


Great news! Digital Private Eye has now released two new apps, Digital Private Eye - Spy and Digital Private Eye - Viewer.

Install Digital Private Eye - Spy on any supported android phone/device and you can view its texts, calls, contacts and locations on either our website (http://digitalprivateeye.com) or on your android phone using  Digital Private Eye - Viewer (https://play.google.com/store/apps/details?id=com.digitalprivateeyeclient).

Install Digital Private Eye - Viewer (https://play.google.com/store/apps/details?id=com.digitalprivateeyespy) on any supported android phone and you can view all the devices you have installed 'Digital Private Eye -  Spy' on. 

Remember you always view calls, texts, contacts and locations of all devices you have bugged on our website, http://digitalprivateeye.com

If you received this email in error or you want your data purged off our systems, follow the link below
$websiteUrl/cancel-registration.php?user=$receiver&uid=$userId

Thank you.

Best wishes,
$appName
$websiteUrl";
$mailer->SendMail($subject, $body, $fromEmail, $fromName, $receiver);
}
?>
