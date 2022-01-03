<?php
$host       = "localhost";
$database   = "reserveringssysteem";
$user       = "root";
$password   = "";

$connection = mysqli_connect($host, $user, $password, $database)
or die("Error: " . mysqli_connect_error());;