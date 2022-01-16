<?php
require_once "includes/admin_header.php";
/** @var mysqli $connection */

// redirect when uri does not contain a id
if(!isset($_GET['id']) || $_GET['id'] == '') {
    // redirect to index.php
    header('Location: index.php');
    exit;
}

//Require database in this file
require_once "includes/database.php";

//Retrieve the GET parameter from the 'Super global'
$reservationId = mysqli_escape_string($connection, $_GET['id']);

//Get the record from the database result
$query = "SELECT * FROM reservations WHERE id = '$reservationId'";
$result = mysqli_query($connection, $query) or die ('Error: ' . $query );

if(mysqli_num_rows($result) != 1)
{
    // redirect when db returns no result
    header('Location: index.php');
    exit;
}

$reservation = mysqli_fetch_assoc($result);

//Close connection
mysqli_close($connection);
?>
<!doctype html>
<html lang="en">
<head>
    <title>Music Collection Details</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>
</head>
<body>
<h1><?= $reservation['name'] ?></h1>

<ul>
    <li>Knipbeurt:  <?= $reservation['haircut'] ?></li>
    <li>Datum:   <?= $reservation['date'] ?></li>
    <li>Tijd: <?= $reservation['time'] ?></li>
</ul>
<div>
    <a href="index.php">Go back to the list</a>
</div>
</body>
</html>
