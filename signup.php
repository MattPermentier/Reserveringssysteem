<?php
require_once "includes/database.php";
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

<section>
    <h2>Maak een account aan</h2>
    <div>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="firstname" placeholder="Voornaam">
            <input type="text" name="lastname" placeholder="Achternaam">
            <input type="text" name="phone" placeholder="Telefoonnummer">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="pwd" placeholder="Wachtwoord">
            <input type="password" name="pwdrepeat" placeholder="Bevestig Wachtwoord">
            <button type="submit" name="submit">Registreer</button>
        </form>
    </div>

    <?php

    if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyinput") {
            echo "<p>Vul alle velden in</p>";

        } else if ($_GET['error'] == "invalidemail") {
            echo "<p>Kies een juist email-adres</p>";

        } else if ($_GET['error'] == "passwordsdontmatch") {
            echo "<p>Wachtwoorden komen niet overeen</p>";

        } else if ($_GET['error'] == "stmtfailed") {
            echo "<p>Er ging iets verkeerd, probeer het opnieuw</p>";

        } else if ($_GET['error'] == "emailtaken") {
            echo "<p>Email reeds in gebruik</p>";

        } else if ($_GET['error'] == "none") {
            echo "<p>Account aangemaakt!</p>";

        }
    }
    ?>

</section>


</body>
</html>







