<?php
/** @var mysqli $db */

//Require database in this file
require_once "includes/database.php";

$query = "SELECT * FROM users";
$result = mysqli_query($db, $query);

$user = mysqli_fetch_assoc($result);

//Close connection
mysqli_close($db);
?>

<!doctype html>
<html lang="en">
<head>
    <title>Music Collection Details</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>

<!--Navigation-->
<navigation>
    <?php include "includes/navigation.php"; ?>
</navigation>

<body>

<ul>
    <li>Naam:  <?= $user['user_firstname'] ?>  <?= $user['user_lastname'] ?></li>
    <li>Telefoonnummer:   <?= $user['user_phone_number'] ?></li>
    <li>Email: <?= $user['user_email'] ?></li>
    <li>Adres: <?= $user['user_address'] ?></li>
    <li>Postcode: <?= $user['user_postal_code'] ?></li>
</ul>
<div>
    <a href="index.php">Go back to the list</a>
</div>

</body>
</html>

