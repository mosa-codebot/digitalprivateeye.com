<?php
CONST APPLICATION_INITIALS = 'DPEye';
CONST APPLICATION_WEBSITE = 'http://digitalprivateeye.com';
CONST APPLICATION_NAME = 'Digital Private Eye';
CONST APPLICATION_DOWNLOAD_URL = 'https://play.google.com/store/apps/details?id=com.phonedatasaver';
CONST OWNER = 'Made Software Ltd';
CONST FACEBOOK_URL = 'https://www.facebook.com/pages/Digital-Private-Eye/703312569701920';
CONST LOGO_LARGE = "<img src=\"img/sample/logo.png\" style=\"width: 50px\">";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>How it works -  <?=APPLICATION_NAME;?></title>
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
    
    <div class="container-wrapper container-top container-wrapper-sky" style="max-height: 200px; padding: 0; padding-top: 30px;">
      <div class="container container-top">
        <div class="row">
          <div class="col-md-12 center">
            <h1>How It Works</h1>
          </div><!-- end col -->
        </div><!-- end row -->
      </div><!-- end container -->
    </div><!-- end container wrapper -->
    
    <div class="container" style="padding-top: 30px;">
      
      <div class="row">
          <div class="col-sm-12 col-md-10 col-md-offset-1">  
              <h2>Steps to make DPEye work for you.</h2>
                <p>
                    <ul style="margin-left: 30px;">
                        <li>Turn on '<a href="apk-downloads.php#developer-options">developer options</a>' or allow installation from unknown sources on your target device.</li>
                        <li>'<a href="apk-downloads.php">Download</a> and install Digital Private Eye - Spy on the target phone.</li>
                        <li><a href="apk-downloads.php">Download</a> and install Digital Private Eye - Viewer (Optional)</li>
                        <li><a href="registration.php">Register</a> and login to this website to view device data.</li>
                    </ul>
                </p>   
        </div><!-- end col -->       
      </div><!-- end row -->
      
      <div class="row">
          <div class="col-sm-12 col-md-10 col-md-offset-1">  
              <h2><a href="about.php">Click here</a> to find out more about Digital Private Eye.</h2>
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
