<?php
include('PHPMailer/class.phpmailer.php');

class Mailer{

    /**
     * Creates and returns values in a PHPMailer object
     *
     * @throws No exception thrown
     * @return $mail (a PHPMailer object)
     */
     public function SendMail($subject, $body, $fromEmail, $fromName, $receiver)
     {
        $accountEmail = "support@digitalprivateeye.com";
//	$accountEmail = "mosa.adekunle@gmail.com";
	$accountPassword = "com.ghostservice";
//	$accountPassword = "gb459AAA";
        $mail = new PHPMailer();

        $mail->IsSMTP();  // telling the class to use SMTP
        $mail->Host     = "relay-hosting.secureserver.net"; // SMTP server
	

	$mail->From     = "admin@yoursite.com";
        $mail->Username = $accountEmail;
        $mail->Password = $accountPassword;
        $mail->AddAddress($receiver);
	$mail->WordWrap = 50;

	
	$mail = new PHPMailer();
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
	$mail->Port = 465;

	

	

	try
	{
	   if(!$mail->Send()) {
               echo 'Message was not sent.';
               echo 'Mailer error: ' . $mail->ErrorInfo;
            } 
            else {
            echo 'Message has been sent.';
            }
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
