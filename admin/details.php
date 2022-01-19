<?php
require_once "includes/inc_details.php";
/** @var mysqli $reservation */
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
