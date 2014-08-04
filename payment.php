<?php
session_start();

CONST APPLICATION_INITIALS = 'DPEye';
CONST APPLICATION_WEBSITE = 'http://digitalprivateeye.com';
CONST APPLICATION_NAME = 'Digital Private Eye';
CONST APPLICATION_DOWNLOAD_URL = 'https://play.google.com/store/apps/details?id=com.ghostservice';
CONST OWNER = 'Made Software Ltd';
CONST FACEBOOK_URL = 'https://www.facebook.com/pages/Digital-Private-Eye/703312569701920';
CONST LOGO_LARGE = "<img src=\"img/sample/logo.png\" style=\"width: 50px\">";
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

<div class="row">
    <div class="col-md-8 center">
        <p>Remember you get a <span style="font-size: larger"><strong>free 24 hour trial</strong></span> on newly registered devices.</br></br></p>
        <div class="price-table prices-3">
            <div class="price-column">
                <div class="heading">
                    <span class="label-popular invisible">Most Popular</span>
                    <p><span class="sign">$</span> <span class="price">4.99</span></p>
                    <h3>3 days</h3>
                </div>
                <ul>
                    <li><a href="#paypal" class="btn btn-success">Get Started</a></li>
                    <li><span>3 days</span> subscription coupon</li>
                    <li>Use anytime</li>
                    <li>Pay by credit card, Interac email transfer or PayPal</li>
                    <li>No contract</li>
                </ul>
            </div><!-- end price-column -->
            <div class="price-column">
                <div class="heading">
                    <span class="label-popular invisible">Most Popular</span>
                    <p><span class="sign">$</span> <span class="price">9.99</span></p>
                    <h3>15 days</h3>
                </div>
                <ul>
                    <li><a href="#paypal" class="btn btn-success">Get Started</a></li>
                    <li><span>15 days</span> subscription coupon</li>
                    <li>Use anytime</li>
                    <li>Pay by credit card, Interac email transfer or PayPal</li>
                    <li>No contract</li>
                </ul>
            </div><!-- end price-column -->
            <div class="price-column popular">
                <div class="heading">
                    <span class="label-popular">Most Popular</span>
                    <p><span class="sign">$</span> <span class="price">15.99</span></p>
                    <h3>30 days</h3>
                </div>
                <ul>
                    <li><a href="#paypal" class="btn btn-success">Get Started</a></li>
                    <li><span>30 days</span> subscription coupon</li>
                    <li>Use anytime</li>
                    <li>Pay by credit card, Interac email transfer or PayPal</li>
                    <li>No contract</li>
                </ul>
            </div><!-- end price-column -->
        </div>
    </div>
    <div class="col-md-3 col-md-offset-1 sidebar">
        <?php include "quick-links.php"; ?>
    </div><!-- end col -->
</div><!-- end row -->

    <div class="row"><div class="col-md-8">

        </div>
        <div class="col-md-8">
            <p style='font-size:12px;'><a href="contact.php">
                    Contact Us
                </a> for bulk payment & corporate/company payment options
            </p>
            <div id="accordion" class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#paypal" data-parent="#accordion" data-toggle="collapse" class="panel-toggle">
                            Credit card (Visa. Mastercard, American Express/ Paypal)
                        </a>
                    </div><!-- end panel-heading -->
                    <div class="panel-collapse collapse in" id="paypal" style="height: auto;">
                        <div class="panel-body">
                            <div style="float: left; width: 80%">
                                <p>
                                    You can purchase a subscription voucher with a
                                    <span style="font-size: larger;"><strong>Credit Card, Visa Debit card or Paypal</strong></span> payment.
                                </p>
                                <p style="text-align: center; font-size: smaller;">
                                    <?php
                                    if($_SESSION['user_id']) echo "
                                    <form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_top\">
                                    <input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\">
                                    <input type=\"hidden\" name=\"hosted_button_id\" value=\"DHRTBULMAXAX6\">
                                    <table>
                                        <tr>
                                            <td><input type=\"hidden\" name=\"on0\" value=\"Subscription period\">Select your desired subscription period</br></br></td>
                                        </tr>
                                        <tr>
                                            <td><select name=\"os0\">
                                                    <option value=\"3 days\">3 days $4.99 CAD</option>
                                                    <option value=\"15 days\">15 days $9.99 CAD</option>
                                                    <option value=\"30 days\">30 days $15.99 CAD</option>
                                                </select>
                                            </td>
                                         </tr>
                                    </table></br></br>
                                    <input type=\"hidden\" name=\"currency_code\" value=\"CAD\">
                                    <input type=\"image\" src=\"https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif\" border=\"0\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online!\">
                                </form>
                                            ";
                                    else echo "You must be logged in to make a payment";
                                    ?>
                                </p>
                            </div>
                            <div style="float: right; width: 20%">
                                <img src="img/paypal-logo.png" width="120px" height="auto">
                            </div>
                        </div><!-- end panel-body -->
                    </div><!-- end panel-collapse -->
                </div><!-- end panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#interac" data-parent="#accordion" data-toggle="collapse" class="panel-toggle collapsed">
                            Interac e-Transfer
                        </a>
                    </div><!-- end panel-heading -->
                    <div class="panel-collapse collapse " id="interac">
                        <div class="panel-body">
                            <div style="float: left; width: 80%">
                                <p>
                                    You can purchase a subscription voucher for by sending an Interac e-Transfer to
                                    <span style="font-size: larger;"><strong>administrator@digitalprivateeye.com</strong></span>
                                </p>
                            </div>
                            <div style="float: right; width: 20%">
                                <img src="img/interac-logo.png" width="100px" height="auto">
                            </div>
                        </div><!-- end panel-body -->
                    </div><!-- end panel-collapse -->
                </div><!-- end panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#bitcoins" data-parent="#accordion" data-toggle="collapse" class="panel-toggle collapsed">
                            Bitcoins
                        </a>
                    </div><!-- end panel-heading -->
                    <div class="panel-collapse collapse " id="bitcoins">
                        <div class="panel-body">
                            <div style="float: left; width: 80%">
                                <p>
                                    You can purchase a subscription voucher using Bitcoins soon.
                                </p>
                            </div>
                            <div style="float: right; width: 20%">
                                <img src="img/bitcoin-logo.svg" width="120px" height="auto">
                            </div>
                        </div><!-- end panel-body -->
                    </div><!-- end panel-collapse -->
                </div><!-- end panel -->
            </div><!-- end panel-group -->
        </div><!-- end col -->

        <script>
            function updatePayment(sel)
            {
                var value = sel.options[sel.selectedIndex].value;
                showhide(value);
            }

            var divState = {}; // we store the status in this object
            function showhide(id) {
                if (document.getElementById) {
                    var divid = document.getElementById(id);

                    divState[id] = (divState[id]) ? false : true; // initialize / invert status (true is visible and false is closed)
                    //close others
                    for (var div in divState){
                        if (divState[div] && div != id){ // ignore closed ones and the current
                            document.getElementById(div).style.display = 'none'; // hide
                            divState[div] = false; // reset status
                        }
                    }
                    divid.style.display = (divid.style.display == 'block' ? 'none' : 'block');
                }
            }
        </script>
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
