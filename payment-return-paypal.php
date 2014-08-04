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
if(($_GET['st']!="Completed")) header("Refresh: 5; url=payment.php");
else 
{
	$tx = $_GET['tx'];
	$amount = $_GET['amt'];
	$currency = $_GET['cc'];
	$itemNumber = $_GET['item_number'];
	$status = $_GET['st'];
	
	include_once("logic/Devices.php");
	$devicesModel = new Devices();
	$devicesModel->getDevices();
	$_GET['user_id'] = $_SESSION["user_id"];
	$devicesModel->savePaypalPayment($_GET);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Payment -  <?=APPLICATION_NAME;?></title>
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
                <h1>Payment</h1>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end container wrapper -->


<div class="container">


    <div class="row"><div class="col-md-10">
    <?php 
    		if($status=="Completed") 
    		{
    			echo"
	            <p>Thank you for your payment. Your transaction has been completed, and a receipt for your purchase has been emailed to you.</p>
	            <p> You may log into your account at <a href=\"http://paypal.com\" target=\"_blank\"> www.paypal.com</a> to view details of this transaction.
				</p> <p style=\"color:black; text-align:center;\">Transaction ID: $tx</br>
            	Paid: $amount $currency
            	</p>
	            <hr>
	            <span style=\"text-align: center;\">
	            	<p ><h2 style=\"color: green; \">New Coupon Created.</h2></p>
	            	<p>Go to your <a href=\"coupons.php\">coupons page</a> to apply your subscription to a device.</p>
	            </span>
		";    		
    		}
    		else {
				echo"
	            <p>Your payment was unsuccessful. You will be redirected to the <a href=\"payment.php\">payments page </a> within a few seconds.</p>"
	            ;
	            header( "refresh:5; payment.php" );
	            }
	?>
            <?php ?>
           
    </div>
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
