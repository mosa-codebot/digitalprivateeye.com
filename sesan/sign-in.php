<?php
    session_start();
    if(($_SESSION["user_id"] == "Sesan") && ($_SESSION["is"] == "Admin")) header( 'Location: users.php' ) ;

    include_once("../logic/Devices.php");
    $devices = new Devices();

    if($_POST)
    {
        if($devices->adminSignIn($_POST["username"], $_POST['password']))
        {
            $_SESSION["user_id"] = "Sesan";
            $_SESSION["is"] = "Admin";
        }
        else $statusMessage= "<p style='color: red;'>Invalid Login</p>";
    }
?>


<?php include_once("header.php");?>

<body>
  <!--<![endif]-->


  <?php include("nav-bar.php");?>

  <div class="container-fluid">
        
        <div class="row-fluid">
    <div class="dialog span4">
        <div class="block">
            <div class="block-heading">Sign In</div>
            <div class="block-body">
                <form action="#" method="post">
                    <?=$statusMessage;?>
                    <label>Username</label>
                    <input type="text" class="span12" name="username">
                    <label>Password</label>
                    <input type="password" class="span12" name="password">
                    <div>
                        <button class="btn btn-primary">Sign In</button>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.onload=function(){
        var isAdmin = "<?php echo $_SESSION["is"]; ?>";
        if(isAdmin=="Admin")
        {
            location.replace("users.php");
        }
    };

</script>

</body>
</html>
