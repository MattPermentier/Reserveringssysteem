<?php
require_once "includes/admin_header.php";
/** @var mysqli $connection */

//Require DB settings with connection variable
require_once "includes/database.php";

//Get the result set from the database with a SQL query
$query = "SELECT * FROM reservations";
$result = mysqli_query($connection, $query) or die ('Error: ' . $query);

//Loop through the result to create a custom array
$reservations = [];
while ($row = mysqli_fetch_assoc($result)) {
    $reservations[] = $row;
}

//Close connection
mysqli_close($connection);