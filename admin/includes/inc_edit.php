<?php
require_once "includes/admin_header.php";
require_once "includes/database.php";
/** @var mysqli $connection */

$id = $_REQUEST['id'];
$query = "SELECT * FROM reservations WHERE id= '$id'";

$result = mysqli_query($connection, $query) or die('Error: ' . mysqli_error($connection) . ' with query ' . $query);
$row = mysqli_fetch_assoc($result);

// CHECK IF BUTTON IS CLICKED AND GET THE NEW INPUT VALUES
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $haircut = $_POST['haircut'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $query = "UPDATE reservations SET name='$name', haircut='$haircut', date='$date', time='$time' WHERE id= '$id'";
    $result = mysqli_query($connection, $query) or die('Error: ' . mysqli_error($connection) . ' with query ' . $query);

    if ($result) {
        header('Location: index.php');
        exit;
    } else {
        $errors['db'] = 'Something went wrong in your database query: ' . mysqli_error($connection);
    }

    //Close connection
    mysqli_close($connection);

}