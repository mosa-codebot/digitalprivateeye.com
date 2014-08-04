<?php
    session_start();
    if(($_SESSION["is"] != "Admin")) header( 'Location: sign-in.php' ) ;
    include_once("../logic/Devices.php");
    $devices = new Devices();
    $users = $devices->getAllUsers();
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
            <h1 class="page-title">Users</h1>

<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Username</th>
          <th >#Logins</th>
          <th ></th>
        </tr>
      </thead>
      <tbody>


      <?php

      foreach($users as $user)
      {
          $userId = $user['user_id'];
          $firstName = $user['firstName'];
          $lastName = $user['lastName'];
          $username = $user['username'];
          $lastLogin = $user['last_login'];
          $totalLogins = $user['total_logins'];
        echo "
        <tr>
          <td>$username</td>
          <td>$firstName $lastName</td>
          <td>$totalLogins</td>
          <td>
              <a href=\"user-delete.php?user_id=$userId\" role=\"button\" data-toggle=\"modal\"><i class=\"icon-remove\"></i></a>
          </td>
        </tr>
        ";

      }

      ?>

      </tbody>
    </table>
</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel"><?php echo " jj" ?>Delete Confirmation</h3>
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


