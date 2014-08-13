<?php
include('DPEyeMailer/mailer.php');
include('dao.php');

$dao = new dao();
$unfulfilledPayments = $dao->getUnfunfilledPayments();
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

foreach($unfulfilledPayments as $unfulfilledPayment)
{
    $daysToAddArray = array(
    "4.99"=>"3",
    "9.99"=>"15",
    "15.99"=>"30"
	);
    $value = $unfulfilledPayment['value'];
    $daysToAdd = $daysToAddArray[$value];
    if(!$daysToAdd) break;
    $payerId = $unfulfilledPayment['user_id'];
    $paymentId = $unfulfilledPayment['id'];
    $coupon_code = uniqid();
    $time = time();
    $creation_date = $time . "111";
    $expiry_date = ($time+64800)."111";
    $used = "0";
    $user = $dao->getUserInfo($payerId);

    $receiver = $user['username'];
    if((!$user['firstName'])&&(!$user['lastName'])){
        $usersName = "Customer";
    }
    else if((!$user['firstName'])&&($user['lastName'])){
        $usersName = ucwords($user['lastName']);
    }
    else if((!$user['lastName'])&&($user['firstName'])){
        $usersName = ucwords($user['firstName']);
    }
    else $usersName = ucwords($user['firstName']. " " . $user['lastName']);

    $subject = $appName ." - New payment coupon activated";
    $body = "Hello $usersName,

Your payment has been received and a coupon (coupon id: $coupon_code) has been created for you. You can view all your coupons at $viewCouponsUrl.

You can apply your coupon to any device you wish and this will add a subscription period of 30 days to your device.

On the page $viewCouponsUrl, scroll down to the coupon code you wish to use. Select the device you wish to apply it to on your list of devices, and press apply. Done!


If you received this email in error or you want your data purged off our systems, follow the link below
$websiteUrl/cancel-registration.php?user=$receiver&uid=$payerId


Best wishes from,
$websiteUrl
$appName ";

    if($dao->addPaymentCoupon($payerId, $coupon_code, $creation_date, $expiry_date, $used, $paymentId, $daysToAdd)){        
        $mailer->fromEmail = "support@digitalprivateeye.com";
        $mailer->fromName = "Digital Private Eye";
        $mailer->replyTo = "support@digitalprivateeye.com";
        $mailer->to = $receiver;
        $mailer->subject = $subject;
        $mailer->message = $body;
        $mailer->SendMail();
    }        
}