<?php
/**
 file dao.php
 begin April 4th, 2012
 @author Mosadoluwa Adekunle
 @copyright Software Chefs www.softwarechefs.com
*/

require_once("DBConnection.php");

class dao
{
    protected $db_connection;
	/*=== Constructor ===*/
    public function __construct()
    {
	$this->db_connection = getDBConnection();//connect this db
    }

    private function RunSql($sql)
    {
    	$this->ConnectDataStore();
        $result = mysql_query($sql);
        if ($result) return true;
	}		
	
    private function ConnectDataStore()
    {
    	if (!mysql_ping($this->db_connection)) $this->db_connection = getDBConnection();//connect this db
	}

    public function getMediaEntries()
    {
        $sql = "SELECT * FROM media";
        $query_result = mysql_query($sql);
        while($row = mysql_fetch_assoc($query_result))
        {
            $result_data_array[] = $row;
        }
        if (count($result_data_array)) return $result_data_array;
        return null;
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM `users` ORDER BY username";
        $query_result = mysql_query($sql);
        while($row = mysql_fetch_assoc($query_result))
        {
            $result_data_array[] = $row;
        }
        if (count($result_data_array)) return $result_data_array;
        return null;
    }

    public function deleteUser($userId)
    {
       $sql = "DELETE FROM `users` WHERE user_id = $userId";
       mysql_query($sql);
    }

    public function deleteUserWEmailUserId($email,$userId)
    {
       $sql = "DELETE FROM `users` WHERE user_id = '$userId' AND username = '$email'";
       return mysql_query($sql);
    }

    public function getSqlData($sql)
    {
        $result_data_array = array();
        try{
            $connection = $this->db_connection;
            if(!mysql_ping($connection))$connection = getDBConnection ();
            
            
            $query_result = mysql_query($sql, $connection);
            if($query_result){
                while($row = mysql_fetch_assoc($query_result))
                {
                    $result_data_array[] = $row;
                }
                if (count($result_data_array)) {
                    return $result_data_array;
                }
            }
            return null;
        }
        catch(Exception $e){
            echo $e;
        }
    }

    public function getBlogEntries()
    {
        $sql = "SELECT * FROM blog ORDER BY `date` DESC";
        $query_result = mysql_query($sql);
        while($row = mysql_fetch_assoc($query_result))
        {
            $result_data_array[] = $row;
        }
        if (count($result_data_array)) return $result_data_array;
        return null;
    }

    /**
     * Retrieves a user's credentials from the users table.
     * @param $username
     * @return null
     */
    public function getUserCredentials($username)
    {
        $sql = "SELECT * FROM users where username = '".$username."'";
        $query_result = mysql_query($sql);
        while($row = mysql_fetch_assoc($query_result))
        {
            $result_data_array[] = $row;
        }
        if (count($result_data_array)) return $result_data_array[0];
        return null;
    }

    /**
     * Retrieves a user's credentials from the users table by Id
     * @param $id
     * @internal param $username
     * @return null
     */
    public function getUserCredentialsById($id)
    {
        $sql = "SELECT * FROM users where user_id = '".$id."'";
        $query_result = mysql_query($sql);
        while($row = mysql_fetch_assoc($query_result))
        {
            $result_data_array[] = $row;
        }
        if (count($result_data_array)) return $result_data_array[0];
        return null;
    }

    /**
     * Retrieves a user's credentials from the users table by Id & AuthToken
     * @param $id
     * @param $authToken
     * @internal param $username
     * @return null
     */
    public function getUserCredentialsByIdAndAuthToken($id, $authToken)
    {
        $sql = "SELECT * FROM users where user_id = '".$id."' AND auth_token = '".$authToken."'";
        $query_result = mysql_query($sql);
        while($row = mysql_fetch_assoc($query_result))
        {
            $result_data_array[] = $row;
        }
        if ($result_data_array)
        {
            if (count($result_data_array)) return $result_data_array[0];
            return null;
        }
        else return null;
    }

