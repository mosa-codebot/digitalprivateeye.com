<?php
session_start();
CONST APPLICATION_INITIALS = 'DPEye';
CONST APPLICATION_WEBSITE = 'http://digitalprivateeye.com';
CONST APPLICATION_NAME = 'Digital Private Eye';
CONST APPLICATION_DOWNLOAD_URL = 'https://play.google.com/store/apps/details?id=com.ghostservice';
CONST OWNER = 'Made Software Ltd';
CONST FACEBOOK_URL = 'https://www.facebook.com/pages/Digital-Private-Eye/703312569701920';
CONST LOGO_LARGE = "<img src=\"img/sample/logo.png\" style=\"width: 50px\">";

if(!$_SESSION['user_id']) header("Location: sign-in.php");

include("logic/Devices.php");

$devicesModel = new Devices();
$locations = $devicesModel->getDeviceLocations($_GET['device']);

$longitude = $_GET['lon'];
$latitude = $_GET['lat'];
$device = $_GET['device'];
$closeAddress =$devicesModel->getAddressFromGoogleMaps($latitude, $longitude);
$date = $_GET['date'];
$deviceInfo =  $devicesModel->getDeviceInfo($device);
$deviceDescription = $deviceInfo['description'];
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

        <div id="pano" style="width: 100%; height: 400px;"></div></br>
        <div id="map-canvas" style="width: 100%; height: 400px"></div>
    </div>
    
    <div class="container">
      <div class="row">
        <div class="col-md-9">

            <span><h2><?=$deviceDescription?>'s location

            </h2></span>
            <div>
                <p><strong><script>
                            var localTime = new Date(<?=$date?>);
                            document.write(localTime.toString());
                        </script></strong></p>
                    <p><strong>Closest Street Address</strong>: <?=$closeAddress?></p>
            </div>

        </div>
        <div class="col-md-3 sidebar">
          <div class="widget">
            <h3>
            </h3>
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

  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
  <script>
      function initialize() {
          var location = new google.maps.LatLng(<?=$latitude;?>,<?=$longitude;?>);
          var mapOptions = {
              center: location,
              zoom: 14
          };
          var map = new google.maps.Map(
              document.getElementById('map-canvas'), mapOptions);
          var panoramaOptions = {
              position: location,
              pov: {
                  heading: 34,
                  pitch: 10
              }
          };
          var panorama = new  google.maps.StreetViewPanorama(document.getElementById('pano'),panoramaOptions);
          map.setStreetView(panorama);
      }

      google.maps.event.addDomListener(window, 'load', initialize);

  </script>

  </body>
</html>
