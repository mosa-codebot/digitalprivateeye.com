<?php
include('PHPMailer/class.phpmailer.php');

class Mailer{

    /**
     * Creates and returns values in a PHPMailer object
     *
     * @throws No exception thrown
     * @return $mail (a PHPMailer object)
     */
     public function SendMail($accountEmail, $accountPassword, $subject, $body, $fromEmail, $fromName, $receiver)
     {
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPDebug = 0;
	$mail->Username = $accountEmail;
	$mail->Password = $accountPassword;
	$mail->AddAddress($receiver);
	$mail->AddReplyTo($fromEmail, $fromName);
	$mail->SetFrom($fromEmail, $fromName);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;

	try
	{
            $mail->Send(true);
        }

	catch (phpmailerException $e) {
	    echo $e->errorMessage(); //Pretty error messages from PHPMailer
	} 

	catch (Exception $e) {
  	    echo $e->getMessage(); //Boring error messages from anything else!
	}
        return $mail;
    }
}
?>
