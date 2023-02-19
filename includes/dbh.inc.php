<?php

$serverName = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "integrativa";

$conn = mysqli_connect($serverName, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}