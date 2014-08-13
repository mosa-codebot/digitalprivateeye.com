<?php
/**
 * Sends newly registered users a message to verify their accounts by clicking a link.
 */
include('../DPEyeMailer/mailer.php');
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


    $mailer->fromEmail = "support@digitalprivateeye.com";
    $mailer->fromName = "Digital Private Eye";
    $mailer->replyTo = "support@digitalprivateeye.com";
    $mailer->to = $receiver;
    $mailer->subject = $subject;
    $mailer->message = $body;
    $mailer->SendMail();
    $dao->MarkResetEmailSent($email);
    $dao->setVerificationEmailSent($user['username']);
}