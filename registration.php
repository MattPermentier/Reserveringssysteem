<?php
require_once "includes/database.php";
/** @var mysqli $connection */

if (isset($_POST['submit'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];


    if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($phone) && !empty($password)) {

        $firstname = mysqli_real_escape_string($connection, $firstname);
        $lastname = mysqli_real_escape_string($connection, $lastname);
        $email = mysqli_real_escape_string($connection, $email);
        $phone = mysqli_real_escape_string($connection, $phone);
        $password = mysqli_real_escape_string($connection, $password);

        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (user_firstname, user_lastname, user_email, user_phone_number, user_password) VALUES ('$firstname', '$lastname', '$email', '$phone', '$password')";

        $register_user_query = mysqli_query($connection, $query);

        if (!$register_user_query) {
            die("QUERY FAILED " . mysqli_error($connection) . '' . mysqli_errno($connection));

        } else {
            echo "Uw account is aangemaakt!";
        }

    } else {
        echo "Vul alle velden in";
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
        <section>
            <div>
               <h1>Maak een account aan</h1>
                <form action="registration.php" method="post">
                    <div>
                        <label for="firstname">Voornaam:</label>
                        <input type="text" name="firstname" placeholder="Voornaam">
                    </div>
                    <div>
                        <label for="lastname">Achternaam:</label>
                        <input type="text" name="lastname" placeholder="Achternaam">
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" name="email" placeholder="Email">
                    </div>
                    <div>
                        <label for="phone">Telefoonnummer:</label>
                        <input type="number" name="phone" placeholder="Telefoonnummer">
                    </div>
                    <div>
                        <label for="password">Wachtwoord:</label>
                        <input type="password" name="password" placeholder="Wachtwoord">
                    </div>

                    <input type="submit" name="submit" value="Account aanmaken">
                </form>
            </div>
        </section>
    </div>
</body>
</html>







