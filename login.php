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
    <h2>Log In</h2>
    <div>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="pwd" placeholder="Wachtwoord">
            <button type="submit" name="submit">Log In</button>
        </form>
    </div>

    <?php

    if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyinput") {
            echo "<p>Vul alle velden in</p>";

        } else if ($_GET['error'] == "wronglogin") {
            echo "<p>Verkeerde login</p>";


        }
    }
    ?>

</section>

</body>
</html>
