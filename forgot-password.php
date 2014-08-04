<?php
    session_start();
    if($_SESSION['user_id'])header("Location: devices.php");;
    CONST APPLICATION_INITIALS = 'DPEye';
    CONST APPLICATION_WEBSITE = 'http://digitalprivateeye.com';
    CONST APPLICATION_NAME = 'Digital Private Eye';
    CONST APPLICATION_DOWNLOAD_URL = 'https://play.google.com/store/apps/details?id=com.ghostservice';
    CONST OWNER = 'Made Software Ltd';
    CONST FACEBOOK_URL = 'https://www.facebook.com/pages/Digital-Private-Eye/703312569701920';
    CONST LOGO_LARGE = "<img src=\"img/sample/logo.png\" style=\"width: 50px\">";

    if($_POST)
    {
        include("logic/Devices.php");
        $devices = new Devices();
        $email = $_POST['email'];
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $result = $devices->addResetEmailPasswordList($email);
            if($result)
            {
                $message = "<p style='color:green;'>Instructions have been sent to your email address on how to reset your password. You should be redirected to sign-in in a few seconds.</p>";
                if($result=="user_not_found") $message = "<p style='color:red;'>Cannot find that user name in our database. You might need to register again. </p>";
                if($result=="reset_email_already_sent") $message = "<p style='color:red;'>Password email already sent. </p>";
                 header("refresh:5;url=sign-in.php");
            }
            else {
                $message = "<p style=\"color: red;\">Unable to reset password for that email address.</p>";
            }
        }
        else $message = "<p style=\"color: red;\">Unable to reset password for that email address.</p>";
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Forgot Password -  <?=APPLICATION_NAME;?></title>
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

  <body class="login-form" onload="populateIfGuest()" >

    <div class="container container-login">

      <div class="row">
        <form class="form-login" action="#" method="post" id="loginForm">
          <div class="logo"></div>
          <h1>Enter your email address</h1>
            <?=$message?>
          <div class="form-group social-login-wrapper">
            <div class="controls">
              <div class="row">
          <div class="form-group">
            <div class="controls">
              <input type="text" class="form-control" placeholder="Your Email Address" tabindex="1"  id="emailTextField" name="email" />
            </div><!-- end controls -->
          </div><!-- end form group -->
          <div class="form-group">
            <div class="controls">
              <div class="row">
                <div style="text-align: center; width: 100%;">
                  <button class="btn btn-lg btn-block btn-purple" type="submit" tabindex="3">Submit</button>
                </div><!-- end col -->
              </div><!-- end row -->
            </div><!-- end controls -->
          </div><!-- end form group -->
        </form>
      </div><!-- end row -->

      <div class="clear"></div>

    </div><!-- end container -->

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
