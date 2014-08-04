<?php
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
    <title>Privacy Policy - <?=APPLICATION_NAME;?></title>
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
            <h1>Privacy Policy</h1>
          </div>
        </div><!-- end row -->
      </div><!-- end container -->
    </div><!-- end container wrapper -->
    
    <div class="container">
      <div class="row">
        <div class="col-md-3 bs-docs-nav-wrapper">
          <ul class="nav nav-pills nav-stacked bs-docs-nav" data-spy="affix" data-offset-top="250" data-offset-bottom="350">
            <li><a href="#scrollspy-policy" class="list-group-item">Privacy Policy</a></li>
            <li><a href="#scrollspy-information" class="list-group-item">Information Collection, Use, and Sharing</a></li>
            <li><a href="#scrollspy-access" class="list-group-item">Your Access to and Control Over Information</a></li>
            <li><a href="#scrollspy-security" class="list-group-item">Security</a></li>
            <li><a href="#scrollspy-updates" class="list-group-item">Updates</a></li>
          </ul>
        </div>
        <div class="col-md-8 col-md-offset-1">
          <h2 id="scrollspy-policy">Privacy Policy</h2>
            <p>
                This privacy policy discloses the privacy practices for <?=$application_name?>. This privacy policy applies solely to information collected by this web site. It will notify you of the following:
            <ul>
                <li>What personally identifiable information is collected from you through the web site, how it is used and with whom it may be shared.</li>
                <li>What choices are available to you regarding the use of your data.</li>
                <li>The security procedures in place to protect the misuse of your information.</li>
                <li>How you can correct any inaccuracies in the information.</li>
            </ul>
            </p>
          <hr />
          <h2 id="scrollspy-information">Information Collection, Use, and Sharing</h2>
            <p>
                We are the sole owners of the information collected on this site. We only have access to/collect information that you voluntarily give us via email
                , the mobile application or other direct contact from you. We will not sell or rent this information to anyone.

                We will use your information to respond to you, regarding the reason you contacted us. We will not share your information with any third party outside of our organization, other than as necessary to fulfill your request, e.g. to ship an order.

                Unless you ask us not to, we may contact you via email in the future to tell you about specials, new products or services, or changes to this privacy policy.


            </p>
            <hr />
            <h2 id="scrollspy-access">Your Access to and Control Over Information</h2>
            <p>
                You may opt out of any future contacts from us at any time. You can do the following at any time by contacting us via the email address or phone number given on our website:

            <ul>
                <li> See what data we have about you, if any.</li>

                <li>Change/correct any data we have about you.</li>

                <li>Have us delete any data we have about you.</li>

                <li>Express any concern you have about our use of your data.</li>

            </ul>

            </p>
            <hr />
            <h2 id="scrollspy-security">Security</h2>
            <p>
                We take precautions to protect your information. When you submit sensitive information via the website, your information is protected both online and offline.

                Wherever we collect sensitive information (such as credit card data), that information is encrypted and transmitted to us in a secure way.
                You can verify this by looking for a closed lock icon at the bottom of your web browser, or looking for "https" at the beginning of the address of the web page.</p>

            <p>   While we use encryption to protect sensitive information transmitted online, we also protect your information offline. Only employees who need the information to perform a specific job (for example, billing or customer service) are granted access to personally identifiable information. The computers/servers in which we store personally identifiable information are kept in a secure environment.

            </p>
            <hr />
            <h2 id="scrollspy-updates">Updates</h2>
            <p>


                Our Privacy Policy may change from time to time and all updates will be posted on this page.

                If you feel that we are not abiding by this privacy policy, you should <a href="contact.php">contact us </a>immediately.

            </p>

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