    /**
     * Retrieves a user's credentials from the users table using user Id
     * @param $userId
     * @internal param $username
     * @return null
     */
    public function getUserProfileDataById($userId)
    {
        $sql = "SELECT * FROM users where user_id = '".$userId."'";
        $query_result = mysql_query($sql);
        while($row = mysql_fetch_assoc($query_result))
        {
            $result_data_array[] = $row;
        }
        if (count($result_data_array)) return $result_data_array[0];
        return null;
    }


    /**
     * Adds an Ip address to the visits table
     * @param $name
     * @param $url
     * @internal param $email
     * @return bool
     */
    public function logIp($name, $url)
    {
        $sql = "INSERT INTO `visits` (ip, url) VALUES ( '".$name."', '".$url."')";
        return $this->RunSql($sql);
    }


    /**
     * Saves a deregistered email address into the database.
     * @param $email
     * @param $reason
     * @return bool
     */
    public function saveDeregisteredUser($email, $reason)
    {
        $deregistrationDate = time();
        $sql = "INSERT INTO `deregistered_users` (email, reason, deregistration_date) VALUES ( '".$email."', '".$reason."', '".$deregistrationDate."')";
        return $this->RunSql($sql);
    }


    /**
     * Adds a payment to the payments table
     * @param $name
     * @param $email
     * @return bool
     */
    public function addPaymentToPaymentDatabase($userId, $data)
    {
        $sql = "INSERT INTO `payments` (`id`, `user_id`, `value`) VALUES ('".$data['txn_id']."', '".$userId."', '".$data['item_number']."');";
        return $this->RunSql($sql);
    }

    /**
     * Adds ipn data from post data array.
     * @param unknown $data
     * @return boolean
     */
    public function addIpn($data)
    {
    	$set =  "(";    			
    	$values = "(";
    	
    	foreach ($data as $key=>$value){
    		$set =  $set ."`".$key."`, ";
    		$values =  $values ."\"" .$value."\", ";
    	}
    	
    	$set =  substr($set, 0, -2) .")";
    	$values =  substr($values , 0, -2) .")";    

        $sql = "INSERT INTO `paypal_ipn_data` ".$set. "VALUES ". $values.";";
        return $this->RunSql($sql);
    }

    /**
     * Adds paypal information data from get data array.
     * @param unknown $data
     * @return boolean
     */
    public function savePaypalPayment($data)
    {
    	$set =  "(";    			
    	$values = "(";
    	
    	foreach ($data as $key=>$value){
    		$set =  $set ."`".$key."`, ";
    		$values =  $values ."\"" .$value."\", ";
    	}
    	
    	$set =  substr($set, 0, -2) .")";
    	$values =  substr($values , 0, -2) .")";    

        $sql = "INSERT INTO `paypal_payments` ".$set. "VALUES ". $values.";";
        return $this->RunSql($sql);
    }

    public function addPayment($txnId,$amount,$userId)
    {
        $sql = "INSERT INTO `payments` (`id`, `value`, `user_id`) VALUES ('$txnId', '$amount', '$userId') ;";
        return $this->RunSql($sql);
    }

    public function addFacebookBonus($time, $userId)
    {
        $sql = "INSERT INTO `facebook_bonus_time` (`user_id`, `days_to_add`) VALUES ('$userId', '$time');";
        return $this->RunSql($sql);
    }

    public function addBonusTime($time, $userId)
    {
        $sql = "INSERT INTO `bonus_time` (`user_id`, `days_to_add`) VALUES ('$userId', '$time');";
        return $this->RunSql($sql);
    }

    public function addResetEmailPasswordList($email)
    {
        $sql = "INSERT INTO `reset_password_list` (`email`) VALUES ('$email');";
        return $this->RunSql($sql);
    }

