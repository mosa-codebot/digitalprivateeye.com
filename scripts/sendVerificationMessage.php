<?php

include('Mailer.php');
include('dao.php');

$dao = new dao();
$users = $dao->getUnverifiedUnmailedDevices();
$mailer = new Mailer();
$fromEmail = "administrator@digitalprivateeye.com";
$fromName = "Digital Private Eye";

$appName = "Digital Private Eye";
$subject = "Verify Email Address - $appName";
$websiteUrl = "http://digitalprivateeye.com";
$contactUsUrl = $websiteUrl."/contact.php";
$deletionDays = 14;
$appName = "Digital Private Eye";

foreach($users as $user)
{
    $receiver = $user['username'];
    $usersName = "Customer";
    $userId = $user['user_id'];
    $verificationUrl = "http://digitalprivateeye.com/registration-verify.php?username=".$receiver;

$body = "Hello,

Thank you for registering a device with $appName.

To complete your registration, you must verify your email address by clicking here -->  $verificationUrl or pasting the link below in your browser.

$verificationUrl

Unverified email addresses will be deleted after 4 hours.

If you received this email in error or you want your data purged off our systems, follow the link below
$websiteUrl/cancel-registration.php?user=$receiver&uid=$userId


$websiteUrl
$appName ";

    $mailer->SendMail($subject, $body, $fromEmail, $fromName, $receiver);
    $dao->setVerificationEmailSent($user['username']);
}
?>
