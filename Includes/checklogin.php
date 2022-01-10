<?php
require_once "database.php";
/** @var mysqli $connection */

session_start();

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE user_email = '{$email}'";
    $select_email_query = mysqli_query($connection, $query);

    if (!$select_email_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_array($select_email_query)) {
        $db_id = $row['user_id'];
        $db_firstname = $row['user_firstname'];
        $db_lastname = $row['user_lastname'];
        $db_phone = $row['user_phone_number'];
        $db_email = $row['user_email'];
        $db_password = $row['user_password'];
    }

    if ($email === $db_email && password_verify($password, $db_password)) {

        $_SESSION['id'] = $db_id;
        $_SESSION['firstname'] = $db_firstname;
        $_SESSION['lastname'] = $db_lastname;
        $_SESSION['phone_number'] = $db_phone;
        $_SESSION['email'] = $db_email;

        header("Location: ../create.php");

    } else {

        header("Location: ../login.php");

    }
}