<?php
require_once "includes/database.php";
require_once "includes/admin_header.php";
/** @var mysqli $connection */

// Get all the reservations from database
$query = "SELECT * FROM reservations";
$result = mysqli_query($connection, $query) or die ('Error: ' . $query);

// Create array with reservations
$reservations = [];
while ($row = mysqli_fetch_assoc($result)) {
    $reservations[] = $row;
}

// Close connection
mysqli_close($connection);