<?php
session_start();
CONST APPLICATION_INITIALS = 'DPEye';
CONST APPLICATION_WEBSITE = 'http://digitalprivateeye.com';
CONST APPLICATION_NAME = 'Digital Private Eye';
CONST APPLICATION_DOWNLOAD_URL = 'https://play.google.com/store/apps/details?id=com.ghostservice';
CONST OWNER = 'Made Software Ltd';
CONST FACEBOOK_URL = 'https://www.facebook.com/pages/Digital-Private-Eye/703312569701920';
CONST LOGO_LARGE = "<img src=\"img/sample/logo.png\" style=\"width: 50px\">";

if(!$_SESSION['user_id'])    header("Location: sign-in.php");

include_once("logic/Devices.php");
$devicesModel = new Devices();

if($_POST)
{
    $couponCode = $_POST['coupon_code'];
    $device = $_POST['device'];
    $updateStatus = $devicesModel->applyCoupon($couponCode, $device);
    if($updateStatus) $message = "<span style='color:green'>Device $device subscription successfully updated.</span></br>";
    else $message = "<span style='color:red'>Application of this coupon has failed. Coupon may be invalid.</span></br>";
}
$devices = $devicesModel->getDevices();
$coupons = $devicesModel->getCoupons();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>My Coupons -  <?=APPLICATION_NAME;?></title>
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

    <!-- iconv and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/sample/logo-144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/sample/logo-114.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/sample/logo-72.png">
                    <link rel="apple-touch-icon-precomposed" href="img/sample/logo-57.png">
                                   <link rel="shortcut icon" href="../img/sample/logo.png">

  </head>

  <body>


  <?php
  include "nav.php";
  ?>

    <div class="clear"></div>
    
    <div class="container-wrapper container-top container-wrapper-sky">
      <div class="container container-top">
        <div class="row">
          <div class="col-md-12 center">
            <h1>My Coupons</h1>
          </div><!-- end col -->
        </div><!-- end row -->
      </div><!-- end container -->
    </div><!-- end container wrapper -->
    
    <div class="container">
      
      <div class="row">
        <div class="col-md-8">
          <div id="accordion" class="panel-group">

              <?php
              if(!$coupons)
              {
                  echo "
                   <div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                                <a href=\"#\" data-parent=\"#accordion\" data-toggle=\"collapse\" class=\"panel-toggle collapsed\">
                                    You have no coupons.
                                </a>
                            </div><!-- end panel-heading -->
                        </div><!-- end panel -->
                  ";
              }

              else
              {
                  if($message) echo $message."</br>";
                  $collapsed =1;
                  foreach($coupons as $coupon)
                  {
                      if($collapsed==1) $dontCollapseThis = " in";
                      else $dontCollapseThis = " ";
                      $couponCode = $coupon['coupon_code'];
                      $status = ($coupon['used']==0) ? "<span style='color:green'>Unused <span class=\"fa fa-plus-square-o large\"></span></span>":"<span style='color:red'>Used</span>";

                      echo "
                      <div class=\"panel panel-default\">
                      <div class=\"panel-heading\">
                        <a href=\"#collapse".$couponCode."\" data-parent=\"#accordion\" data-toggle=\"collapse\" class=\"panel-toggle\">
                          COUPON CODE: ".$couponCode." :: $status</br>
                        </a>
                      </div><!-- end panel-heading -->
                      <div class=\"panel-collapse collapse $collapseThis\" id=\"collapse".$couponCode."\" style=\"height: auto;\">
                        <div class=\"panel-body\">";

                      if($coupon['used']==0)
                      {
                          echo "Select which device to apply the coupon to.";
                          echo "</br><form action='#' id='coupon_form$couponCode'  method='post'  style='width: 100%'>
                                <select name='device' form='coupon_form$couponCode'>";

                          foreach($devices as $device)
                          {
                              $deviceId = $device['deviceId'];
                              $deviceName = $deviceId. " (" . $device['description'] .")";
                              echo "<option value='$deviceId'>$deviceName</option>";
                          }
                          echo "</select>
                          <input type='hidden' name='coupon_code' value='$couponCode'>&nbsp&nbsp
                                <button type=\"submit\" class=\"btn btn-md btn-purple\" onclick='showLoadingDiv()'>Apply</button>
                           </form>";
                          echo "<span style='font-size: 10px; color: green;'>* Used coupons are NON-REFUNDABLE. </br>* A coupon is valid for only a single device.</span>";

                      }
                      else echo "<strong>Status:</strong> $status</br>";
                      echo "
                        </div><!-- end panel-body -->
                      </div><!-- end panel-collapse -->
                    </div><!-- end panel -->
                    ";
                      $collapsed++;
                  }
              }
?>

          </div><!-- end panel-group -->
        </div><!-- end col -->
        <div class="col-md-3 col-md-offset-1 sidebar">
            <?php include "quick-links.php"; ?>
        </div><!-- end col -->
      </div><!-- end row -->
  
    </div> <!-- end container -->

    <div class="clear"></div>


  <?php
  include "footer.php";
  ?>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load iconster -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/zion.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('.dropdown-toggle').dropdown();
        $('[data-toggle=tooltip]').tooltip();
        $('[data-toggle=popover]').popover({html:true});
        $('#myTab a').click(function (e) {
          e.preventdefault();
          $(this).tab('show');
        });
      });
    </script>

  </body>
</html>
