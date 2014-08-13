<?php
/**
 * Sends all the messages in sent by users in the contact us form.
 */
include('DPEyeMailer/mailer.php');
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
    $subject = "New message from ". $userName;
    $body = $messageBody . "\nreceived at " . $timestamp. "\n\nfrom, \n" . $userName . "\n" . $sender;
    $mailer->fromEmail = $sender;
    $mailer->fromName = $userName;
    $mailer->replyTo = $receiver;
    $mailer->to = $receiver;
    $mailer->subject = $subject;
    $mailer->message = $body;
    $mailer->SendMail();
    $dao->setMessageSent($message['id']);
}