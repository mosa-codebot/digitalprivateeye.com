<?php
/**
 file dao.php
 begin April 4th, 2012
 @author Mosadoluwa Adekunle
 @copyright Made Software Ltd
*/

class dao
{
    private $host = "localhost";
    private $userName = "root";
    private $password = "root";
    private $dbName = "digitalprivateeye";

    public function __construct()
    {
	$this->db_connection = mysqli_connect($this->host,$this->userName,$this->password,$this->dbName);

	if (mysqli_connect_errno())
        {
	    echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }

    //Returns all non guest account devices
    public function getAllNoneGuestDevices()
    {
        $sql = "SELECT * FROM `devices` LEFT JOIN users ON (devices.user_id = users.user_id) WHERE users.user_id != 1";
	$query = mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$query);
	$result_data_array = array();
	while($row = mysqli_fetch_assoc($query))
	{
            $result_data_array[] = $row;
        }
        return $result_data_array;
    }

    public function getUnwelcomedDevices()
    {
        $sql = "SELECT * FROM `devices` LEFT JOIN users ON (devices.user_id = users.user_id) WHERE devices.welcome_sent = '0' AND users.verified = '1';";
	$query = mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$query);

	$result_data_array = array();
	while($row = mysqli_fetch_assoc($query))
	{
            $result_data_array[] = $row;
        }
        return $result_data_array;
    }
    
    public function setDeviceWelcomed($deviceId)
    {
        $sql = "UPDATE `devices` SET `welcome_sent` = '1' WHERE `devices`.`deviceId` = '$deviceId';";
	return (mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$query));
    }
    
    public function setMessageSent($id)
    {
        $sql = "UPDATE `messages` SET `sent` = '1' WHERE `id` = '$id';";
	return (mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$query));
    }
    
    public function getExpiringDevices($days)
    {
	$currentDate = time();
	$timeAhead = strtotime("+$days day", $currentDate);
	$timeDiff = 86400 * $days;

        $sql = "SELECT * FROM `devices` LEFT JOIN users ON (devices.user_id = users.user_id) WHERE (devices.expiry_date-$currentDate) < $timeDiff AND devices.expiry_date > $currentDate AND devices.status='1'";
	$query = mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$query);

	$result_data_array = array();
	while($row = mysqli_fetch_assoc($query))
	{
            $result_data_array[] = $row;
        }
        return $result_data_array;
    }

    
    public function getExpiredDevices()
    {
	$currentDate = time();
        $sql = "SELECT * FROM `devices` LEFT JOIN users ON (devices.user_id = users.user_id) WHERE devices.status = '0';";
	$query = mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$query);

	$result_data_array = array();
	while($row = mysqli_fetch_assoc($query))
	{
            $result_data_array[] = $row;
        }
        return $result_data_array;
    }

    
    public function getTrialDevices()
    {
        $sql = "SELECT * FROM `devices` LEFT JOIN users ON (devices.user_id = users.user_id) WHERE devices.trial_expiry_added = '0' AND users.verified='1';";
	$query = mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$query);

	$result_data_array = array();
	while($row = mysqli_fetch_assoc($query))
	{
            $result_data_array[] = $row;
        }
        return $result_data_array;
    }

    
    public function addTrialPeriod($deviceId, $days)
    {
        $sql = "SELECT expiry_date FROM `devices` WHERE devices.deviceId = '$deviceId';";
	$query = mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$query);

	$result_data_array = array();
	$expiryDateRow = mysqli_fetch_row($query);
	$expiryDate = $expiryDateRow[0];
	if($expiryDate)
	{
	    $newDate = strtotime("+$days day", $expiryDate);
	    $sql = "UPDATE `devices` SET `expiry_date` = '$newDate' WHERE `devices`.`deviceId` = '$deviceId';";
	    $timeAdded = mysqli_query($this->db_connection, $sql);
	    if($timeAdded){
		$this->setTrialPeriodAdded($deviceId);
		return true;
		}
        }
        return false;
    }

    
    public function setTrialPeriodAdded($deviceId)
    {
        $sql = "UPDATE `devices` SET `trial_expiry_added` = '1' WHERE `devices`.`deviceId` = '$deviceId';";
        return mysqli_query($this->db_connection, $sql);
    }
    
    public function getActiveDevices()
    {
        $sql = "SELECT * FROM `devices` WHERE `devices`.`status` = '1';";
        $query = mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$query);

	$result_data_array = array();
	while($row = mysqli_fetch_assoc($query))
	{
            $result_data_array[] = $row;
        }
        return $result_data_array;
    }
    
    public function getInActiveDevices()
    {
        $sql = "SELECT * FROM `devices` WHERE `devices`.`status` = '0';";
        $query = mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$query);

	$result_data_array = array();
	while($row = mysqli_fetch_assoc($query))
	{
            $result_data_array[] = $row;
        }
        return $result_data_array;
    }
    
    public function activateDevice($deviceId)
    {
        $sql = "UPDATE `devices` SET `status` = '1' WHERE `devices`.`deviceId` = '$deviceId';";
        return mysqli_query($this->db_connection, $sql);
    }
    
    public function deActivateDevice($deviceId)
    {
        $sql = "UPDATE `devices` SET `status` = '0' WHERE `devices`.`deviceId` = '$deviceId';";
        return mysqli_query($this->db_connection, $sql);
    }
    
    public function getDeleteOldTexts($cutOffPoint)
    {
        $sql = "DELETE FROM `text_messages` WHERE `date` < $cutOffPoint AND deviceId !='h3455555334343434' AND deviceId !='z879jdfjdfgdfgdf'";
        return mysqli_query($this->db_connection, $sql);
    }
    
    public function getDeleteOldCallLogs($cutOffPoint)
    {
        $sql = "DELETE FROM `call_logs` WHERE `date` < $cutOffPoint AND deviceId !='h3455555334343434' AND deviceId !='z879jdfjdfgdfgdf'";
        return mysqli_query($this->db_connection, $sql);
    }
    
    public function getDeleteOldLocations($cutOffPoint)
    {
        $sql = "DELETE FROM `gps_locations` WHERE `date` < $cutOffPoint AND deviceId !='h3455555334343434' AND deviceId !='z879jdfjdfgdfgdf'";
        return mysqli_query($this->db_connection, $sql);
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM `users`";
        $query = mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$query);

        $result_data_array = array();
        while($row = mysqli_fetch_assoc($query))
        {
            $result_data_array[] = $row;
        }
        return $result_data_array;
    }

    public function getUnsentMessages()
    {
        $sql = "SELECT * FROM `messages` WHERE sent='0'";
        $query = mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$query);

        $result_data_array = array();
        while($row = mysqli_fetch_assoc($query))
        {
            $result_data_array[] = $row;
        }
        return $result_data_array;
    }

    public function getUnfunfilledPayments()
    {
        $sql = "SELECT * FROM `payments` WHERE coupon_created='0'";
        $query = mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$query);

        $result_data_array = array();
        while($row = mysqli_fetch_assoc($query))
        {
            $result_data_array[] = $row;
        }
        return $result_data_array;
    } 
    
    public function getUserInfo($userId)
    {
        $sql = "SELECT * FROM `users` WHERE `user_id` = '$userId';";
        $query = mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$query);

	$result_data_array = array();
	while($row = mysqli_fetch_assoc($query))
	{
            $result_data_array[] = $row;
        }
        return $result_data_array[0];
    }
    
    public function setPaymentUsed($paymentId)
    {       
        $sql = "UPDATE `payments` SET `coupon_created` = '1' WHERE `id` = '$paymentId';";
        return mysqli_query($this->db_connection, $sql);
    }

    public function getIncompleteRegistrationUsers()
    {
        $sql = "SELECT * FROM `users` WHERE `firstName` is NULL;";
        $query = mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$query);

	$result_data_array = array();
	while($row = mysqli_fetch_assoc($query))
	{
            $result_data_array[] = $row;
        }
        return $result_data_array;
    }

    
    public function getIncompleteRegistrationUsersOverTwentyFourHoursElapsed()
    {
        $sql = "SELECT *, unix_timestamp(timestamp) as epoch FROM `users` WHERE `firstName` is NULL AND 
		`lastName` is NULL;";
        $query = mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$query);

	$result_data_array = array();
	while($row = mysqli_fetch_assoc($query))
	{
            $result_data_array[] = $row;
        }
        return $result_data_array;
    }

    
    public function getUserDevices($userId)
    {
        $sql = "SELECT * FROM `devices` WHERE `user_id` =$userId;";
        $query = mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$query);

	$result_data_array = array();
	while($row = mysqli_fetch_assoc($query))
	{
            $result_data_array[] = $row;
        }
        return $result_data_array;
    }

    public function deleteDevice($deviceId)
    {
        $sql = "DELETE FROM `devices` WHERE `deviceId` ='$deviceId'";
        return mysqli_query($this->db_connection, $sql);
    }
    
    public function deleteDeviceTexts($deviceId)
    {
        $sql = "DELETE FROM `text_messages` WHERE `deviceId` ='$deviceId'";
        return mysqli_query($this->db_connection, $sql);
    }
    
    public function deleteDeviceCallLogs($deviceId)
    {
        $sql = "DELETE FROM `call_logs` WHERE `deviceId` ='$deviceId'";
        return mysqli_query($this->db_connection, $sql);
    }
    
    public function deleteDeviceLocations($deviceId)
    {
        $sql = "DELETE FROM `gps_locations` WHERE `deviceId` ='$deviceId'";
        return mysqli_query($this->db_connection, $sql);
    }
    
    public function deleteUser($userId)
    {
        $sql = "DELETE FROM `users` WHERE `user_id` ='$userId'";
        return mysqli_query($this->db_connection, $sql);
    }
    
    public function addBoostTime($deviceId, $days)
    {
        $sql = "SELECT expiry_date FROM `devices` WHERE devices.deviceId = '$deviceId';";
	$query = mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$query);

	$result_data_array = array();
	$expiryDateRow = mysqli_fetch_row($query);
	$expiryDate = time();
	if($expiryDate)
	{
	    $newDate = strtotime("+$days day", $expiryDate);
	    $sql = "UPDATE `devices` SET `expiry_date` = '$newDate' WHERE `devices`.`deviceId` = '$deviceId';";
	    $timeAdded = mysqli_query($this->db_connection, $sql);
	    if($timeAdded){
		$this->setTrialPeriodAdded($deviceId);
		return true;
		}
        }
        return false;
    }

    public function getUnverifiedUnmailedDevices()
    {
        $sql = "SELECT * FROM `users` WHERE `verified` = '0' and `verfication_message_sent` = '0';";
	$query = mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$query);

	$result_data_array = array();
	while($row = mysqli_fetch_assoc($query))
	{
            $result_data_array[] = $row;
        }
        return $result_data_array;
    }

    
    public function setVerificationEmailSent($userName)
    {
        $sql = "UPDATE `users` SET `verfication_message_sent` = '1' WHERE `username` = '$userName';";
	return (mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$query));
    }

    
    public function getUnverifiedUsers()
    {
        $sql = "SELECT *, unix_timestamp(timestamp) as epoch FROM `users` WHERE `verified` ='0'";
        $query = mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$query);

	$result_data_array = array();
	while($row = mysqli_fetch_assoc($query))
	{
            $result_data_array[] = $row;
        }
        return $result_data_array;
    }




    public function getUsersToCredit()
    {
        $sql = "SELECT * FROM `facebook_bonus_time` LEFT JOIN users ON (facebook_bonus_time.user_id = users.user_id)  WHERE time_added = 0";
	$query = mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$query);
	$result_data_array = array();
	while($row = mysqli_fetch_assoc($query))
	{
            $result_data_array[] = $row;
        }
        return $result_data_array;
    }

    
    public function addPaymentCoupon($user_id, $coupon_code, $creation_date, $expiry_date, $used, $paymentId, $daysToAdd)
    {
        $sql = "INSERT INTO `payment_coupons` (user_id, coupon_code, creation_date, expiry_date, days_to_add, used) VALUES ( '".$user_id."', '".$coupon_code."', '".$creation_date."', '".$expiry_date."', '".$daysToAdd."', '".$used."')";
	mysqli_query($this->db_connection, $sql);
        return $this->setPaymentUsed($paymentId);
    }
}
