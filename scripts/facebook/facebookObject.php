<?php
  require_once("facebook-php-sdk/src/facebook.php");

  $config = array(
      'appId' => '1425747427668739',
      'secret' => '010f106f49d577dded0b77d250786541');

  $facebook = new Facebook($config);

$user = $facebook->api('/sesan.adekunle.5');

var_dump($user);
