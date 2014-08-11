<?php

include('../Mailer.php');
include('../dao.php');

$dao = new dao();
$users = $dao->getEmailBlastUsers();
$mailer = new Mailer();

$fromEmail = "administrator@digitalprivateeye.com";
$fromName = "Digital Private Eye";

$appName = "Digital Private Eye";
$subject = "Like us on Facebook for a free 2 day subscription";
$websiteUrl = "http://digitalprivateeye.com";
$viewDevicesUrl = $websiteUrl."/devices.php";
$deletionDays = 14;
$freeDays = 1;
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
    $receiver = $user['email'];
    $userId = $user['id'];

$body = "Hello, 

Thank you for registering with $appName. Like $appName on Facebook to receive a free 2 day subscription.

Some of the latest features on $appName include;

$appName - Spy now installs invisibly on the target device.
Incoming text data is logged instantly.


Digital Private Eye empowers you to get the answers you really deserve.  

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
$dao->setNewsblastEmailSent($user['id']);
}
?>
