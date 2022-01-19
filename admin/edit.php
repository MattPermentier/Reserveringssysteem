<?php
require_once "includes/inc_edit.php";
/** @var mysqli $row */
?>
<!doctype html>
<html lang="en">
<head>
    <title>Music Collection Create</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>
</head>
<body>
<h1>Afspraak wijzigen</h1>
<?php if (isset($errors['db'])) { ?>
    <div><span class="errors"><?= $errors['db']; ?></span></div>
<?php } ?>


<!-- enctype="multipart/form-data" no characters will be converted -->
<form action="" method="post" enctype="multipart/form-data">

    <!--    EDIT NAME-->
    <div class="data-field">
        <label for="name">Naam</label>
        <input type="text" name="name" placeholder="Enter Name" value="<?php echo $row['name']; ?>" required />
        <span class="errors"><?= $errors['name'] ?? '' ?></span>
    </div>

    <!--    EDIT HAIRCUT-->
    <div class="data-field">
        <label for="haircut">Knipbeurt</label>

        <select name="haircut" required>
            <option value="empty">Select</option>
            <option value="Heren Knippen" <?php if ($row['haircut'] == 'Heren Knippen') { echo "selected"; } ?> >Heren Knippen</option>
            <option value="Dames Knippen" <?php if ($row['haircut'] == 'Dames Knippen') { echo "selected"; } ?> >Dames Knippen</option>
            <option value="Heren Knippen + Wassen" <?php if ($row['haircut'] == 'Heren Knippen + Wassen') { echo "selected"; } ?> >Heren Knippen + Wassen</option>
            <option value="Dames Knippen + Wassen" <?php if ($row['haircut'] == 'Dames Knippen + Wassen') { echo "selected"; } ?> >Dames Knippen + Wassen</option>
        </select>

        <span class="errors"><?= isset($errors['haircut']) ? $errors['haircut'] : '' ?></span>
    </div>

    <!--    EDIT DATE-->
    <div class="data-field">
        <label for="date">Datum</label>
        <input type="date" name="date" value="<?php echo $row['date']; ?>" required/>
        <span class="errors"><?= isset($errors['date']) ? $errors['date'] : '' ?></span>
    </div>

    <!--    EDIT TIME-->
    <div class="data-field">
        <label for="time">Tijd</label>
        <input type="time" name="time" min="09:00" max="18:00" value="<?php echo $row['time']; ?>" required>
        <span class="errors"><?= isset($errors['haircut']) ? $errors['haircut'] : '' ?></span>
    </div>

    <!--    EDIT BUTTON-->
    <div class="data-submit">
        <input type="submit" name="submit" value="Save"/>
    </div>
</form>

<!--BACK TO INDEX.PHP-->
<div>
    <a href="index.php">Go back to the list</a>
</div>
</body>
</html>