    public function userExists($email)
    {
        $sql = "SELECT * FROM `users` WHERE username = '$email';";
        $query_result = mysql_query($sql);
        while($row = mysql_fetch_assoc($query_result))
        {
            $result_data_array[] = $row;
        }
        if (count($result_data_array)) return $result_data_array;
        return null;
    }

    public function resetEmailAlreadyAdded($email)
    {
        $sql = "SELECT * FROM `reset_password_list` WHERE email = '$email';";
        $query_result = mysql_query($sql);
        while($row = mysql_fetch_assoc($query_result))
        {
            $result_data_array[] = $row;
        }
        if (count($result_data_array)) return $result_data_array;
        return null;
    }

    /**
     * Adds an message to the messages table
     * @param $name
     * @param $email
     * @param $message
     * @return bool
     */
    public function insertNewMessage($name, $email, $message)
    {
        $sql = "INSERT INTO `messages` (name, email_from, message) VALUES ( '".$name."', '".$email."', '".$message."')";
        return $this->RunSql($sql);
    }

    /**
     * Adds a user to the newsletter table
     * @param $email
     * @internal param $name
     * @return bool
     */
    public function insertIntoNewsletterTable($email)
    {
        $sql = "INSERT INTO `newsletter_recipients` (email) VALUES ('".$email."')";
        return $this->RunSql($sql);
    }

    /**
     * Inserts user registration data into the database.
     * @param $fName
     * @param $lName
     * @param $email
     * @param $password
     * @param null $userId
     * @param null $hear_about_us
     * @return bool
     */
    public function insertUserRegistrationData($fName, $lName, $email, $password, $userId=null, $hear_about_us = null)
    {
        if($password)
        {
            if($hear_about_us)
            {
                $sql = "UPDATE  `users` SET `firstName`='$fName', `lastName`='$lName', `password`='$password', `hear_about_us`='$hear_about_us' WHERE `username` = '$email'";
            }
            else
            {
                $sql = "UPDATE  `users` SET `firstName`='$fName', `lastName`='$lName', `password`='$password' WHERE `username` = '$email'";
            }
        }
        else
            $sql = "UPDATE  `users` SET `firstName`='$fName', `lastName`='$lName' WHERE `username` = '$email' AND `user_id` = '$userId'";
        return $this->RunSql($sql);
    }

    public function verifyEmailAddress($email)
    {
        $sql = "UPDATE  `users` SET `verified`='1' WHERE `username` = '$email'";
        return $this->RunSql($sql);
    }

    /**
     * Update's a user's device description.
     * @param $userId
     * @param $deviceDescription
     * @param $device
     * @return bool
     */
    public function updateDeviceDescription($userId, $deviceDescription, $device)
    {
        $sql = "UPDATE  `devices`  SET `description` = \"$deviceDescription\" WHERE `devices`.`user_id` =$userId AND `devices`.`deviceId` = '$device'";
        return $this->RunSql($sql);
    }


    /**
     * @param $password
     * @param $userId
     * @param $authToken
     * @return bool
     */
    public function updatePassword($password, $userId, $authToken)
    {
        $sql = "UPDATE  `users`  SET `password` = \"$password\" WHERE `user_id` =$userId AND `auth_token` = '$authToken'";
        return $this->RunSql($sql);
    }

    /**
     * Logs a users login time.
     * @param $userId
     * @param $date
     * @return bool
     */
    public function logLoginTime($userId, $date)
    {
        $sql = "UPDATE  `users`  SET `last_login` = \"$date\" WHERE `user_id` =$userId";
        return $this->RunSql($sql);
    }


    public function increaseTotalLogins($userId)
    {
        $sql = "UPDATE `users` SET `total_logins` = `total_logins` + 1 WHERE `user_id` =$userId";
        return $this->RunSql($sql);
    }

    /**
     * Returns a list of user devices
     * @param $userId
     * @return bool
     */
    public function getUserDevices($userId)
    {
        $sql = "SELECT * FROM devices WHERE user_id = $userId ORDER BY status DESC";
        return $this->getSqlData($sql);
    }

