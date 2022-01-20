<?php
session_start();

// Remove all session info when user is logged out
$_SESSION['id'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['phone_number'] = null;
$_SESSION['email'] = null;

header("Location: ../login.php");