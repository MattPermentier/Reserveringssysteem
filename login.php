<?php
require_once "includes/database.php";
session_start();

if (isset($_POST['login'])) {

    $firstname = $_POST['firstname'];
    $password = $_POST['password'];

    $firstname = mysqli_real_escape_string($connection, $firstname);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE user_firstname = '{$firstname}'";
    $select_user_query = mysqli_query($connection, $query);

    if (!$select_user_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_array($select_user_query)) {

        $db_user_id = $row['user_id'];
        $db_firstname = $row['user_firstname'];
        $db_lastname = $row['user_lastname'];
        $db_phone_number = $row['user_phone_number'];
        $db_email = $row['user_email'];
        $db_address = $row['user_address'];
        $db_postal_code = $row['user_postal_code'];
        $db_user_role = $row['user_role'];
        $db_user_password = $row['user_password'];

    }

    if ($firstname !== $db_firstname && $password !== $db_user_password) {

        header("Location: login.php");

    } else if ($firstname == $db_firstname && $password == $db_user_password) {

        $_SESSION['firstname'] = $db_firstname;
        $_SESSION['lastname'] = $db_lastname;
        $_SESSION['phone_number'] = $db_phone_number;
        $_SESSION['email'] = $db_email;
        $_SESSION['address'] = $db_address;
        $_SESSION['postal_code'] = $db_postal_code;
        $_SESSION['role'] = $db_user_role;

        header("Location: index.php");

    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div>
    <form action="" method="post">
        <h4>Login</h4>

        <div>
            <input type="text"name="firstname" placeholder="Gebruikersnaam">
        </div>
        <div>
            <input type="password" name="password" placeholder="Wachtwoord">
        </div>
        <div>
            <input type="submit" name="login" value="Inloggen">
        </div>

    </form>
</div>

</body>
</html>