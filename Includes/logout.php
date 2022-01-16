<?php
session_start();

//REMOVE ALL SESSION INFO WHEN USER IS LOGGED OUT
$_SESSION['id'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['phone_number'] = null;
$_SESSION['email'] = null;

header("Location: ../login.php");