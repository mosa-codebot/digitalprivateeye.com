<?php
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }
    include_once("logic/Devices.php");
    include_once("logic/Nav.php");
    $devicesModel = new Devices();
    $devices = $devicesModel->getDevices();

    $navModel = new Nav();
    $registeredDevicesCount = 1000 + $navModel->getRegisteredDevicesCount();
    $devicesModel->logIp($_SERVER['REMOTE_ADDR'], $_SERVER['REQUEST_URI']);
    
    $userId = null;
    if(array_key_exists("user_id", $_SESSION)) $userId = $_SESSION['user_id'];
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=1425747427668739";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<div class="navbar navbar-inverse navbar-fixed-top" id="navbar">
    <div class="navbar-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                    <a href="#none" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="fa fa-bars"></span>
                        <span class="btn-navbar-text">Menu</span>
                    </a>
                    <a class="brand" href="index.php" id="home_link"><span class="logo"></span> <?=APPLICATION_NAME;?></a>
                    <div class="navbar-collapse collapse">
                        <div class="nav-menu pull-left">
                            <ul class="nav nav-pills">
                                 <?php
                                    if(!$userId) {?>
                                        <li><a href="how-it-works.php">How it works</a></li>
                                <?php } ?>
                                <li class="dropdown">
                                    <a href="#none" class="dropdown-toggle" data-toggle="dropdown">Downloads <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                    <li><a href="play-downloads.php">Downloads with Google Play Store</a></li>
                                    <li><a href="apk-downloads.php">APK Downloads</a></li>
                                    </ul>
                                </li>
                                <?php
								if($userId) 
								{
                                echo  "<li class=\"dropdown\">
                                    <a href=\"#none\" class=\"dropdown-toggle\" onclick='' data-toggle=\"dropdown\">Coupons/Payment <b class=\"caret\"></b></a>
                                    <ul class=\"dropdown-menu\">";
                                       echo "<li><a href=\"coupons.php\">My Coupons</a></li>";
                                       echo " <li><a href=\"payment.php\">Payment</a></li>
                                    </ul>
                                </li>";
								}
				else {
					echo"<li><a href=\"payment.php\">Payments</a></li>";
				}

                                if($userId)   {
                                    echo " <li class=\"dropdown\">
                                    <a href=\"#none\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Devices <b class=\"caret\"></b></a>
                                    <ul class=\"dropdown-menu\">";

                                    if(!$devices) echo "<li><a href=\"#none\">No Devices Found</a></li>";
                                    else {
                                            foreach($devices as $device)
                                            {
                                                $deviceName = $device['deviceId'];
                                                if($device['description']!= "Unlabelled Device") $deviceName = $device['description'];
                                                $deviceId = $device['deviceId'];
                                                $description = $device['description'];
                                                echo "<li><a href=\"devices.php#".$deviceName."\">".$deviceName."</a></li>";
                                            }
                                }
                                echo "</ul> </li>";
                                }
                                ?>

                                <li class="dropdown">
                                    <a href="#none" class="dropdown-toggle" data-toggle="dropdown">Information <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="about.php">About</a></li>
                                        <li><a href="blog.php">Blog</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                        <li><a href="faqs.php">FAQs</a></li>
                                        <li><a href="guide.php">User Guide &amp; Documentation</a></li>
                                        <li><a href="privacy-policy.php">Privacy Policy</a></li>
                                        <li><a href="terms-of-use.php">Terms &amp; Conditions</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- end nav-menu -->
                        <div class="nav-user pull-right">
                            <ul class="nav nav-user-options">
                                <?php
                                    if(!$userId) 
                                        echo "<li class=\"login\"><a href=\"sign-in.php\" class=\"btn btn-light\">Login</a></li>";
                                    if(!$userId) 
                                        echo "<li class=\"signup\"><a href=\"registration.php\" class=\"btn btn-purple\">Register</a></li>";
                                    if(!$userId) {
                                        //echo "<li class=\"login\"><a href=\"sign-in.php?guest\" class=\"btn btn-pink\">Sample Login</a></li>";
                                    }
                                    else echo "<li class=\"login\"><a href=\"sign-out.php\" class=\"btn btn-light\">Logout</a></li>";
                                    $registeredDevicesCount = 3000;
                                ?>
                                <!--<div style = 'text-align: right; font-size: small'><span style="color: gold; font-size: x-large"><?=$registeredDevicesCount?> </span>Devices Registered</div>-->
                                
                            </ul>


                        </div><!-- end nav-user -->
                    </div><!-- end navbar-collapse -->
                </div><!-- end col-md-12 -->
            </div><!-- end row fluid -->
        </div><!-- end container -->
    </div><!-- end navbar-inner -->
</div><!-- end navbar -->

<!--
<div class="row">
        <div class="col-md-3 col-md-offset-9">
            <div style = 'text-align: right; font-size: small'>Over <span style="color: gold; font-size: x-large"><?=$registeredDevicesCount?> </span>Devices Registered
                <span style="color: gold; font-size: x-large; padding-left: 20px;">
                    <div class="fb-like" data-href="https://www.facebook.com/pages/Digital-Private-Eye/703312569701920" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                </span>
            </div>
        </div>
</div>

-->