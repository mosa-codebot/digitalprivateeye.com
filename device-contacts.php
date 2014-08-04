<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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
$deviceId = $_GET['device'];

$deviceInfo =  $devicesModel->getDeviceInfo($deviceId);
$deviceDescription = $deviceInfo['description'];

$ajaxParameters = array("function"=>"get-device-contacts", "device"=>"$deviceId", "val"=>"1");
$ajaxParameters = json_encode($ajaxParameters);;
      
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Device Contacts - <?=APPLICATION_NAME;?>- <?=$deviceDescription?></title>
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
            <h1>Contacts Of <?=$deviceDescription?></h1>
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
                    <table class="table table-striped table-condensed" id="results-table" name="results-table">
                        <tr>
                            <td><strong>Name</strong></td>
                            <td><strong>Number</strong></td>
                        </tr>
                    </table>
                </div>
                <div style="text-align: center; margin-top: 50px;">
                    <button id="show-more-button" class="btn btn-md btn-primary">Show more</button>
                </div>
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
            var page = 1;
            
            $("body").scrollspy({target: ".bs-docs-nav-wrapper", offset:50});
            
            $("#show-more-button").click(function() {
                page = page+1;
                $("#show-more-button").attr('disabled','disabled');
                loadMoreResults(page);
            });

            $.get("logic/DevicesAJAX.php",<?=$ajaxParameters;?>,
                function(data) {
                   loadFirstResults(data)
                    });          
        });
      
        function loadFirstResults(data)
        {
            var rowData = jQuery.parseJSON(data);
            $('#results-table tr').not(':first').not(':last').remove();
            var html = '';
            for(var i = 0; i < rowData.length; i++)
                html += '<tr><td>' + rowData[i].name + 
                        '</td><td>' + rowData[i].telephone_number + '</td></tr>';
            $('#results-table tr').first().after(html);
        }
      
        function loadMoreResults(page){
        var ajaxParameters = <?=$ajaxParameters;?>;
            ajaxParameters.val = page;
            $.get("logic/DevicesAJAX.php",ajaxParameters,
                function(data) {
                    if(data.length > 5){
                        var rowData = jQuery.parseJSON(data);                        
                            var html = '';
                            for(var i = 0; i < rowData.length; i++)
                                html += '<tr><td>' + rowData[i].name + 
                                        '</td><td>' + rowData[i].telephone_number + '</td></tr>';
                            $('#results-table tr').last().after(html);
                            $("#show-more-button").removeAttr('disabled');
                        }
                    $("#show-more-button").removeAttr('disabled');
                });   
                $("#show-more-button").removeAttr('disabled');
      }
      
    </script>

  </body>
</html>
