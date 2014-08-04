<?php
session_start();      
if(array_key_exists("user_id", $_SESSION)) 
    if($_SESSION['user_id'])
        header("Location: devices.php");;
CONST APPLICATION_INITIALS = 'DPEye';
CONST APPLICATION_WEBSITE = 'http://digitalprivateeye.com';
CONST APPLICATION_NAME = 'Digital Private Eye';
CONST APPLICATION_DOWNLOAD_URL = 'https://play.google.com/store/apps/details?id=com.ghostservice';
CONST OWNER = 'Made Software Ltd';
CONST FACEBOOK_URL = 'https://www.facebook.com/pages/Digital-Private-Eye/703312569701920';
CONST LOGO_LARGE = "<img src=\"img/sample/logo.png\" style=\"width: 50px\">";

if($_POST)
{
    $success = false;
    $failureStyle = "color:red; text-align:center;";
    $successStyle = "color:green; text-align:center;";
    $style = $failureStyle;
    include("logic/AuthenticationHandler.php");
    $authenticationHandler = new AuthenticationHandler($_POST);
    $result = $authenticationHandler->signIn();

    if(is_numeric($result))
    {
        $_SESSION['user_id'] = $result;
        $success=true;
        header("Location: devices.php");
    }
    if($success)$style = $successStyle;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login -  <?=APPLICATION_NAME;?></title>
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
          <h1>Login</h1>
            <?php
            if(isset($result))
            {
                echo "<p style='". $style ."'>".$result."</p>";
            }
            ?>

          <div class="form-group social-login-wrapper">
            <div class="controls">
              <div class="row"><!--
                <div class="col-md-6">
                  <a href="#none" class="btn btn-lg btn-block btn-facebook"><span class="fa fa-facebook-sign"></span> Log in with Facebook</a>
                </div><!-- end col --><!--
                <div class="col-md-6">
                  <a href="#none" class="btn btn-lg btn-block btn-twitter"><span class="fa fa-twitter-sign"></span> Log in with Twitter</a>
                </div><!-- end col -->
              </div><!-- end row -->
            </div><!-- end controls -->
          </div><!-- end form group --><!--
          <div class="form-group center">
            <div class="separator"><div class="line"></div> or <div class="line"></div></div>
          </div><!-- end form group -->
          <div class="form-group">
            <div class="controls">
              <input type="text" class="form-control" placeholder="Your Email Address e.g. admin@digitalprivateeye.com" tabindex="1"  id="emailTextField" name="email" />
            </div><!-- end controls -->
          </div><!-- end form group -->
          <div class="form-group">
            <div class="controls">
              <input type="password" class="form-control" placeholder="Your Password" tabindex="2"  id="passwordTextField" name="password" />
            </div><!-- end controls -->
          </div><!-- end form group -->
          <div class="form-group">
            <div class="controls">
              <div class="row">
                  <input type="hidden" name="captchaEntry" value="a09dc16529c3bc29ee2dd55c4aafd3a4be84cd1f" class="hidden" id="Form_Form_SecurityID" />

                  <p>* By clicking Login, you hereby agree to the <a href="terms-of-use.php"> Terms Of Use </a> and <a href="privacy-policy.php">Privacy Policy</a> of <?=APPLICATION_NAME?>.</p>
                  </br>
                <div class="col-md-6">
                    <div><a onclick="return populateGuestCredentials();">Click here to use guest credentials.</a></div>
                </div><!-- end col -->
                <div class="col-md-6">
                  <button class="btn btn-lg btn-block btn-purple" type="submit" tabindex="3">Login</button>
                </div><!-- end col -->
              </div><!-- end row -->
            </div><!-- end controls -->
          </div><!-- end form group -->
          <div class="space-50"></div>
          <div class="form-group control-group-text">
            <div class="controls">
              <p class="forgot-password"><a href="forgot-password.php">Forgot your password?</a></p>
              <p>Don't have an account? <a href="registration.php">Register</a></p>
            </div><!-- end controls -->
          </div><!-- end form group -->
        </form>
      </div><!-- end row -->


        <script>
            function populateGuestCredentials() {
                var userName =   document.getElementById('emailTextField');
                userName.value = "guest@digitalprivateeye.com";
                var password =   document.getElementById('passwordTextField');
                password.value = "hayate";
            }
            function populateIfGuest()
            {
                var guest = window.location.search.replace( "?", "" );
                if (guest == "guest")
                {
                    populateGuestCredentials();
                    document.getElementById('loginForm').submit();
                }
            }
        </script>

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
