<?php
require_once "includes/header.php";
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

?>
<!doctype html>
<html lang="en">
<head>
    <title>Music Collection</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<h1>Mijn Afspraken</h1>

<?php include "includes/navigation.php"; ?>

<table>
    <thead>
    <tr>

        <th>#</th>
        <th>Naam</th>
        <th>Knipbeurt</th>
        <th>Datum</th>
        <th>Tijd</th>
        <th colspan="3"></th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="10">&copy; My Collection</td>
    </tr>
    </tfoot>
    <tbody>
    <?php foreach ($reservations as $reservation) { ?>
        <tr>
            <td><?= $reservation['id'] ?></td>
            <td><?= $reservation['name'] ?></td>
            <td><?=  $reservation['haircut'] ?></td>
            <td><?= $reservation['date'] ?></td>
            <td><?=  $reservation['time'] ?></td>
            <td><a href="details.php?id=<?= $reservation['id'] ?>">Details</a></td>
            <td><a href="edit.php?id=<?= $reservation['id'] ?>">Edit</a></td>
            <td><a href="delete.php?id=<?= $reservation['id'] ?>">Delete</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>

