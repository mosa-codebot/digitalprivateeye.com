<?php

include('Mailer.php');
include('dao.php');

$dao = new dao();
$messages = $dao->getUnsentMessages();
$mailer = new Mailer();

foreach($messages as $message)
{
    $receiver = $message['email_to'];
    $sender = $message['email_from'];
    $userName = $message['name'];
    $messageBody = $message['message'];
    $timestamp = $message['timestamp'];

    //var_dump($message);

    $body = $messageBody . "\nreceived at " . $timestamp. "\n\nfrom, \n" . $userName . "\n" . $sender;
    $mailer->SendMail("New message from ". $userName, $body, $sender, $userName, $receiver);
    $dao->setMessageSent($message['id']);
}
?>

