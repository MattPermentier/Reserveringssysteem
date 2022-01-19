<?php
require_once "database.php";
/** @var mysqli $connection */

session_start();

if (isset($_POST['login'])) {

//    ASK FOR INPUTVALUES ON LOGIN.PHP
    $email = $_POST['email'];
    $password = $_POST['password'];

//    PREVENT SQL INJECTIONS
    $username = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE email = '{$email}'";
    $query = mysqli_query($connection, $query);

    if (!$query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

//    STORE VALUES IN ARRAY
    while ($row = mysqli_fetch_array($query)) {
        $db_id = $row['id'];
        $db_firstname = $row['firstname'];
        $db_lastname = $row['lastname'];
        $db_phone = $row['phone'];
        $db_email = $row['email'];
        $db_password = $row['password'];
    }

//    CHECK IF USER EXISTS AND SEND TO ADMIN, USER, OR LOGIN PAGE
    if ($db_email == "admin.admin@gmail.com" && password_verify($password, $db_password)) {

        header("Location: ../admin/index.php");
        $_SESSION['id'] = $db_id;
        $_SESSION['firstname'] = $db_firstname;
        $_SESSION['lastname'] = $db_lastname;
        $_SESSION['phone_number'] = $db_phone;
        $_SESSION['email'] = $db_email;

    } else if ($email === $db_email && password_verify($password, $db_password)) {

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