<?php
include('dao.php');

$dao = new dao();
$deleteFromDays = 14;

$currentDate = time();
$deleteFromDays = $deleteFromDays + 1;// Add a one day buffer
$daysEpoch = $deleteFromDays * 86400;// One Day
$cutOffPoint = ($currentDate - $daysEpoch) . "000";
$dao->getDeleteOldTexts($cutOffPoint);   
$dao->getDeleteOldCallLogs($cutOffPoint);   
$dao->getDeleteOldLocations($cutOffPoint);   