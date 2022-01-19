<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['firstname']) && isset($_SESSION['lastname']) && isset($_SESSION['firstname']) && isset($_SESSION['phone_number']) && isset($_SESSION['email'])) {
    $login = true;
} else {
    $login = false;
    header("Location: ../login.php");
}