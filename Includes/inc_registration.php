<?php
require_once "includes/database.php";
/** @var mysqli $connection */


// Check if button is clicked and save all the inputvalues
if (isset($_POST['submit'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];


    // Check is inputvalues are not empty and save against SQL-injections
    if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($phone) && !empty($password)) {

        $firstname = mysqli_real_escape_string($connection, $firstname);
        $lastname = mysqli_real_escape_string($connection, $lastname);
        $email = mysqli_real_escape_string($connection, $email);
        $phone = mysqli_real_escape_string($connection, $phone);

        $password = password_hash($password, PASSWORD_DEFAULT);

        // Send inputvalues to database and check if values are successfull inserted
        $query = "INSERT INTO users (firstname, lastname, email, phone, password) VALUES ('$firstname', '$lastname', '$email', '$phone', '$password')";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("QUERY FAILED " . mysqli_error($connection) . '' . mysqli_errno($connection));

        } else {
            echo "Uw account is aangemaakt!";
            header("Location: login.php");
        }

    } else {
        echo "Vul alle velden in";

    }
}