    /**
     * Returns a list of user devices
     * @param $transactionId
     * @internal param $userId
     * @return bool
     */
    public function getUserFromTransactionId($transactionId)
    {
        $sql = "SELECT * FROM `paypal_payments` WHERE tx = '$transactionId'";
        file_put_contents("sql", $sql);
        return $this->getSqlData($sql);
    }

    /**
     * Returns a list of user devices
     * @param $userId
     * @return bool
     */
    public function getUserCoupons($userId)
    {
        $sql = "SELECT * FROM payment_coupons WHERE user_id = $userId ORDER BY used ASC";
        $couponsArray = $this->getSqlData($sql);
        return $couponsArray;
    }

    /**
     * Returns a list of user devices
     * @param $userId
     * @param $couponCode
     * @return bool
     */
    public function validCoupon($userId, $couponCode)
    {
        $sql = "SELECT * FROM payment_coupons WHERE user_id = $userId AND coupon_code = '$couponCode' AND used='0'";
        return $this->getSqlData($sql);
    }

    /**
     * Returns a list of user devices
     * @param $deviceId
     * @param int $days
     * @internal param $userId
     * @internal param $couponCode
     * @return bool
     */
    public function applyCoupon($deviceId, $days=30)
    {
        $sql = "SELECT expiry_date FROM `devices` WHERE devices.deviceId = '$deviceId';";
        $expiryDateRow = $this->getSqlData($sql);
        $expiryDate = $expiryDateRow[0];
        
        if($expiryDate)
        {
        	$expiryDate = $expiryDate["expiry_date"];
        	if($expiryDate >=time()) 
        		$expiryDate = $expiryDate;//If expiry date is greater than current date time add to expiry date
        	else
        		$expiryDate = time();//If expiry date is before current moment use current moment as expiry date.
        	$newDate = (int)$expiryDate + (86400 * $days);
        	$sql = "UPDATE `devices` SET `expiry_date` = '$newDate' WHERE `devices`.`deviceId` = '$deviceId';";
        	return $this->RunSql($sql);
        }            
        return false;
    }

    /**
     * Set coupon code as used.
     * @param $couponCode
     * @return bool
     */
    public function setCouponUsed($couponCode)
    {
        $sql = "UPDATE `payment_coupons` SET `used` = '1' WHERE `coupon_code` = '$couponCode';";
        return $this->RunSql($sql);
    }

    /**
     * Returns a count of all registered devices.
     * @param $userId
     * @return bool
     */
    public function getRegisteredDevicesCount($userId)
    {
        $sql = "COUNT (deviceId) FROM devices";
        return $this->getSqlData($sql);
    }

    /**
     * Returns a list of devices contacts
     * @param $userId
     * @param $deviceId
     * @param $page
     * @return bool
     */
    public function getDeviceContacts($userId, $deviceId, $page)
    {        
        if(!$page) $page=1;
        $startLimit = 0;
        $endLimit = 15;
        if($page > 1) $startLimit = ($page-1) * 15;
        $sql = "SELECT * FROM contacts LEFT JOIN devices ON (contacts.deviceId = devices.deviceId)
                WHERE user_id = $userId AND devices.deviceId = '$deviceId'
                ORDER BY contacts.name ASC LIMIT $startLimit, $endLimit";
        return $this->getSqlData($sql);
    }

    /**
     * Returns a list of devices contacts
     * @param $userId
     * @param $deviceId
     * @return bool
     */
    public function getDeviceAllContacts($userId, $deviceId)
    {
        $sql = "SELECT * FROM contacts LEFT JOIN devices ON (contacts.deviceId = devices.deviceId)
                WHERE user_id = $userId AND devices.deviceId = '$deviceId'
                ORDER BY contacts.name ASC LIMIT 0,500";
        return $this->getSqlData($sql);
    }

