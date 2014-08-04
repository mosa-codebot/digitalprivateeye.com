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
    <title>Documentation - <?=APPLICATION_NAME;?></title>
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
            <h1>User Guide</h1>
          </div>
        </div><!-- end row -->
      </div><!-- end container -->
    </div><!-- end container wrapper -->
    
    <div class="container">
      <div class="row">
        <div class="col-md-3 bs-docs-nav-wrapper">
          <ul class="nav nav-pills nav-stacked bs-docs-nav" data-spy="affix" data-offset-top="250" data-offset-bottom="350">
            <li><a href="#scrollspy-android" class="list-group-item">Android 4.0 &amp; Up</a></li>
            <li><a href="#scrollspy-bugging" class="list-group-item">Bugging the target android phone or device.</a></li>
            <li><a href="#scrollspy-viewing" class="list-group-item">Viewing phone data</a></li>
            <li><a href="#scrollspy-credits" class="list-group-item">Credits</a></li>
          </ul>
        </div>
        <div class="col-md-8 col-md-offset-1">
          <h2 id="scrollspy-android">Overview - Android 4.0 &amp; Up</h2>
          <p>Using Digital Private Eye is a two step process.</p>
          <ul class="fa-ul">
            <li><span class="fa fa-li fa-android"></span>
              <li>Bugging the target android phone or device.</li>
            </li>
              <li><span class="fa fa-li fa-android"></span>
              <li>Viewing the phone data.</li>
              </li>
          </ul>
          <hr />
          <h2 id="scrollspy-bugging">Bugging the target android phone or device.</h2>
          <ul class="fa-ul">
            <li><span class="fa fa-li fa-android"></span>
              <li><a href="<?=APPLICATION_DOWNLOAD_URL?>">Download and install Digital Private Eye - Spy</a> on the app on the target android
                  phone/device that you want to monitor.</li>
            </li>
              <li><span class="fa fa-li fa-android"></span>
              <li>When the installation completes, if there is no registration form displayed on the device,
                  look for an app in the apps list called DPE with the <?=APPLICATION_NAME?> icon displayed on it and
                    click on it.</li>
              </li>
              <li><span class="fa fa-li fa-android"></span>
              <li>You should see a registration form, enter YOUR EMAIL ADDRESS. You will need this to login to view the
                  phone's data from the website or the DPEye Viewer app.</li>
              </li>
              <li><span class="fa fa-li fa-android"></span>
              <li>Ensure you have put in the right email address and press enter.</li>
              </li>
          </ul>
          <hr />
          <h2 id="scrollspy-viewing">Viewing phone data.</h2>
          <ul class="fa-ul">
            <li><span class="fa fa-li fa-android"></span>
              <li><a href="register.php">Register</a> on the website using your email address and login to view device data or</li>
            </li>
              <li><span class="fa fa-li fa-android"></span>
              <li>OR </li>
              </li>
              <li><span class="fa fa-li fa-android"></span>
              <li><a href="<?=APPLICATION_DOWNLOAD_URL?>">Download and install Digital Private Eye - Viewer</a> on you own android device
                  and register using your email address.</li>
              </li>
              <li><span class="fa fa-li fa-android"></span>
              <li>You can now easily access all the devices you are monitoring using the
                  <a href="<?=APPLICATION_DOWNLOAD_URL?>">Digital Private Eye - Viewer</a></li>
              </li>
          </ul>
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
      
    </script>

  </body>
</html>
