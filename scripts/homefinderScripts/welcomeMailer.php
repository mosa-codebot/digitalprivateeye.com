<?php

include('Mailer.php');
include('dao.php');

$dao = new dao();
$users = $dao->getAllUnverifiedUsers();
$mailer = new Mailer();

$subject = "Please verify your account";
$fromEmail = "administrator@digitalprivateeye.com";
$fromName = "Digital Private Eye";
$siteName = "Home Finder";
$websiteUrl = "http://homefinder.digitalprivateeye.com";

$accountEmail = "support@digitalprivateeye.com";
$accountPassword = "com.ghostservice";

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

    $epoch = $user['registration_date'];
    $dt = new DateTime("@$epoch");
    $signUpDate = $dt->format('D d F Y, H:i:s a T'); 

$body = "Hello $usersName, \n

Thank you for registering with $siteName on $signUpDate. "."

Please complete your registration by clicking on the following link or copying it into the address bar of your browser. 

\t$websiteUrl/verify-registration.php?user=$receiver&uid=$userId

".$siteName." is your number one online resource for buying, selling, renting and renting out your property.

If you received this email in error or you want your data purged off our systems, contact us at the link below
$websiteUrl/contact.php?user=$receiver&uid=$userId


Best wishes,
$siteName
$websiteUrl";

   $mailer->SendMail($accountEmail, $accountPassword, $subject, $body, $fromEmail, $fromName, $receiver);
   $dao->setVerificationMessageSent($user['user_id']);
}
?>