    /**
     * Returns total number of a devices contacts //Used for pagination.
     * @param $userId
     * @param $deviceId
     * @return bool
     */
    public function getDeviceContactsTotalNoRecords($userId, $deviceId)
    {
        $sql = "SELECT COUNT(*) as no FROM `contacts` WHERE deviceId = '$deviceId'";
        $pageNoArray = $this->getSqlData($sql);
        return $pageNoArray[0]['no'];
    }

    /**
     * Returns a device's call logs
     * @param $userId
     * @param $deviceId
     * @param $page
     * @return bool
     */
    public function getDeviceCallLogs($userId, $deviceId, $page)
    {
        if(!$page) $page=1;
        $startLimit = 0;
        $endLimit = 15;
        if($page > 1) $startLimit = ($page-1) * 15;
        $sql = "SELECT * FROM call_logs LEFT JOIN devices ON (call_logs.deviceId = devices.deviceId)
                WHERE user_id = $userId AND devices.deviceId = '$deviceId' ORDER BY call_logs.date DESC LIMIT $startLimit, $endLimit";
       /*$sql = "
       SELECT * FROM (SELECT call_logs.* FROM call_logs  LEFT JOIN devices ON (call_logs.deviceId = devices.deviceId)
                WHERE user_id = $userId AND devices.deviceId = '$deviceId') as device_call_logs
                LEFT JOIN (
                  SELECT * FROM contacts where deviceId = '$deviceId') as device_contacts
                ON (device_contacts.telephone_number = device_call_logs.telephone_number)
                ORDER BY device_call_logs.date DESC LIMIT $startLimit, $endLimit";*/
        return $this->getSqlData($sql);
    }

    /**
     * Returns a device's call logs
     * @param $userId
     * @param $deviceId
     * @return bool
     */
    public function getDeviceAllCallLogs($userId, $deviceId)
    {
        $sql = "SELECT * FROM call_logs LEFT JOIN devices ON (call_logs.deviceId = devices.deviceId)
                WHERE user_id = $userId AND devices.deviceId = '$deviceId' ORDER BY call_logs.date DESC LIMIT 0,500";
        return $this->getSqlData($sql);
    }

    /**
     * Returns a device's call logs
     * @param $userId
     * @param $deviceId
     * @return bool
     */
    public function getDeviceCallLogsTotalNoRecords($userId, $deviceId)
    {
        $sql = "SELECT COUNT(*) as no FROM `call_logs` WHERE deviceId = '$deviceId'";
        $pageNoArray = $this->getSqlData($sql);
        return $pageNoArray[0]['no'];
    }

    /**
     * Returns a device's texts
     * @param $userId
     * @param $deviceId
     * @param $page
     * @return bool
     */
    public function getDeviceTexts($userId, $deviceId, $page)
    {
        if(!$page) $page=1;
        $startLimit = 0;
        $endLimit = 15;
        if($page > 1) $startLimit = ($page-1) * 15;
        $sql = "SELECT * FROM text_messages LEFT JOIN devices ON (text_messages.deviceId = devices.deviceId) WHERE
                user_id = $userId AND devices.deviceId = '$deviceId' ORDER BY text_messages.date DESC LIMIT $startLimit, $endLimit";
        return $this->getSqlData($sql);
    }

    /**
     * Returns a device's texts
     * @param $userId
     * @param $deviceId
     * @param $page
     * @return bool
     */
    public function getDeviceTelephoneTexts($userId, $deviceId, $telephoneNumber, $limit=true)
    {
        if($limit==true) $limit = " LIMIT 0,400";
        $sql = "SELECT * FROM text_messages LEFT JOIN devices ON (text_messages.deviceId = devices.deviceId) WHERE
                user_id = $userId AND text_messages.telephone_number LIKE '%$telephoneNumber%' AND devices.deviceId = '$deviceId'
                ORDER BY text_messages.date DESC $limit";
        return $this->getSqlData($sql);
    }

