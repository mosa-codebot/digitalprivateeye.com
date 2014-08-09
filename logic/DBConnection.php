<?php
/**
 file DBConnection.php
 begin April 4th, 2012
 @author Mosadoluwa Adekunle
 @copyright Software Chefs www.softwarechefs.com
*/

function getDBConnection()
{
    $ini_array = parse_ini_file("config.ini", true);
    $localhost = false;
    $whitelist = array('127.0.0.1', '::1', '192.168.1.69', '192.168.1.73');
    $data_store_settings = $ini_array["db_connection"];
    $host = $data_store_settings["host"] ;
    $username = $data_store_settings["username"];
    $password = $data_store_settings["password"];
    $database = $data_store_settings["database"];

    if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
        $localhost = true;
        $data_store_settings = $ini_array["db_connection_local"];
        $host = $data_store_settings["host"] ;
        $username = $data_store_settings["username"];
        $password = $data_store_settings["password"];
        $database = $data_store_settings["database"];
    }
        
    $connection = mysql_connect($host, $username, $password);
    mysql_select_db($database) or die(mysql_error());
    return $connection;
}