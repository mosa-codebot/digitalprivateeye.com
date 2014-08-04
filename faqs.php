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
    <title>FAQs -  <?=APPLICATION_NAME;?></title>
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
            <h1>FAQs</h1>
          </div><!-- end col -->
        </div><!-- end row -->
      </div><!-- end container -->
    </div><!-- end container wrapper -->
    
    <div class="container">
      
      <div class="row">
        <div class="col-md-8">
          <div id="accordion" class="panel-group">
            <div class="panel panel-default">
              <div class="panel-heading">
                <a href="#collapseOne" data-parent="#accordion" data-toggle="collapse" class="panel-toggle">
                  Q. Why is my phone being tracked? I'm trying to get it to track my daughter's phone.
                </a>
              </div><!-- end panel-heading -->
              <div class="panel-collapse collapse in" id="collapseOne" style="height: auto;">
                <div class="panel-body">
                  A: You need to install the app on the device which you would like to track and
                    register it with the email address you will be using to register and login on
                </div><!-- end panel-body -->
              </div><!-- end panel-collapse -->
            </div><!-- end panel -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <a href="#collapseTwo" data-parent="#accordion" data-toggle="collapse" class="panel-toggle collapsed">
                  Q.  What happens when my device subscription expires?
                </a>
              </div><!-- end panel-heading -->
              <div class="panel-collapse collapse " id="collapseTwo">
                <div class="panel-body">
                  A. Your device remains registered with <?=APPLICATION_NAME?> but no new data will be captured until the devices subscription has been renewed.
                </div><!-- end panel-body -->
              </div><!-- end panel-collapse -->
            </div><!-- end panel -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <a href="#collapseThree" data-parent="#accordion" data-toggle="collapse" class="panel-toggle collapsed">
                  Q. Can the <?=APPLICATION_NAME?> team or other users see my data?
                </a>
              </div><!-- end panel-heading -->
              <div class="panel-collapse collapse " id="collapseThree">
                <div class="panel-body">
                  A. Only data required for administration such as your registration email address, device id and your name. Data such as text messages
                    are stored encrypted in our database and deleted after 14 days.
                </div><!-- end panel-body -->
              </div><!-- end panel-collapse -->
            </div><!-- end panel -->
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
