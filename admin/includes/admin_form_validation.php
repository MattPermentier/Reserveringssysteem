<?php
// Check if data is valid & generate error if not so
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