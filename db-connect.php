<?php

$serverName="localhost";
$username="root";
$password="Thinkpad@40985001";
$dbname="beauty_garden";

$conn=new mysqli($serverName,$username,$password,$dbname);

if ($conn->connect_error) {
    echo "error in database";
    die("Connection failed: " . $conn->connect_error);
}


?>