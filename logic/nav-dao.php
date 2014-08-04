<?php
/**
 file dao.php
 begin April 4th, 2012
 @author Mosadoluwa Adekunle
 @copyright Software Chefs www.softwarechefs.com
*/

require_once("DBConnection.php");

class navDao
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

    public function getSqlData($sql)
    {
        $query_result = mysql_query($sql);
        while($row = mysql_fetch_assoc($query_result))
        {
            $result_data_array[] = $row;
        }
        if (count($result_data_array)) return $result_data_array;
        return null;
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
     * Adds a user to the newsletter table
     * @param $name
     * @param $email
     * @return bool
     */
    public function insertIntoNewsletterTable($name, $email)
    {
        $sql = "INSERT INTO `newsletter_recipients` ( name, email) VALUES ( '".$name."', '".$email."')";
        return $this->RunSql($sql);
    }

    /**
     * Update's a user's device description.
     * @param $userId
     * @param $deviceDescription
     * @return bool
     */
    public function updateDeviceDescription($userId, $deviceDescription, $device)
    {
        $sql = "UPDATE  `devices`  SET `description` = \"$deviceDescription\" WHERE `devices`.`user_id` =$userId AND `devices`.`deviceId` = '$device'";
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
     * Returns a count of all registered devices.
     * @param $userId
     * @return bool
     */
    public function getRegisteredDevicesCount()
    {
        $sql = "SELECT count(*) as total FROM devices";
        $count = $this->getSqlData($sql);
        return $count[0]['total'];
    }

    /**
     * Returns a list of user devices
     * @param $userId
     * @param $deviceId
     * @return bool
     */
    public function getDeviceContacts($userId, $deviceId)
    {
        $sql = "SELECT * FROM contacts LEFT JOIN devices ON (contacts.deviceId = devices.deviceId) WHERE user_id = $userId AND devices.deviceId = '$deviceId' ORDER BY contacts.name ASC";
        return $this->getSqlData($sql);
    }

    /**
     * Returns a device's call logs
     * @param $userId
     * @param $deviceId
     * @return bool
     */
    public function getDeviceCallLogs($userId, $deviceId)
    {
        $sql = "SELECT * FROM call_logs LEFT JOIN devices ON (call_logs.deviceId = devices.deviceId) WHERE user_id = $userId AND devices.deviceId = '$deviceId'";
        return $this->getSqlData($sql);
    }

    /**
     * Returns a device's texts
     * @param $userId
     * @param $deviceId
     * @return bool
     */
    public function getDeviceTexts($userId, $deviceId)
    {
        $sql = "SELECT * FROM text_messages LEFT JOIN devices ON (text_messages.deviceId = devices.deviceId) WHERE user_id = $userId AND devices.deviceId = '$deviceId' ORDER BY text_messages.date DESC";
        return $this->getSqlData($sql);
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
     * @return bool
     */
    public function getDeviceLocations($userId, $deviceId)
    {
        $sql = "SELECT * FROM gps_locations LEFT JOIN devices ON (gps_locations.deviceId = devices.deviceId) WHERE
         user_id = $userId AND devices.deviceId = '$deviceId' ORDER BY gps_locations.date DESC LIMIT 0,20";
        return $this->getSqlData($sql);
    }
}


?>
