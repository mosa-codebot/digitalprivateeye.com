<?php

include('dao.php');

$dao = new dao();
$entries = $dao->getBrokenTimeEntries();

foreach($entries as $entry)
{
	$time = $entry["epoch"] . "000";
	$id = $entry["id"];
	$fix = $dao->updateTextWithFixedTime($id, $time);
	var_dump($id);
}

