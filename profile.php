<?php
require_once "includes/header.php";
/** @var mysqli $connection */


//Require database in this file
require_once "includes/database.php";

if (isset($_SESSION['email'])) {

    $email = $_SESSION['email'];

    $query = "SELECT * FROM users WHERE user_email = '$email'";
    $select_user_profile_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($select_user_profile_query)) {
        $user_id = $row['user_id'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_phone = $row['user_phone_number'];

    }
}

    if (isset($_POST['edit_user'])) {

        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_phone = $_POST['user_phone_number'];



        $update_query = "UPDATE users SET user_firstname = '$user_firstname', user_lastname = '$user_lastname', user_email = '$user_email', user_phone_number = '$user_phone' WHERE id = '$user_id'";

        $edit_user_query = mysqli_query($connection, $update_query);

        if (!$edit_user_query) {
            die("QUERY FAILED" . mysqli_error($connection));
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

<?php include "includes/navigation.php"?>

    <div>
        <label for="">Voornaam</label>
        <input type="text" value="<?php echo $user_firstname; ?>">
    </div>
    <div>
        <label for="">Achternaam</label>
        <input type="text" value="<?php echo $user_lastname; ?>">
    </div>
    <div>
        <label for="">Email</label>
        <input type="email" value="<?php echo $user_email; ?>">
    </div>
    <div>
        <label for="">Telefoonnummer</label>
        <input type="text" value="<?php echo $user_phone; ?>">
    </div>


    <div>
        <button type="submit" name="edit_user">Gegevens wijzigen</button>
    </div>

</body>
</html>
