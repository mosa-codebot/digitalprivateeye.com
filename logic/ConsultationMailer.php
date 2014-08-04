<?php
include('PHPMailer/class.phpmailer.php');
class ConsultationMailer{

    private $postData, $fName, $lName, $email,$telephone, $city, $hearAbout, $referredBy, $captchaEntry, $notifiee;

    public function __construct(array $postData)
    {
        $this->postData = $postData;
        $this->fName=$postData["fName"];
        $this->email=$postData["email"];
        $this->message=$postData["message"];
        $this->notifiee = "mosa.adekunle@gmail.com";
    }

        public function processMessage()
        {
            if((!$this->fName)||(!$this->email)||(!$this->message))//||(!$this->captchaEntry))
                return "Must complete all fields";
            else return $this->sendMessage();
        }

        private function sendMessage()
        {
            //get config from config file
            $config = parse_ini_file("config.ini", true);
            //Get PHP mailer object
            $mail = $this->GetMail($config);
            $mail->AddAddress($this->notifiee);
            if(!$mail->Send()) return "Unable to send message";
            else return "Message successfully sent";
        }

        /**
         * Creates and returns values in a PHPMailer object
         *
         * @param  Array  $config An array holding a config file
         * @param  String  $server_date An string holding a date
         * @throws No exception thrown
         * @return $mail (a PHPMailer object)
         */
        private function GetMail($config)
        {
            $server_date = date("D M d, Y G:i");
            $from_name =  $this->fName;
            $subject = "Message from site.";
            $body = $this->getMailBody($server_date);
            $account_email = $config['accounts']['username'];
            $account_password = $config['accounts']['password'];

            $mail = new PHPMailer();  // create a new object
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true;  // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = 'smtp.gmail.com';
//            $mail->Host = 'relay-hosting.secureserver.net';
            $mail->Port = 465;
            $mail->Username = $account_email;
            $mail->Password = $account_password;
            $mail->AddReplyTo($this->email, $from_name);
            $mail->SetFrom($this->email, $from_name);
            $mail->Subject = $subject;
            $mail->Body = $body;
            return $mail;
        }

        private function getMailBody($server_date)
        {
            return $this->message."\n\n Sent at $server_date.";
        }
}
?>
