<?php
    session_start();
    CONST APPLICATION_INITIALS = 'DPEye';
    CONST APPLICATION_WEBSITE = 'http://digitalprivateeye.com';
    CONST APPLICATION_NAME = 'Digital Private Eye';
    CONST APPLICATION_DOWNLOAD_URL = 'https://play.google.com/store/apps/details?id=com.ghostservice';
    CONST OWNER = 'Made Software Ltd';
    CONST FACEBOOK_URL = 'https://www.facebook.com/pages/Digital-Private-Eye/703312569701920';
    CONST LOGO_LARGE = "<img src=\"img/sample/logo.png\" style=\"width: 50px\">";

    if($_POST)
    {
        $fName=trim($_POST["fName"]);
        $lName=trim($_POST["lName"]);
        $getUserName=trim($_POST["email"]);
        $hear_about_us= $_POST["hear_about_us"];
        
        
        $success = false;
        $failureStyle = "color:red; text-align:center;";
        $successStyle = "color:green; text-align:center;";
        $style = $failureStyle;
        include("logic/RegistrationHandler.php");
        $registrationHandler = new RegistrationHandler($_POST);
        $result = $registrationHandler->register();

        if($result=="already_registered") $result = "This email address is already registered. <a href = 'contact.php'> Contact us </a>if you think this is in error.";
        if($result=="registration_failed") $result = "Your registration has failed. <a href = 'contact.php'> Contact us </a> citing error code '0'.";
        if($result=="no_device") $result = "Registration has failed, please ensure you have at least one device with the
                            DPE Server application installed before attempting to register here.";
        if($result=="success")
        {
            $result="Registration Successful. You should be redirected to sign-in in a few seconds.";
            $success=true;
            header("refresh:5;url=sign-in.php");
        }
        if($success)$style = $successStyle;
    }

    if($_GET["username"]) $getUserName =  $_GET["username"];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Registration - <?=APPLICATION_NAME;?></title>
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
          <h1>Register</h1>
            <p>Note: This email address must be used when registering all tracked devices. This is the email address you entered on the tracked devices.</p>
            <?php
            if($result)
            {
                echo "<p style='". $style ."'>".$result."</p>";
            }
            ?>
          <div class="form-group social-login-wrapper">
            <div class="controls">
              <div class="row">
                  <!--
                <div class="col-md-6">
                  <a href="#none" class="btn btn-lg btn-block btn-facebook"><span class="fa fa-facebook-sign"></span> Sign up with Facebook</a>
                </div><!-- end col --> <!--
                <div class="col-md-6">
                  <a href="#none" class="btn btn-lg btn-block btn-twitter"><span class="fa fa-twitter-sign"></span> Sign up with Twitter</a>
                </div><!-- end col -->
              </div><!-- end row -->
            </div><!-- end controls -->
          </div><!-- end form group --> <!--
          <div class="form-group center">
            <div class="separator"><div class="line"></div> or <div class="line"></div></div>
          </div><!-- end form group -->

            <div class="form-group">
                <div class="controls">
                    <input type="text" name="email" class="form-control text requiredField" placeholder="Your Email Address e.g. admin@digitalprivateeye.com" value ="<?=$getUserName;?>">
                </div><!-- end controls -->
            </div><!-- end form group -->
            <div class="form-group">
                <div class="controls">
                    <input type="text" name="fName" class="form-control text requiredField" placeholder="First Name" value ="<?=$fName;?>">
                </div><!-- end controls -->
            </div><!-- end form group -->
            <div class="form-group">
                <div class="controls">
                    <input type="text" name="lName" class="form-control text requiredField" placeholder="Last Name" value ="<?=$lName;?>">
                </div><!-- end controls -->
            </div><!-- end form group -->
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
                <div class="controls" style="text-align: left;">How did you hear about us? &nbsp;&nbsp;&nbsp;
                    <select name="hear_about_us">
                        <option value="not_selected"></option>
                        <option value="facebook">Facebook</option>
                        <option value="twitter">Twitter</option>
                        <option value="google">Google</option>
                        <option value="instagram">Instagram</option>
                        <option value="online_ad">Online Ad</option>
                        <option value="friend_family_colleague">Friend, Family or Colleague</option>
                        <option value="other">Other</option>
                    </select>
                </div><!-- end controls -->
            </div><!-- end form group -->
          <div class="form-group">
            <div class="controls">
                <input type="hidden" name="captchaEntry" value="a09dc16529c3bc29ee2dd55c4aafd3a4be84cd1f" class="hidden" id="Form_Form_SecurityID" />
              <button class="btn btn-lg btn-block btn-purple" type="submit">Register</button>
            </div><!-- end controls -->
          </div><!-- end form group -->
            <div style='text-align: right;'>* By clicking Register you hereby agree to the <a href="terms-of-use.php"> Terms Of Use </a> &amp;
                <a href="privacy-policy.php">Privacy Policy</a> of <?=APPLICATION_INITIALS?>.<div>
          <div class="space-50"></div>
          <div class="form-group control-group-text">
            <div class="controls">
              <p>Already have an account? <a href="sign-in.php">Login</a></p>
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
