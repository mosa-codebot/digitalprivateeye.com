<?php
/**
 * Description of mailer
 *
 * @author mosa
 */
class Mailer {
    
    public $fromEmail, $fromName, $replyTo, $to, $subject, $message, $headers;
    
    public function __construct() {
        //$to  = 'aidan@example.com' . ', '; // note the comma
        //$to .= 'wez@example.com';
        
           
        $message = '
        <html>
        <head>
          <title>Birthday Reminders for August</title>
        </head>
        <body>
          <p>Here are the birthdays upcoming in August!</p>
          <table>
            <tr>
              <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
            </tr>
            <tr>
              <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
            </tr>
            <tr>
              <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
            </tr>
          </table>
        </body>
        </html>
        ';
    }
    
    public function sendMail(){
        if(!$this->fromEmail){
            echo "Missing 'from Email' value \n";
        }
        else if(!$this->fromName){
            echo "Missing 'from Name' value \n";
        }
        else if(!$this->replyTo){
            echo "Missing 'replyTo' value \n";
        }
        else if(!$this->to){
            echo "Missing 'to' value \n";
        }
        else if(!$this->subject){
            echo "Missing 'subject' value \n";
        }
        else if(!$this->message){
            echo "Missing 'message' value \n";
        }
        else{            
            $this->headers  = 'MIME-Version: 1.0' . "\r\n";
            $this->headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $this->headers = "From: $this->fromName <$this->fromEmail>" . "\r\n" . "Reply-To: $this->replyTo" . "\r\n" . 'X-Mailer: PHP/' . phpversion();
            mail($this->to, $this->subject, $this->message, $this->headers);   
        }
     
    }
}