<?php require_once "includes/inc_admin_profile.php"; ?>

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

<?php include "includes/admin_navigation.php" ?>

<form action="" method="post">
    <div>
        <label for="">Voornaam</label>
        <input type="text" name="firstname" value="<?php echo $user_firstname; ?>">
    </div>
    <div>
        <label for="">Achternaam</label>
        <input type="text" name="lastname" value="<?php echo $user_lastname; ?>">
    </div>
    <div>
        <label for="">Email</label>
        <input type="email" name="email" value="<?php echo $user_email; ?>">
    </div>
    <div>
        <label for="">Telefoonnummer</label>
        <input type="text" name="phone" value="<?php echo $user_phone; ?>">
    </div>


    <div>
        <input type="submit" name="submit" value="Gegevens wijzigen" />
    </div>

</form>
</body>
</html>