    /**
     * Returns a device's texts people
     * @param $deviceId
     * @internal param $userId
     * @return bool
     */
    public function getDeviceTextsPeople($deviceId)
    {
        $sql = "SELECT telephone, name, text_date FROM (SELECT text_messages.telephone_number as telephone, MAX(date) as text_date FROM text_messages WHERE
                text_messages.deviceId = '$deviceId' GROUP BY(telephone)) as numbers LEFT JOIN (SELECT * FROM contacts WHERE deviceId=  '$deviceId')
                as deviceContacts on RIGHT(deviceContacts.telephone_number, 7) = RIGHT(numbers.telephone, 7) ORDER BY text_date DESC";
        return $this->getSqlData($sql);
    }
    
    public function getDeviceTextsPhoneNumberWPage($deviceId, $phoneNumber, $page)
    {
        $numResults = 20;
        $start= ($page *$numResults) - $numResults;
        $limit = $numResults * $page;
        $numToCompare = substr($phoneNumber, -7);
        $sql = "SELECT * FROM text_messages WHERE deviceId = '$deviceId' AND telephone_number LIKE '%$numToCompare%' ORDER BY date DESC LIMIT $start, $limit ";
        return $this->getSqlData($sql);
    }
    
    /**
     * Returns a device's texts
     * @param $userId
     * @param $deviceId
     * @return bool
     */
    public function getDeviceAllTexts($userId, $deviceId)
    {
        $sql = "SELECT * FROM text_messages LEFT JOIN devices ON (text_messages.deviceId = devices.deviceId) WHERE
                user_id = $userId AND devices.deviceId = '$deviceId' ORDER BY text_messages.date DESC LIMIT 0,500";
        return $this->getSqlData($sql);
    }

    /**
     * Returns a device's texts no of pages
     * @param $userId
     * @param $deviceId
     * @internal param $page
     * @return bool
     */
    public function getDeviceTextsPages($userId, $deviceId)
    {
        $sql = "SELECT COUNT(*) as no FROM `text_messages` WHERE deviceId = '$deviceId'";
        $pageNoArray = $this->getSqlData($sql);
        return $pageNoArray[0]['no'];
    }

    /**
     * Returns a device's info.
     * @param $userId
     * @param $deviceId
     * @return bool
     */
    public function getDeviceInfo($userId, $deviceId)
    {
        $sql = "SELECT * FROM devices WHERE user_id = $userId AND devices.deviceId = '$deviceId'";
        return $this->getSqlData($sql);
    }

    /**
     * Returns a device's locations
     * @param $userId
     * @param $deviceId
     * @param $page
     * @return bool
     */
    public function getDeviceLocations($userId, $deviceId, $page)
    {
        if(!$page) $page=1;
        $startLimit = 0;
        $endLimit = 10;
        if($page > 1) $startLimit = ($page-1) * 10;
        $sql = "SELECT * FROM gps_locations LEFT JOIN devices ON (gps_locations.deviceId = devices.deviceId) WHERE
                user_id = $userId AND devices.deviceId = '$deviceId' ORDER BY gps_locations.date DESC LIMIT $startLimit, $endLimit";
        return $this->getSqlData($sql);
    }

    /**
     * Returns a device's locations
     * @param $userId
     * @param $deviceId
     * @return bool
     */
    public function getDeviceAllLocations($userId, $deviceId)
    {
        $sql = "SELECT * FROM gps_locations LEFT JOIN devices ON (gps_locations.deviceId = devices.deviceId) WHERE
                user_id = $userId AND devices.deviceId = '$deviceId' ORDER BY gps_locations.date DESC  LIMIT 0,500";
        return $this->getSqlData($sql);
    }

    /**
     * Returns a device's locations total no of records
     * @param $userId
     * @param $deviceId
     * @return bool
     */
    public function getDeviceLocationsTotalNoRecords($userId, $deviceId)
    {
        $sql = "SELECT COUNT(*) as no FROM gps_locations WHERE deviceId = '$deviceId'";
        $pageNoArray = $this->getSqlData($sql);
        return $pageNoArray[0]['no'];
    }
}