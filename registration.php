<?php require_once "includes/inc_registration.php"; ?>

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
                        <input type="text" name="firstname" placeholder="Voornaam" value="<?= isset($firstname) ? htmlentities($firstname) : '' ?>">
                    </div>
                    <div>
                        <label for="lastname">Achternaam:</label>
                        <input type="text" name="lastname" placeholder="Achternaam" value="<?= isset($lastname) ? htmlentities($lastname) : '' ?>">
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" name="email" placeholder="Email" value="<?= isset($email) ? htmlentities($email) : '' ?>">
                    </div>
                    <div>
                        <label for="phone">Telefoonnummer:</label>
                        <input type="number" name="phone" placeholder="Telefoonnummer" value="<?= isset($phone) ? htmlentities($phone) : '' ?>">
                    </div>
                    <div>
                        <label for="password">Wachtwoord:</label>
                        <input type="password" name="password" placeholder="Wachtwoord" value="<?= isset($password) ? htmlentities($password) : '' ?>">
                    </div>

                    <input type="submit" name="submit" value="Account aanmaken">
                </form>
            </div>
        </section>
    </div>
</body>
</html>







