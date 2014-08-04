<?php
session_start();
CONST APPLICATION_INITIALS = 'DPEye';
CONST APPLICATION_WEBSITE = 'http://digitalprivateeye.com';
CONST APPLICATION_NAME = 'Digital Private Eye';
CONST APPLICATION_DOWNLOAD_URL = 'https://play.google.com/store/apps/details?id=com.ghostservice';
CONST OWNER = 'Made Software Ltd';
CONST FACEBOOK_URL = 'https://www.facebook.com/pages/Digital-Private-Eye/703312569701920';
CONST LOGO_LARGE = "<img src=\"img/sample/logo.png\" style=\"width: 50px\">";

if($_POST)
{
    $success = false;
    $failureStyle = "color:red; text-align:center;";
    $successStyle = "color:green; text-align:center;";
    $style = $failureStyle;
    $result = "Unable to send message";

    include_once("logic/Devices.php");
    $devicesModel = new Devices();
    if($devicesModel->sendMessage($_POST))
    {
        $success=true;
        if($success)$style = $successStyle;
        $result = "Your message has been sent and you will receive a response shortly";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Contact Form -  <?=APPLICATION_NAME;?></title>
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

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/sample/logo-144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/sample/logo-114.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/sample/logo-72.png">
                    <link rel="apple-touch-icon-precomposed" href="img/sample/logo-57.png">
                                   <link rel="shortcut icon" href="img/sample/logo.png">
    
  </head>

  <body>


  <?php
  include "nav.php";
  ?>
    
    <div class="clear"></div>

    <div class="container-wrapper container-top container-wrapper-winter">
      <div class="container container-top">
        <div class="row">
          <div class="col-md-12 center">
            <h1>Contact</h1>
          </div>
        </div><!-- end row -->
      </div><!-- end container -->
    </div><!-- end container wrapper -->
    
    <div class="container-wrapper">
      <div class="google-map"><iframe width="770" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                      src="https://maps.google.ca/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;
          q=10025+102A+Avenue+Edmonton,+Alberta+T5J+2Z2&amp;aq=&amp;sll=53.543215,-113.492889&amp;sspn=0.046055,0.105915&amp;
          ie=UTF8&amp;hq=&amp;hnear=10025+102A+Ave,+Edmonton,+Alberta+T5J+0E7&amp;ll=53.543567,-113.493931&amp;spn=0.011106,0.009141&amp;t=m&amp;z=14&amp;output=embed"></iframe>
      </div>
    </div>
    
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <h2>Send us a message</h2>
            <?php
            if($result)
            {
                echo "<p style='". $style ."'>".$result."</p>";
            }
            ?>
            <form id="Form_Form" action="#" method="post">


                <p id="Form_Form_error" class="message " style="display: none"></p>


            <div class="form-group">

                <h3 id="Form_Form_EditableFormHeading15" class=" FormHeading">Contact Form</h3>

                <div id="EditableTextField1" class="field text requiredField">
                    <label class="left" for="Form_Form_EditableTextField1">Name:</label>
                    <div class="middleColumn">
                        <input type="text" name="fName" class="text requiredField" id="Form_Form_EditableTextField1" />
                    </div> </div>

                <div id="EditableEmailField3" class="field email text requiredField">
                    <label class="left" for="Form_Form_EditableEmailField3">Email:</label>
                    <div class="middleColumn">
                        <input type="email" name="email" class="email text requiredField" id="Form_Form_EditableEmailField3" />
                    </div>
                </div>

                <div id="EditableEmailField3" class="field email text requiredField">
                    <label class="left" for="Form_Form_EditableEmailField3">Message:</label>
                    <div class="middleColumn">
                        <textarea id="inputMessage" name="message" placeholder="Your Message" class="form-control" rows="10" /></textarea>
                    </div>
                </div>
            </div>

            <div class="form-actions form-actions-no-bg">
              <button type="submit" class="btn btn-lg btn-purple">Send Message</button>
            </div>
          </form>
        </div>
        <div class="col-md-3 sidebar">
          <div class="widget">
            <h2>Contact Details</h2>
            <ul class="fa-ul">
                <li><i class="fa-li fa fa-envelope"></i> <a href="mailto:support@digitalprivateeye.com?Subject=Message from website" target="_top">support@digitalprivateeye.com.</a></li>
                <li><i class="fa-li fa fa-map-marker"></i> <a href="#none">Edmonton, Alberta, Canada.</a></li>
              <li><i class="fa-li fa fa-facebook"></i> <a href="https://www.facebook.com/pages/Digital-Private-Eye/703312569701920">Facebook - Digital Private Eye</a></li>
            </ul>
          </div><!-- end widget -->
        </div>
      </div><!-- end row -->
    </div><!-- end container -->

    
    <div class="clear"></div>


  <?php include "footer.php"; ?>


  <!-- Le javascript
  ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/zion.js"></script>
    <script src="js/custom_checkbox_and_radio.js"></script>
    <script src="js/custom_radio.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    
    <script type="text/javascript">
      $(document).ready(function() {
        $('.dropdown-toggle').dropdown();
        $("[rel='tooltip']").tooltip();
        // Init jQuery UI slider
        $("#slider").slider({
            min: 1,
            max: 5,
            value: 3,
            orientation: "horizontal",
            range: "min",
        });
      });
    </script>

  </body>
</html>
