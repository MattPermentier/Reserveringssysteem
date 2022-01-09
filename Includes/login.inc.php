<?php

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['pwd'];

    require_once "database.php";
    require_once "functions.inc.php";

    if (emptyInputLogin($email, $password) !== false) {

        header("location: ../login.php?error=emptyinput");
        exit();

    }

    loginUser($connection, $email, $password);

} else {
    header("location: ../index.php");
    exit();
}