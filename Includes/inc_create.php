<?php
require_once "includes/header.php";
/** @var mysqli $connection */

// Check if button is clicked and save the inputvalues against SQL-injections
if (isset($_POST['submit'])) {

    require_once "includes/database.php";

    $name = mysqli_escape_string($connection, $_POST['name']);
    $haircut = mysqli_escape_string($connection, $_POST['haircut']);
    $date = mysqli_escape_string($connection, $_POST['date']);
    $time = mysqli_escape_string($connection, $_POST['time']);

    require_once "includes/form_validation.php";

    // Check if there are no errors
    if (empty($errors)) {

        // Save the reservation in the database and test if reservation is inserted
        $query = "INSERT INTO reservations (name, haircut, date, time) VALUES ('$name', '$haircut', '$date', '$time')";
        $result = mysqli_query($connection, $query) or die('Error: ' . mysqli_error($connection) . ' with query ' . $query);

        // Give empty create page or give an error when reservation is not inserted into the database
        if ($result) {
            header("Location: create.php");
            exit;
        } else {
            $errors['connection'] = 'Er is iets fout gegaan: ' . mysqli_error($connection);
        }

        // Close connection with database
        mysqli_close($connection);
    }

}