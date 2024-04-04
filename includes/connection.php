<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Mystore";

$conns = new mysqli($servername, $username, $password, $dbname);

if ($conns->connect_error) {
    die("Connection failed: " . $conns->connect_error);
}
?>