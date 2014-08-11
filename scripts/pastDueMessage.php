<?php

include('Mailer.php');
include('dao.php');

$dao = new dao();
$daysToExpiry = 3;
$devices = $dao->getExpiredDevices();
$mailer = new Mailer();

$fromEmail = "administrator@digitalprivateeye.com";
$fromName = "Digital Private Eye";

$appName = "Digital Private Eye";
$websiteUrl = "http://digitalprivateeye.com";
$viewDevicesUrl = $websiteUrl."/devices.php";
$deletionDays = 14;
$freeDays = 14;
$appName = "Digital Private Eye";
$paymentPageUrl = $websiteUrl."/payment.php";
$completeRegistrationUrl = $websiteUrl."/registration.php";
$signInUrl = $websiteUrl."/sign-in.php";
$contactUsUrl = $websiteUrl."/support.php";
$privacyPolicyUrl = $websiteUrl."/privacy-policy.php";
$tosUrl =  $websiteUrl."/terms-of-use.php";
$downloadAppUrl = "https://play.google.com/store/apps/details?id=com.ghostservice";
$paymentPageUrl = $websiteUrl."/payment.php";

foreach($devices as $device)
{
    $receiver = $device['username'];
    $userId = $device['user_id'];
    if((!$device['firstName'])&&(!$device['lastName']))
    {
        $usersName = "Customer";
    }
    else if((!$device['firstName'])&&($device['lastName']))
    {
        $usersName = $device['lastName'];
    }
    else if((!$device['lastName'])&&($device['firstName']))
    {
        $usersName = $device['firstName'];
    }
    else $usersName = $device['firstName']. " " . $device['lastName'];

    if($device['description']) $deviceName = $device['description'];
    else $deviceName = $device['device_id'];

    $subject = $appName ." - $deviceName's has expired";

    $epoch = $device['created_date'];
    $dt = new DateTime("@$epoch");
    $signUpDate = $dt->format('D d F Y, H:i:s a T');
    $deviceId =  $device['deviceId'];

    $daysToExpiryEpoch = $device['expiry_date'];
    $dt = new DateTime("@$epoch");
    $expiryDate = $dt->format('D d F Y, H:i:s a T'); 

$body = "Hello $usersName,

Thank you for registering a device with $appName on $signUpDate. "."

Digital Private Eye empowers you to get the answers you really deserve.  If you are receiving this email, you have successfully installed $appName on a target device. You can view data concerning the registered device on our website,  $viewDevicesUrl.

Your device active status expired on $expiryDate. While your device logging status is inactive, the app will stop logging data to your device account, until a device's status is made active. 

Your account can be made active either by a promotional code or by making a payment at $paymentPageUrl.

View your devices here --> $viewDevicesUrl.

1. Complete your account registration here --> $completeRegistrationUrl.
2. Login into your account here --> $signInUrl.
3. You can contact us with a form at --> $contactUsUrl.
4. You can view our privacy policy here --> $privacyPolicyUrl.
5. You can view our terms of service here --> $tosUrl.
6. Download or redownload the app here --> $downloadAppUrl.
7. Make payments when necessary here--> $paymentPageUrl.

If you received this email in error or you want your data purged off our systems, follow the link below
$websiteUrl/cancel-registration.php?user=$receiver&uid=$userId


$websiteUrl
$appName ";

    $mailer->SendMail($subject, $body, $fromEmail, $fromName, $receiver);
}
?>
