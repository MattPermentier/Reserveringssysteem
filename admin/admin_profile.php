<?php
require_once "includes/admin_header.php";
require_once "includes/database.php";
/** @var mysqli $connection */

if (isset($_SESSION['email'])) {

    $email = $_SESSION['email'];

    $select_query = "SELECT * FROM users WHERE email = '{$email}'";
    $select_user_profile_query = mysqli_query($connection, $select_query);

    while ($row = mysqli_fetch_array($select_user_profile_query)) {
        $user_id = $row['id'];
        $user_firstname = $row['firstname'];
        $user_lastname = $row['lastname'];
        $user_email = $row['email'];
        $user_phone = $row['phone'];

    }
}

if (isset($_POST['submit'])) {

    $user_firstname = $_POST['firstname'];
    $user_lastname = $_POST['lastname'];
    $user_email = $_POST['email'];
    $user_phone_number = $_POST['phone'];

    $update_query = "UPDATE users SET firstname = '$user_firstname', lastname = '$user_lastname', email = '$email', phone = '$user_phone' WHERE email = '$email'";
    $update_user_query = mysqli_query($connection, $update_query);

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