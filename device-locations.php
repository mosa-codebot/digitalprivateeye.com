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
$locations = $devicesModel->getDeviceLocations($deviceId, $page);

$deviceInfo =  $devicesModel->getDeviceInfo($deviceId);
$deviceDescription = $deviceInfo['description'];

//Pagination
$noRecords = $devicesModel->getDeviceLocationsTotalNoRecords($deviceId);
$noOfPages = ceil($noRecords/10);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Device Locations - <?=APPLICATION_NAME;?>- <?=$deviceDescription?></title>
  <?php include("partials/common-head.php");?>
</head>
<body>
    <?php include "nav.php"; ?>
    
    <div class="clear"></div>
    
    <div class="container-wrapper container-top">
      <div class="container container-top">
        <div class="row">
          <div class="col-md-12 center">
            <h1>Locations Of <?=$deviceDescription?></h1>
          </div>
        </div><!-- end row -->
      </div><!-- end container -->
    </div><!-- end container wrapper -->

  <?php $deviceId = $_GET['device'];?>
    <div class="container">
      <div class="row">        
        <?php include("partials/device-nav.php");?>
        <div class="col-md-8 col-md-offset-1">


            <div class="table-responsive">
                <table class="table table-striped table-condensed" >
                    <tr>
                        <td style='padding-right:10px; border-right: 1px solid #ccc; margin-right: 5%; padding-right: 10px;'><strong>Date</strong></td>
                        <td style='padding-right:10px;'><strong>Map</strong></td>
                        <td style='padding-right:10px;padding-left:10px;'><strong>Closest Street Address</strong></td>
                    </tr>
                    <?php
                    $lonLatArray = array();
                    if(!$locations) echo "<tr><td> No data to display</td></tr>";
                    else
                    {
                        foreach($locations as $location)
                        {
                            $locationDate = $location['date'];
                            $longitude = $location['longitude'];
                            $latitude = $location['latitude'];
                            if(array_key_exists($longitude.$latitude, $lonLatArray)) $address = $lonLatArray[$longitude.$latitude];
                            else
                            {
                                $lonLatArray[$longitude.$latitude]= $address = $devicesModel->getAddressFromGoogleMaps($latitude, $longitude);
                            }

                            echo "<tr>
                                    <td style='padding-right:10px; border-right: 1px solid #ccc; margin-right: 5%; padding-right: 10px;'>
                                        <script>
                                            var localTime = new Date($locationDate);
                                            document.write(localTime.toString().substring(0,25));
                                        </script>
                                    </td>
                                    <td style='padding-right:10px;'><a href=\"device-location-map.php?lon=$longitude&lat=$latitude&device=$deviceId&date=$locationDate\" onclick='showLoadingDiv()'>Map</td>
                                    <td style='padding-right:10px;padding-left:10px;'>$address</td>
                                  </tr>";
                        }
                    }
                    ?>
                </table>
            </div>

              <div class="col-md-12">
                  <div class="pagination-wrapper">
                      <ul class="pagination">
                          <?php
                          $previousPage = $currentPage-1;
                          $nextPage = $currentPage+1;
                          $deviceId = $_GET['device'];
                              if($noOfPages >1)
                              {
                                  if($currentPage > 1) echo "<li ><a href='?device=$deviceId&page=$previousPage' onclick='showLoadingDiv()' >«</a></li>";
                                    else echo "<li class=\"disabled\"><a href=\"#none\" onclick='showLoadingDiv()'>«</a></li>";
                                  for($i=1;$i<=$noOfPages;$i++)
                                  {
                                      if($currentPage==$i) $active = "class=\"active\"";
                                      else $active = "";
                                      echo "<li ".$active."><a href=\"?device=$deviceId&page=$i\" onclick='showLoadingDiv()'>". $i . "</a></li>";
                                  }
                                  if($currentPage < $noOfPages) echo "<li><a href='?device=$deviceId&page=$nextPage' onclick='showLoadingDiv()' >»</a></li>";
                              }
                          ?>
                      </ul>
                  </div>
                  <?php
                    if($noOfPages >1)
                    {
                      echo " <ul class=\"pager\">";
                      if ($currentPage!=1) echo "<li><a href='?device=$deviceId&page=$previousPage' onclick='showLoadingDiv()'>Previous Page</a></li>";
                        else echo "<li></li>";
                      if ($currentPage!=(strval($noOfPages))) echo "<li><a href='?device=$deviceId&page=$nextPage' onclick='showLoadingDiv()'>Next Page</a></li>";
                        else echo "<li></li>";
                      echo "</ul>";
                    }
                  ?>
              </div><!-- end col -->
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
