<?php
require_once "includes/database.php";
/** @var mysqli $connection */

//CHECK FOR SUBMIT BUTTON AND SAVE ALL THE GIVEN INPUTVALUES FROM REGISTRATION.PHP
if (isset($_POST['submit'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

//CHECK IF INPUTVALUES ARE ALL FILLED IN AND PROTECT FOR SQL INJECTIONS
    if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($phone) && !empty($password)) {

        $firstname = mysqli_real_escape_string($connection, $firstname);
        $lastname = mysqli_real_escape_string($connection, $lastname);
        $email = mysqli_real_escape_string($connection, $email);
        $phone = mysqli_real_escape_string($connection, $phone);
        $password = mysqli_real_escape_string($connection, $password);

        $password = password_hash($password, PASSWORD_DEFAULT);

//        SEND INPUTVALUES TO DATABASE AND CHECK IF VALUES ARE SUCCESSFULL INSERTED
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

