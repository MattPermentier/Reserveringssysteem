<?php

function emptyInputSignup($firstname, $lastname, $email, $phone, $pwd, $pwdRepeat) {

    $result;
    if (empty($firstname) || empty($lastname || empty($email) || empty($phone) || empty($pwd) || empty($pwdRepeat))) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail ($email) {

  $result;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $result = true;
  } else {
      $result = false;
  }
    return $result;
}

function pwdMatch ($pwd, $pwdRepeat) {

    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function userExists ($connection, $firstname, $email) {
    $query = "SELECT * FROM users WHERE user_firstname = ? OR user_email = ?;";
    $stmt = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $firstname, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
            return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($connection, $firstname, $lastname, $email, $phone, $pwd) {
    $query = "INSERT INTO users (user_firstname, user_lastname, user_phone_number, user_email, user_password) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $email, $phone, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($email, $pwd) {

    $result;
    if (empty($email) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($connection, $email, $pwd) {
    $emailExists = emailExists ($connection, $email, $email);

    if ($emailExists === false) {
        header("location: ../login.php?eroor=wronglogin");
        exit();
    }

    $pwdHashed = $emailExists["user_password"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?eroor=wronglogin");
        exit();

    } else if ($checkPwd === true) {
        session_start();
        $_SESSION['user_id'] = $emailExists["usersId"];
        $_SESSION['user_firstname'] = $emailExists["usersFirstname"];

        header("location: ../index.php");
        exit();
    }
}
