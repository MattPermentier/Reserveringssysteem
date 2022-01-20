<?php
$host = "localhost";
$database = "reserveringssysteem";
$user = "root";
$password = "";

// Test connection with the database
$connection = mysqli_connect($host, $user, $password, $database)
or die("Error: " . mysqli_connect_error());