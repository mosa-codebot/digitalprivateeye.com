<?php
/**
 file DBConnection.php
*/

function getDBConnection()
{
    $isLocalhost = false;
    $whitelist = array('127.0.0.1', '::1');

    if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
        $isLocalhost = true;
    }
       
    $ini_array = parse_ini_file("config.ini", true);
    $data_store_settings = $ini_array["db_connection"];
    if($isLocalhost){
        $data_store_settings = $ini_array["db_connection_localhost"];        
    }
    $host = $data_store_settings["host"] ;
    $username = $data_store_settings["username"];
    $password = $data_store_settings["password"];
    $database = $data_store_settings["database"];
    $connection = mysql_connect($host, $username, $password);
    mysql_select_db($database) or die(mysql_error());
    return $connection;
}