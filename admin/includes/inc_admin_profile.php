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