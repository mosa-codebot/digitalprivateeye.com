<?php
include('DPEyeMailer/mailer.php');
include('dao.php');

$dao = new dao();
$usersToCredit = $dao->getUsersToCreditBonus();
$mailer = new Mailer();
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

foreach($usersToCredit as $user)
{
    $entryId = $user['id'];
    $userId = $user['user_id'];
    $email =  $user['username'];
    $daysToAdd =  $user['days_to_add'];
    $time = time();
    $creation_date = $time . "111";
    $expiry_date = ($time+64800)."111";
    $used = "0";
    $paymentId = "facebook_like_".$userId;   
    $couponCode = "Bonus". "-". $userId."-". $time;
    $subject = "Bonus Subscription - New coupon activated";
    $body = "Hello,

    A bonus coupon (coupon id: $couponCode) has been created for you. You can view all your coupons at $viewCouponsUrl.
    You can apply your coupon to any device you wish and this will add a subscription period to your device.
    On the page $viewCouponsUrl , scroll down to the coupon code you wish to use. Select the device you wish to apply it to on your list of devices, and press apply. Done!
    If you received this email in error or you want your data purged off our systems, follow the link below
    $websiteUrl/cancel-registration.php?user=$email&uid=$userId

    Best wishes from,
    $websiteUrl
    $appName ";    

    $mailer->fromEmail = "support@digitalprivateeye.com";
    $mailer->fromName = "Digital Private Eye";
    $mailer->replyTo = "support@digitalprivateeye.com";
    $mailer->to = $email;
    $mailer->subject = $subject;
    $mailer->message = $body;
    $mailer->SendMail();
    $dao->addPaymentCoupon($userId, $couponCode, $creation_date, $expiry_date, $used, $paymentId, $daysToAdd);
    $dao->MarkBonusCouponCreated($entryId);
}