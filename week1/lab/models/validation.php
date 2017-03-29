<?php

function ValidZip($zip) {
    $regex = '/^[0-9]{5}$/';
    return (bool)preg_match($regex, $zip);
}

function ValidDate($date) {
    return (bool)strtotime($date);
}

function ValidEmail($email) {
    return (bool)filter_var($email, FILTER_VALIDATE_EMAIL);
}
