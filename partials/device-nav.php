<?php
$downloadHref = "";
if(basename($_SERVER['PHP_SELF'])=="device-texts.php") $downloadHref = "device-texts-pdf.php?device=";
else if(basename($_SERVER['PHP_SELF'])=="device-call-logs.php") $downloadHref = "device-call-logs-pdf.php?device=";
else if(basename($_SERVER['PHP_SELF'])=="device-contacts.php") $downloadHref = "device-contacts-pdf.php?device=";
else if(basename($_SERVER['PHP_SELF'])=="device-locations.php") $downloadHref = "device-locations-pdf.php?device=";
?>

<div class="col-sm-3">
    <ul class="nav nav-pills nav-stacked bs-docs-nav" data-spy="affix" data-offset-top="250" data-offset-bottom="350">
        <li><a  class="list-group-item"href="javascript: location.reload();" onclick='showLoadingDiv()'>Refresh Results&nbsp&nbsp<i style="color: green;" class="fa fa-refresh fa-2x"></i> </a></li>
        <li><a  class="list-group-item"target="_blank" href="<?=$downloadHref;?><?=$deviceId?>" >Download Pdf&nbsp&nbsp<i class="fa fa-file-pdf-o fa-2x"></i>  </a></li>
    </ul>

    <ul class="nav nav-pills nav-stacked bs-docs-nav" data-spy="affix" data-offset-top="250" data-offset-bottom="350">
        <li><a  class="list-group-item" href="devices.php" onclick='showLoadingDiv()'>Devices</a></li>
        <li><a  class="list-group-item" href="device-contacts.php?device=<?=$deviceId?>" onclick='showLoadingDiv()'>Contacts</a></li>
        <li><a  class="list-group-item" href="device-call-logs.php?device=<?=$deviceId?>" onclick='showLoadingDiv()'>Call Logs</a></li>
        <li><a  class="list-group-item" href="device-texts.php?device=<?=$deviceId?>" onclick='showLoadingDiv()'>Text Messages</a></li>
        <li><a  class="list-group-item" href="device-locations.php?device=<?=$deviceId?>" onclick='showLoadingDiv()'>Locations</a></li>
    </ul>
</div>