<?php
session_start();
if(($_SESSION["user_id"] != "Sesan") && ($_SESSION["is"] != "Admin")) header( 'Location: sign-in.php' ) ;

include_once("../logic/Devices.php");
$devices = new Devices();
$users = $devices->getAllUsers();

if($_POST)
{
    $time = $_POST["time"];
    $userId = $_POST["user_id"];
    $message = "<div style='color:red;'>Addition of bonus time has failed.</div>";
    if(($time)&&($userId))
    {
        if($devices->addBonusTime($time, $userId))
            $message = "<div style='color:green;'>Bonus time successfully added.</div>";
    }
}
?>


<?php include_once("header.php");?>

<body>
  <!--<![endif]-->


  <?php include("nav-bar.php");?>

    <div class="container-fluid">
        
        <div class="row-fluid">
            <div class="span3">

                <?php include("nav.php")?>
        </div>
        <div class="span9">
            <h1 class="page-title">Add Bonus Time</h1>


<div class="well">
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
          <?=$message;?>
    <form id="addFacebookBonus" method="post" action="#">
        <label>Time</label>
        <select name="time" id="amountDropDown" class="input-xlarge">
            <?php
                for($i=1;$i<=30;$i++)
                {
                    echo "<option value=\"$i\">$i</option>";
                }
            ?>
        </select>
        <label>User</label>
        <select name="user_id" id="userDropDown" class="input-xlarge">
            <?php
                foreach($users as $user)
                {
                    $username = $user["username"];
                    $userId = $user["user_id"];
                    echo "<option value=\"$userId\">$username</option>";
                }
            ?>

    </select>
        <label></label>
        <button class="btn btn-primary" name="save"><i class="icon-save"></i> Save</button>
    </form>
      </div>
  </div>
</div>

        </div>
    </div>


        <?php include_once("footer.php");?>


</body>
</html>


