<?php
$host       = "localhost";
$database   = "reserveringssysteem";
$user       = "root";
$password   = "";

//TEST CONNECTION WITH THE DATABASE
$connection = mysqli_connect($host, $user, $password, $database)
or die("Error: " . mysqli_connect_error());