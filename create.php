<?php
require_once "includes/header.php";
/** @var mysqli $connection */

//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {

    require_once "includes/database.php";


    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $name = mysqli_escape_string($connection, $_POST['name']);
    $haircut = mysqli_escape_string($connection, $_POST['haircut']);
    $date = mysqli_escape_string($connection, $_POST['date']);
    $time = mysqli_escape_string($connection, $_POST['time']);

    // CHECK IF BUTTON IS CLICKED AND SAVE THE VALUES
    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $haircut = $_POST['haircut'];
        $date = $_POST['date'];
        $time = $_POST['time'];

        $query_reservations = "INSERT INTO reservations (name, haircut, date, time) VALUES ('$name', '$haircut', '$date', '$time')";
        $result_reservations = mysqli_query($connection, $query_reservations) or die('Error: ' . mysqli_error($connection) . ' with query ' . $query_reservations);

        if (!$result_reservations) {
            die("QUERY FAILED " . mysqli_error($connection) . '' . mysqli_errno($connection));

        } else {
            echo "Uw afspraak is gemaakt!";
            header("Location: create.php");
        }

    } else {
        echo "Vul alle velden in";

    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <title>Music Collection Create</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>

<!--Navigation-->
<?php
if ($_SESSION['firstname'] == "admin") {

    include "admin/includes/admin_navigation.php";
} else {

    include "includes/user_navigation.php";
}
?>

<h1>Welkom <?php echo $_SESSION['firstname']; ?></h1>

<?php if (isset($errors['db'])) { ?>
    <div><span class="errors"><?= $errors['db']; ?></span></div>
<?php } ?>

<!-- enctype="multipart/form-data" no characters will be converted -->
<form action="" method="post" enctype="multipart/form-data">

    <!--    CHOOSE NAME-->
    <div class="data-field">
        <label for="name">Naam</label>
        <input id="name" type="text" name="name" value="<?php echo $_SESSION['firstname']; ?> <?php echo $_SESSION['lastname']; ?>" required/>
        <span class="errors"><?= $errors['name'] ?? '' ?></span>
    </div>

    <!--    CHOOSE HAIRCUT-->
    <div class="data-field">
        <label for="haircut">Knipbeurt</label>

        <select name="haircut" required>
            <option value="empty">Select</option>
            <option value="Heren Knippen">Heren Knippen</option>
            <option value="Dames Knippen">Dames Knippen</option>
            <option value="Heren Knippen + Wassen">Heren Knippen + Wassen</option>
            <option value="Dames Knippen + Wassen">Dames Knippen + Wassen</option>
        </select>

        <span class="errors"><?= isset($errors['haircut']) ? $errors['haircut'] : '' ?></span>
    </div>

    <!--    CHOOSE DATE-->
    <div class="data-field">
        <label for="date">Datum</label>
        <input id="date" type="date" name="date" required/>
        <span class="errors"><?= isset($errors['date']) ? $errors['date'] : '' ?></span>
    </div>

    <!--    CHOOSE TIME-->
    <div class="data-field">
        <label for="time">Tijd</label>
        <input type="time" name="time" min="09:00" max="18:00" step="1800" value="time" required>

        <span class="errors"><?= isset($errors['haircut']) ? $errors['haircut'] : '' ?></span>
    </div>

    <!--    SUBMIT BUTTON-->
    <div class="data-submit">
        <input type="submit" name="submit" value="Save"/>
    </div>
</form>

<!--BACK TO INDEX.PHP-->
<div>
    <a href="admin/index.php">Go back to the list</a>
</div>
</body>
</html>
