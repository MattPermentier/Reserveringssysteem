<?php
require_once "includes/header.php";
/** @var mysqli $connection */

//Require music data & image helpers to use variable in this file
require_once "includes/database.php";


if (isset($_POST['submit'])) {
    // DELETE IMAGE
    // To remove the image we need to query the file name from the db.
    // Get the record from the database result
    $reservationId = mysqli_escape_string($connection, $_POST['id']);
    $query = "SELECT * FROM reservations WHERE id = '$reservationId'";
    $result = mysqli_query($connection, $query) or die ('Error: ' . $query);

    $reservation = mysqli_fetch_assoc($result);

    if (!empty($reservation['image'])) {
        deleteImageFile($reservation['image']);
    }

    // DELETE DATA
    // Remove the album data from the database with the existing albumId
    $query = "DELETE FROM reservations WHERE id = '$reservationId'";
    mysqli_query($connection, $query) or die ('Error: ' . mysqli_error($connection));

    //Close connection
    mysqli_close($connection);

    //Redirect to homepage after deletion & exit script
    header("Location: index.php");
    exit;

} else if (isset($_GET['id']) || $_GET['id'] != '') {
    //Retrieve the GET parameter from the 'Super global'
    $reservationId = mysqli_escape_string($connection, $_GET['id']);

    //Get the record from the database result
    $query = "SELECT * FROM reservations WHERE id = '$reservationId'";
    $result = mysqli_query($connection, $query) or die ('Error: ' . $query);

    if (mysqli_num_rows($result) == 1) {
        $reservation = mysqli_fetch_assoc($result);
    } else {
        // redirect when db returns no result
        header('Location: index.php');
        exit;
    }
} else {
    // Id was not present in the url OR the form was not submitted

    // redirect to index.php
    header('Location: index.php');
    exit;
}
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
