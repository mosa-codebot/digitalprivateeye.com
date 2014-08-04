<?php
    session_start();
    CONST APPLICATION_INITIALS = 'DPEye';
    CONST APPLICATION_WEBSITE = 'http://digitalprivateeye.com';
    CONST APPLICATION_NAME = 'Digital Private Eye';
    CONST APPLICATION_DOWNLOAD_URL = 'https://play.google.com/store/apps/details?id=com.ghostservice';
    CONST OWNER = 'Made Software Ltd';
    CONST FACEBOOK_URL = 'https://www.facebook.com/pages/Digital-Private-Eye/703312569701920';
    CONST LOGO_LARGE = "<img src=\"img/sample/logo.png\" style=\"width: 50px\">";

    $userId = $_GET["user_id"];
    $authToken = $_GET["auth"];

    if($_POST)
    {
        $_POST["email"]= $_GET["email"];
        $success = false;
        $failureStyle = "color:red; text-align:center;";
        $successStyle = "color:green; text-align:center;";
        $style = $failureStyle;
        include("logic/RegistrationHandler.php");
        $registrationHandler = new RegistrationHandler($_POST);
        $result = $registrationHandler->updatePassword($userId, $authToken);

        if($result)
        {
            $message = "<p style='color:green;'>Password Reset Successful. You should be redirected to sign-in in a few seconds.</p>";
            $success=true;
            header("refresh:5;url=sign-in.php");
        }
        else $message = "<p style='color:red;'>Password Reset Failed. <a href='contact.php'>Contact Us.</a> </p>";
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reset Password - <?=APPLICATION_NAME;?></title>
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

  <body class="login-form">

    <div class="container container-login">
      
      <div class="row">
        <form class="form-login" method="POST" action="#">
          <div class="logo"></div>
          <h1>Set New Password</h1>
            <?=$message;?>
          <div class="form-group social-login-wrapper">
            <div class="controls">
              <div class="row">

          <div class="form-group">
            <div class="controls">
              <input type="password" name="password1" class="form-control" placeholder="Create Password">
            </div><!-- end controls -->
          </div><!-- end form group -->
          <div class="form-group">
            <div class="controls">
              <input type="password" name="password2" class="form-control" placeholder="Confirm Password">
            </div><!-- end controls -->
          </div><!-- end form group -->
          <div class="form-group">
            <div class="controls">
                <input type="hidden" name="captchaEntry" value="a09dc16529c3bc29ee2dd55c4aafd3a4be84cd1f" class="hidden" id="Form_Form_SecurityID" />
              <button class="btn btn-lg btn-block btn-purple" type="submit">Set Password</button>
            </div><!-- end controls -->
          </div><!-- end form group -->
            <div style='text-align: right;'>* By clicking Register you hereby agree to the <a href="terms-of-use.php"> Terms Of Use </a> &amp;
                <a href="privacy-policy.php">Privacy Policy</a> of <?=APPLICATION_INITIALS?>.<div>
          <div class="space-50"></div>
          <div class="form-group control-group-text">
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
