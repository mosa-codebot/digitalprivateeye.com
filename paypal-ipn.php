<?php
	$time = time();
	$postData= $_POST;
	include_once("logic/Devices.php");
	$devicesModel = new Devices();	   
	$devicesModel->processIpn($postData);
		
	//$devicesModel->processIpn($postData);
	//Test
	/*
	include_once("logic/Devices.php");
	$testPost = "{\"handling_amount\":\"0.00\",\"discount\":\"0.00\",\"insurance_amount\":\"0.00\",\"payer_id\":\"J9B7MPAZD54HE\",
					\"address_country_code\":\"CA\",\"btn_id\":\"77630391\",\"ipn_track_id\":\"bafa0cdb345a\",\"address_zip\":\"S7H 4C1\",
					\"shipping\":\"0.00\",\"charset\":\"windows-1252\",\"payment_gross\":\"\",\"address_status\":\"confirmed\",
					\"shipping_discount\":\"0.00\",\"address_street\":\"202, Carleton DR\",\"verify_sign\":\"AFcWxV21C7fd0v3bYYYRCpSSRl31AheyBeoHUD5BQH0UOQR0GflTDKK8\",\"item_name\":\"30 day Subscription - Test\",\"txn_type\":\"web_accept\",\"receiver_id\":\"45DXLY43TVUYC\",\"payment_fee\":\"\",\"mc_currency\":\"CAD\",\"transaction_subject\":\"\",\"shipping_method\":\"Default\",\"custom\":\"\",\"protection_eligibility\":\"Eligible\",\"address_country\":\"Canada\",\"payer_status\":\"verified\",\"first_name\":\"Mosadoluwa\",\"address_name\":\"Mosadoluwa Adekunle\",\"mc_gross\":\"0.10\",\"payment_date\":\"01:05:35 Feb 03, 2014 PST\",\"payment_status\":\"Completed\",\"quantity\":\"1\",\"business\":\"mosa@digitalprivateeye.com\",\"item_number\":\"1\",\"last_name\":\"Adekunle\",\"address_state\":\"Saskatchewan\",\"txn_id\":\"70J30657EN423191Y\",\"mc_fee\":\"0.10\",\"resend\":\"true\",\"payment_type\":\"instant\",\"notify_version\":\"3.7\",\"payer_email\":\"papishears@yahoo.com\",\"receiver_email\":\"mosa@digitalprivateeye.com\",\"address_city\":\"Saskatoon\",\"tax\":\"0.00\",\"residence_country\":\"CA\"}";
	$postArray = json_decode($testPost, true);
	$devicesModel = new Devices();
	$devicesModel->processIpn($postArray);
	*/
?>