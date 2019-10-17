<?php

$dbServer = "localhost";
$dbUser = "root";
$dbPass = "";
$database = "searchphp";

//My sqli connection using above parameters
$conn = mysqli_connect($dbServer, $dbUser, $dbPass, $database);

//If Connection Fails
if(!$conn){
  die("Connection Failed!".mysqli_connect_error());
}

