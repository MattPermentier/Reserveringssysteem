<?php
require_once "includes/header.php";
/** @var mysqli $connection */

//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {

    require_once "includes/database.php";

    //SAVE THE INPUTVALUES WITH SQL
    $name = mysqli_escape_string($connection, $_POST['name']);
    $haircut = mysqli_escape_string($connection, $_POST['haircut']);
    $date = mysqli_escape_string($connection, $_POST['date']);
    $time = mysqli_escape_string($connection, $_POST['time']);

    require_once "includes/form_validation.php";

    // CHECK IF BUTTON IS CLICKED AND SAVE THE INPUTVALUES

    if (empty($errors)) {

        $query = "INSERT INTO reservations (name, haircut, date, time) VALUES ('$name', '$haircut', '$date', '$time')";
        $result = mysqli_query($connection, $query) or die('Error: '. mysqli_error($connection) . ' with query ' . $query);

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