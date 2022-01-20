<?php
require_once "includes/inc_index.php";
/** @var mysqli $reservations */
/** @var mysqli $reservation */
?>

<!doctype html>
<html lang="en">
<head>
    <title>Music Collection</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>
</head>
<body>
<h1>Alle Afspraken</h1>

<?php include "includes/admin_navigation.php"; ?>

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
        <td colspan="10">&copy;HaarHuis</td>
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

