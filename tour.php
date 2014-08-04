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
    <title>Tour - <?=APPLICATION_NAME;?></title>
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

  <body class="archive">


  <?php
  include "nav.php";
  ?>

    
    <div class="clear"></div>
    
    <div class="container-wrapper container-top container-wrapper-hills">
      <div class="container">
        <div class="row">
          <div class="col-md-12 center">
            <h1>Tour</h1>
          </div><!-- end col -->
        </div><!-- end row -->
      </div><!-- end container -->
    </div><!-- end container wrapper -->

    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <article class="post">
            <h2>Use a sample account</h2>
            <div class="row">
                <p>To let you tour the site, and get a feel for the amazing range of features
                    <?=APPLICATION_NAME?> gives you, a guest account has been provided for your convenience.</p>

                <p>
                    Simply <a href="sign-in.php"> sign in </a>using the credentials below to begin.
                </p>
            </div><!-- end row -->

              <div class="row">
                  <h2>User Name : guest@digitalprivateeye.com</h2>
                  <br>
                  <h2>Password : hayate </h2>
              </div><!-- end row -->
          </article><!-- end post -->
        </div><!-- end blog-wrapper -->
        <div class="col-md-3 col-md-offset-1 sidebar">
        <?php include "quick-links.php"; ?>
        </div></div><!-- end row -->
      
    </div> <!-- end container -->
    
  <?php include "footer.php"; ?>

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
