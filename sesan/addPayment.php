<?php
session_start();
if(($_SESSION["user_id"] != "Sesan") && ($_SESSION["is"] != "Admin")) header( 'Location: sign-in.php' ) ;

include_once("../logic/Devices.php");
$devices = new Devices();
$users = $devices->getAllUsers();

if($_POST)
{
    $txnId = $_POST["txn_id"];
    $amount = $_POST["amount"];
    $userId = $_POST["user_id"];
    $message = "<div style='color:red;'>Addition of payment has failed.</div>";
    if(($txnId)&&($amount)&&($userId))
    {
        if($devices->addPayment($txnId,$amount,$userId))
            $message = "<div style='color:green;'>Payment successfully added.</div>";
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
            <h1 class="page-title">Add Payment</h1>


<div class="well">
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
           <?=$message;?>
    <form id="addPaymentForm" method="post" action="#">
        <label>Transaction Id</label>
        <input type="text" name="txn_id" class="input-xlarge">
        <label>Amount</label>
        <select name="amount" id="amountDropDown" class="input-xlarge">
           <option value="4.99">$4.99</option>
            <option value="9.99">$9.99</option>
            <option value="15.99">$15.99</option>
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
      <div class="tab-pane fade" id="profile">
    <form id="tab2">
        <label>New Password</label>
        <input type="password" class="input-xlarge">
        <div>
            <button class="btn btn-primary">Update</button>
        </div>
    </form>
      </div>
  </div>

</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Confirmation</h3>
  </div>
  <div class="modal-body">
    
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger" data-dismiss="modal">Delete</button>
  </div>
</div>

        </div>
    </div>


        <?php include_once("footer.php");?>


</body>
</html>


