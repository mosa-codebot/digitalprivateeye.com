<?php

    $db_connection; 
    $host = "api.digitalprivateeye.com";
    $userName = "website";
    $password = "mosadoluwa";
    $dbName = "digitalprivateeye";

    $db_connection = mysqli_connect($host, $userName, $password, $dbName);

    if (mysqli_connect_errno())
	    echo "Failed to connect to MySQL: " . mysqli_connect_error();

$users = getAllUsers($db_connection);

foreach($users as $user)
{
    $email = $user['username'];
    $id = $user['user_id'];
    addUserToNewsletter($db_connection, $email, $id);
}



    function addUserToNewsletter($db_connection, $email, $id)
    {
        $sql = "INSERT INTO `newsblast_recipients` (id, email) VALUES ( '".$id."', '".$email."')";
	mysqli_query($db_connection, $sql);
    }

    function getAllUsers($db_connection)
    {
        $sql = "SELECT * FROM `users`";
        $query = mysqli_query($db_connection, $sql) or trigger_error(mysql_error()." ".$sql);

        $result_data_array = array();
        while($row = mysqli_fetch_assoc($query))
        {
            $result_data_array[] = $row;
        }
        return $result_data_array;
    }

?>
