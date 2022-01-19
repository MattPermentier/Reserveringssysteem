<?php
// Check if data is filled in correctly
$errors = [];
if ($name == "") {
    $errors['name'] = 'Vul je naam in';
}
if ($haircut == "") {
    $errors['haircut'] = 'Kies de soort knipbeurt';
}
if ($date == "") {
    $errors['date'] = 'Kies de gewenste datum';
}
if ($time == "") {
    $errors['time'] = 'Kies de gewenste tijd';
}
