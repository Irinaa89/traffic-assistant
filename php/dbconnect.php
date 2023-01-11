<?php

$db_host = 'localhost';
$db_username = 'root';
$db_name = 'traffic_assistant';

$connect = mysqli_connect($db_host, $db_username, "", $db_name);

if (!$connect) {
    die(mysqli_connect_error());
}

?>