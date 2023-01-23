<?php

$db_host = 'std-mysql.ist.mospolytech.ru';
$db_username = 'std_2012_traffic_assistant';
$db_password = '12345678';
$db_name = 'std_2012_traffic_assistant';

$connect = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$connect) {
    die(mysqli_connect_error());
}

?>