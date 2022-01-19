<?php require_once "includes/inc_create.php"; ?>

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

<?php if (isset($errors['connection'])) { ?>
    <div><span class="errors"><?= $errors['connection']; ?></span></div>
<?php } ?>

<!-- enctype="multipart/form-data" no characters will be converted -->
<form action="" method="post" enctype="multipart/form-data">

    <!--    CHOOSE NAME-->
    <div>
        <label for="name">Naam</label>
        <input id="name" type="text" name="name" value="<?php echo $_SESSION['firstname']; ?> <?php echo $_SESSION['lastname']; ?>" required/>
        <span class="errors"><?= $errors['name'] ?? '' ?></span>
    </div>

    <!--    CHOOSE HAIRCUT-->
    <div>
        <label for="haircut">Knipbeurt</label>

        <select name="haircut" required>
            <option value="">Select</option>
            <option value="Heren Knippen">Heren Knippen</option>
            <option value="Dames Knippen">Dames Knippen</option>
            <option value="Heren Knippen + Wassen">Heren Knippen + Wassen</option>
            <option value="Dames Knippen + Wassen">Dames Knippen + Wassen</option>
        </select>

        <span class="errors"><?= isset($errors['haircut']) ? $errors['haircut'] : '' ?></span>
    </div>

    <!--    CHOOSE DATE-->
    <div>
        <label for="date">Datum</label>
        <input id="date" type="date" name="date" required/>
        <span class="errors"><?= isset($errors['date']) ? $errors['date'] : '' ?></span>
    </div>

    <!--    CHOOSE TIME-->
    <div>
        <label for="time">Tijd</label>
        <input type="time" name="time" min="09:00" max="18:00" step="1800" value="time" required>

        <span class="errors"><?= isset($errors['haircut']) ? $errors['haircut'] : '' ?></span>
    </div>

    <!--    SUBMIT BUTTON-->
    <div>
        <input type="submit" name="submit" value="Save"/>
    </div>
</form>

<!--BACK TO INDEX.PHP-->
<div>
    <a href="create.php">Maak een nieuwe reservering</a>
</div>
</body>
</html>
