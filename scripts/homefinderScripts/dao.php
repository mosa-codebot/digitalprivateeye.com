<?php
/**
 file dao.php
 begin April 4th, 2012
 @author Mosadoluwa Adekunle
 @copyright Made Software Ltd
*/

class dao
{
    private $db_connection; 
    private $host = "192.168.0.14";
    private $userName = "root";
    private $password = "root";
    private $dbName = "home_finder";

    public function __construct()
    {
	$this->db_connection = mysqli_connect($this->host,$this->userName,$this->password,$this->dbName);

	if (mysqli_connect_errno())
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    public function getAllUnverifiedUsers()
    {
        $sql = "SELECT * FROM `users` WHERE `verification_message_sent` = '0'";
	$query = mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$sql);
	$result_data_array = array();
	while($row = mysqli_fetch_assoc($query))
	{
            $result_data_array[] = $row;
        }
        return $result_data_array;
    }
    
    public function setVerificationMessageSent($userId)
    {
	$sql = "UPDATE `users` SET `verification_message_sent` = '1' WHERE `user_id` = '$userId';";
		return (mysqli_query($this->db_connection, $sql) or trigger_error(mysql_error()." ".$sql));
    }

}
