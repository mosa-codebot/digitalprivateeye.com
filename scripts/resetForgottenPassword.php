<?php
/**
 * Does password reset for users.
 */
include('../DPEyeMailer/mailer.php');
include('dao.php');

$dao = new dao();
$usersToReset = $dao->getUsersPasswordsToReset();

$mailer = new Mailer();

$fromEmail = "administrator@digitalprivateeye.com";
$fromName = "Digital Private Eye";

$appName = "Digital Private Eye";
$websiteUrl = "http://digitalprivateeye.com";
$viewDevicesUrl = $websiteUrl."/devices.php";
$appName = "Digital Private Eye";
$viewCouponsUrl = $websiteUrl."/coupons.php";

$completeRegistrationUrl = $websiteUrl."/registration.php";
$signInUrl = $websiteUrl."/sign-in.php";
$contactUsUrl = $websiteUrl."/contact.php";
$privacyPolicyUrl = $websiteUrl."/privacy-policy.php";
$tosUrl =  $websiteUrl."/terms-of-use.php";
$downloadAppUrl = "https://play.google.com/store/apps/details?id=com.ghostservice";
$paymentPageUrl = $websiteUrl."/payment.php";

foreach($usersToReset as $user)
{
    $email = $user['email'];
    $userInfo = $dao->getUserInfoByEmail($email);
    $userId = $userInfo["user_id"];
    $auth = $userInfo["auth_token"];
    

    $subject = "Password Reset Instructions";
    $body = "Hello,

   to reset your password, follow the link below or copy and paste it in your web browser. 

http://digitalprivateeye.com/reset-password.php?user_id=$userId&auth=$auth&email=$email

If you received this email in error or you want your data purged off our systems, follow the link below
$websiteUrl/cancel-registration.php?user=$email&uid=$userId


Best wishes,
$websiteUrl
$appName ";

    $mailer->fromEmail = "support@digitalprivateeye.com";
    $mailer->fromName = "Digital Private Eye";
    $mailer->replyTo = "support@digitalprivateeye.com";
    $mailer->to = $email;
    $mailer->subject = $subject;
    $mailer->message = $body;
    $mailer->SendMail();
    $dao->MarkResetEmailSent($email);
}