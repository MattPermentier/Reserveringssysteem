<?php
require_once "includes/database.php";
require_once "includes/admin_header.php";
/** @var mysqli $connection */


// Check if button is clicked and select all the info from the reservation
if (isset($_POST['submit'])) {

    $reservationId = mysqli_escape_string($connection, $_POST['id']);
    $query = "SELECT * FROM reservations WHERE id = '$reservationId'";
    $result = mysqli_query($connection, $query) or die ('Error: ' . $query);

    $reservation = mysqli_fetch_assoc($result);

    if (!empty($reservation['image'])) {
        deleteImageFile($reservation['image']);
    }

    // Remove the reservation with the id
    $query = "DELETE FROM reservations WHERE id = '$reservationId'";
    mysqli_query($connection, $query) or die ('Error: ' . mysqli_error($connection));


    mysqli_close($connection);

    // Send user back to the index page after deleting reservation
    header("Location: index.php");
    exit;

} else if (isset($_GET['id']) || $_GET['id'] != '') {
    //Retrieve the GET parameter from the 'Super global'
    $reservationId = mysqli_escape_string($connection, $_GET['id']);

    // Select the reservation info and check if everything works
    $query = "SELECT * FROM reservations WHERE id = '$reservationId'";
    $result = mysqli_query($connection, $query) or die ('Error: ' . $query);

    if (mysqli_num_rows($result) == 1) {
        $reservation = mysqli_fetch_assoc($result);
    } else {
        // Send user back to index when something went wrong
        header('Location: index.php');
        exit;
    }
} else {

    header('Location: index.php');
    exit;
}