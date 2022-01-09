<?php

if (isset($_POST['submit'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];

    require_once "database.php";
    require_once "functions.inc.php";

    if (emptyInputSignup($firstname, $lastname, $email, $phone, $pwd, $pwdRepeat) !== false) {

        header("location: ../signup.php?error=emptyinput");
        exit();

    } else if (invalidEmail($email) !== false) {

        header("location: ../signup.php?error=invalidEmail");
        exit();

    } else if (pwdMatch($pwd, $pwdRepeat) !== false) {

        header("location: ../signup.php?error=passwordsdontmatch");
        exit();

    } else if (userExists($connection, $firstname, $email) !== false) {

        header("location: ../signup.php?error=emailalreadyinuse");
        exit();

    }

    createUser($connection, $firstname, $lastname, $phone, $email, $pwd);

}
    else {

    header("location: ../signup.php");
    exit();
}