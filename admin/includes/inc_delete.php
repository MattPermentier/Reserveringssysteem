<?php
require_once "includes/admin_header.php";
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