<?php
$email = $_GET['user'];
$uid = $_GET['uid'];
$reason = $_GET['reason'];

//Captcha
$captchaArray = array();//
$captchaArray[] = "";
$captchaArray[] = array("abiola"=>"1");
$captchaArray[] = array("mopelola"=>"2");
$captchaArray[] = array("nyabokaj"=>"3");
$captchaArray[] = array("mofiyinfoluwa"=>"4");
$captchaArray[] = array("mofeyisara"=>"5");
$captchaToUseIndex = rand(1,5);
$captchaToUse = $captchaArray[$captchaToUseIndex];
$captchaValueArray = array_keys($captchaToUse);
$captchaValue = $captchaValueArray[0];
$captchaUrl = $captchaToUse[$captchaValue];

    if($_POST)
    {
        $postedCaptcha = $_POST["captcha"];
        $reason = $_POST["reason"];
        $uid = $_POST["uid"];
        $email = $_POST["email"];

        $expectedCaptchaArray = $captchaArray[$_POST["captcha_value"]];
        $expectedCaptcha = array_keys($expectedCaptchaArray);
            $expectedCaptcha = $expectedCaptcha[0];

        if(strlen($reason)<2)
        {
            $cancellationResult = "<span style='color: red'> Please tell us why you are cancelling.</span>";
        }

        else if(strlen($reason)<20)
        {
            $cancellationResult = "<span style='color: red'> Please enter at least 20 characters.</span>";
        }

        else if(!$postedCaptcha)
        {
            $captchaResult = "<span style='color: red'> Please enter the displayed letters.</span>";
        }

        else if($postedCaptcha!=$expectedCaptcha)
        {
            $captchaResult = "<span style='color: red'> Incorrect. Please enter the displayed letters as seen.</span>";
        }

        else{
            include("logic/RegistrationHandler.php");
            $registrationHandler = new RegistrationHandler($_POST);
            $result = $registrationHandler->deregisterAccount($uid, $email, $reason);
            if($result){
                $message = "<span style='color: green'> Account successfully cancelled. We are sorry to see you go. </br>
                Thank you for using Digital Private Eye.</br></span>";
                header("refresh: 5; index.php");
            }
            else{
                $message = "<span style='color: red'> We are unable to retrieve account details for cancellation.
                            Please <a href='contact.php'> Contact Us</a></br>.</span>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
  <head>
    <meta charset="utf-8">
    <title>Registration Cancellation- Digital Private Eye</title>
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
          <h1>Unregister Account</h1>
            <?=$message;?>
            <div class="form-group">
                <div class="controls">
                    <input type="text" name="email" class="form-control text requiredField" placeholder="Your Email Address" value ="<?=$email;?>" readonly>
                </div><!-- end controls -->
            </div><!-- end form group -->
            <div class="form-group">
                <div class="controls"><?=$cancellationResult;?>
                    <textarea name="reason" class="form-control text requiredField" rows="6" placeholder="Please tell us why you are cancelling."
                              style="resize: none;"><?=$reason;?></textarea>
                </div><!-- end controls -->
            </div><!-- end form group -->
            <div class="form-group">
                <div class="controls" style="text-align: left;">
                    <img src="img/captcha/<?=$captchaUrl;?>.png" style="height: 40px;width: 100px; border: 0px #cccccc solid;"><?=$captchaResult;?>
                </div><!-- end controls -->
            </div><!-- end form group -->
            <div class="form-group">
                <div class="controls">
                    <input type="text" name="captcha" class="form-control text requiredField" placeholder="Enter the letters displayed above">
                </div><!-- end controls -->
            </div><!-- end form group -->
          <div class="form-group">
            <div class="controls">
                <input type="hidden" name="captcha_value" value="<?=$captchaUrl;?>" class="hidden" id="Form_Form_SecurityID" />
                <input type="hidden" name="uid" value="<?=$uid;?>" class="hidden" />
              <button class="btn btn-lg btn-block btn-purple" type="submit">Unregister account</button>
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
