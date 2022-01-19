<?php
require_once "includes/inc_delete.php";
/** @var mysqli $reservation */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete - <?= $reservation['name'] ?></title>
</head>
<body>
<h2>Delete - <?= $reservation['name'] ?></h2>
<form action="" method="post">
    <p>
        Weet u zeker dat u de reservering van "<?= $reservation['name'] ?>" wilt verwijderen?
    </p>
    <input type="hidden" name="id" value="<?= $reservation['id'] ?>"/>
    <input type="submit" name="submit" value="Verwijderen"/>
</form>
</body>
</html>
