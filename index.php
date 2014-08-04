<?php
//session_start();
CONST APPLICATION_INITIALS = 'DPEye';
CONST APPLICATION_WEBSITE = 'http://digitalprivateeye.com';
CONST APPLICATION_NAME = 'Digital Private Eye';
CONST APPLICATION_DOWNLOAD_URL = "https://play.google.com/store/apps/details?id=com.phonedatasaver";
CONST APPLICATION_DOWNLOAD_URL_VIEWER = "apk-downloads.php";
CONST OWNER = 'Made Software Ltd';
CONST FACEBOOK_URL = 'https://www.facebook.com/pages/Digital-Private-Eye/703312569701920';
CONST LOGO_LARGE = "<img src=\"img/sample/logo.png\" style=\"width: 50px\">";


include "logic/dao.php";
$dao = new dao();
$mediaEntries = $dao->getMediaEntries();
$newsletterFeedback = '';
$newsletterFeedbackBad ='';
$success = false;

if($_POST)
{
    $success = false;
    include("logic/newsletter.php");
    $newsletter = new newsletter($_POST, $dao);
    $success= $newsletter->addNewsletterRecipient();
    if($success) $newsletterFeedback ="Congratulations. You have been added to the $application_name mailing list.";
    else $newsletterFeedback ="Unable to add you to our mailing list. Your email address may be incorrectly formatted or you may have previously registered.";
}
?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
  <head>
    <meta charset="utf-8">
    <title>Digital Private Eye| View Phone Text Messages| View Phone Call Logs| View Phone Contacts| View Phone Locations</title>
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
  <div style="display:none;">
      Digital Private Eye allows you to secretly monitor text messages, call logs, phone contacts and locations of any Android phone you have it installed on.
  </div>
  <div style="display:none;">
      Digital Private Eye allows you to view your child's cell phone messages, your child's cell phone call logs, your child's cell phone contacts
      and your child's cell phone locations of any Android phone you have it installed on.
  </div>
  <div style="display:none;">
      Digital Private Eye allows you to view your husband's or wife's cell phone messages, your husband's or wife's  cell phone call logs, your husband's or wife's  cell phone contacts
      and your husband's or wife's cell phone locations of any Android phone you have it installed on.
  </div>
  <div style="display:none;">
      Digital Private Eye allows you to view your another device's cell phone messages, your another device's cell phone call logs, your another device's cell phone contacts
      and your another device's cell phone locations of any Android phone you have it installed on.
  </div>
  <div style="display:none;">
      Digital Private Eye,Spy on another phone, remotely view text messages, track phone data.
  </div>
    <?php
    include "nav.php";
    ?>

    <div class="clear"></div>
    
    <div id="myCarousel" class="container-wrapper container-top container-wrapper-home carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
          <li data-target="#myCarousel" data-slide-to="3" class=""></li>
      </ol>
      <div class="carousel-inner">
        <div class="item">
          <div class="container">
            <div class="carousel-caption">
              <div class="row">
                <div class="col-md-6 text-left">
                  <h1>Want 2 days free?<?=LOGO_LARGE?></h1>
                  <p class="lead"> Like us on facebook to get a free 2 day subscription.</p>
                  <p>
                    <div class="fb-like" data-href="https://www.facebook.com/pages/Digital-Private-Eye/703312569701920" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>

                    </p>
                </div><!-- end col -->
                <div class="col-md-6">
                  <img src="img/facebook-logo-big.png" alt="" style="width: 300px;" />
                </div><!-- end col -->
              </div><!-- end row -->
            </div><!-- end carousel-caption -->
          </div><!-- end container -->
        </div><!-- end item -->
          <div class="item">
              <div class="container">
                  <div class="carousel-caption">
                      <div class="row">
                          <div class="col-md-6 text-left">
                              <h1><?=APPLICATION_INITIALS.LOGO_LARGE?> empowers you</h1>
                              <p class="lead"> Including a host of advanced surveillance features, our cell phone monitoring software secretly tracks all cell phone activities
                                  and sends the information back to your  <?=APPLICATION_NAME;?>'s user account.</p>
                              <p><a class="btn btn-lg btn-success" href="<?=APPLICATION_DOWNLOAD_URL?>" target="_blank" >Download Spy</a>
                                  <a class="btn btn-lg" href="<?=APPLICATION_DOWNLOAD_URL_VIEWER?>" target="_blank" >Download Viewer</a></p>
                          </div><!-- end col -->
                          <div class="col-md-6">
                              <img src="img/home-feature-1.png" alt="" />
                          </div><!-- end col -->
                      </div><!-- end row -->
                  </div><!-- end carousel-caption -->
              </div><!-- end container -->
          </div><!-- end item -->
        <div class="item">
          <div class="container">
            <div class="carousel-caption">
              <ul class="unstyled center list-circle-icons">
                <li class=""><span class="fa fa-comments"></span></li>
                <li class="red"><span class="fa fa-columns"></span></li>
                <li class="green"><span class="fa fa-user"></span></li>
                <li class="purple"><span class="fa fa-envelope-o"></span></li>
              </ul>
                <h1> <?=APPLICATION_INITIALS.LOGO_LARGE?> safeguards your family & business</h1>
                <p> <?=APPLICATION_NAME?> is your comprehensive and cost-effective solution. Whatever your reason for wanting
                    to discreetly monitor a cell phone activity, <?=APPLICATION_NAME?> is your comprehensive and cost-effective solution.</p>
            </div><!-- end carousel-caption -->
          </div><!-- end container -->
        </div><!-- end item -->
        <div class="item active">
          <div class="container">
            <div class="carousel-caption">
              <div class="row">
                <div class="col-md-4 text-left">
                    <h1>Free 24 Hour Trial</h1>
                    <p> You can download, install and start using <?=APPLICATION_NAME?> in just minutes.</p>
                    <p><a class="btn btn-lg btn-primary" href="<?=APPLICATION_DOWNLOAD_URL?>" target="_blank" role="button">Download Here</a></p>
                  <p><a class="btn btn-lg btn-primary" href="sign-in.php?guest" role="button">Tour</a></p>
                </div><!-- end col -->
                <div class="col-md-6 text-left">
                    <h2> &nbsp</h2>
                  <p> <?=LOGO_LARGE?> Install <?=APPLICATION_INITIALS?> <span style="color: #7b11ff; font-size: larger">INVISIBLY </span>on any supported android phone and you can view it's texts, call logs,
                      contacts and recent locations through our website or using DPEye Viewer app.</p>
                </div><!-- end col -->
              </div><!-- end row -->
            </div><!-- end carousel-caption -->
          </div><!-- end container -->
        </div><!-- end item -->
      </div><!-- end carousel-inner -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="fa fa-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="fa fa-chevron-right"></span></a>
    </div><!-- end carousel -->
    
    <div class="clear"></div>
    
    <div class="container-wrapper">
      <div class="container">
        <div class="row margin-bottom-20">
          <div class="col-md-12 center">
              <p>
                  <?php
                  if($success) echo "<span style=\"font-size: smaller; color:green;\">".$newsletterFeedback . "</span>";
                  else  echo "<span style=\"font-size: smaller; color:red;\">".$newsletterFeedback . "</span>";
                  ?>
              </p>
            <h2>Features</h2>
          </div><!-- end col -->
        </div><!-- end row -->
        <div class="row">
          <div class="col-md-4 center">
            <span class="fa fa-mobile-phone fa-5x black"></span>
            <h3 class="margin-top-10">Data Tracking</h3>
            <p><?=APPLICATION_NAME?> includes several advanced surveillance features to secretly monitor cell phone activities
                of your kids & company owned phones and relay the data to your <?=APPLICATION_NAME?> account.</p>
            <p><a href="<?=APPLICATION_DOWNLOAD_URL?>" target="_blank" class="btn btn-lg btn-purple">Start Now</a></p>
          </div><!-- end col -->
            <div class="col-md-4 center">
                <span class="fa fa-money fa-5x red"></span>
                <h3 class="margin-top-10">Why <?=APPLICATION_NAME?></h3>
                <p>
                    Protect and monitor children 24/7.</br>
                    Priced from as low as 33¢ a day.</br>
                    Monitor all company owned cell phones.</br>
                    No one ever need know they are being monitored
                </p>
                <p><a href="<?=APPLICATION_DOWNLOAD_URL?>" target="_blank" class="btn btn-lg btn-success">Try Now</a></p>
            </div><!-- end col -->
          <div class="col-md-4 center">
            <span class="fa fa-android fa-5x green"></span>
            <h3 class="margin-top-10">Supported Devices</h3>
            <p>
                <strong>Android</strong></br>
                <span style="font-size: smaller;">* Register your email address to be notified of when the iOS <span class="fa fa-apple fa-2x"></span> version is released.</span>
            </p>

                <form class="form-horizontal" action="#" method="POST">
                    <div class="form-group">
                        <div class="controls" style="padding-left:10%; width: 90%;";>
                            <input type="text" name="email" class="form-control"  tabindex="1" />
                            <span class="help-inline" style='display:none;'>Please correct the error</span>
                        </div><!-- end controls-->
                    </div><!-- end form-group -->
                    <div class="form-actions" style="padding-left:10%; width: 90%;">
                        <button type="submit" class="btn btn-lg btn-blue" tabindex="2" >Register</button>
                    </div><!-- end form actions -->
                </form>
            </div><!-- end col -->
        </div><!-- end row -->
      </div><!-- end container -->
    </div><!-- end container-wrapper -->
    
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
      
      
      
    </script>

  </body>
</html>
