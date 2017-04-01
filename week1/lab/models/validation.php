<?php
/**
 * Validate zipcode is 5 numbers
 * @param string $zip
 * @return bool
 */
function ValidZip($zip) {
    $regex = '/^[0-9]{5}$/';
    return (bool)preg_match($regex, $zip);
}

/**
 * Validates that a date is actually a date
 * @param string $date
 * @return bool
 */
function ValidDate($date) {
    return (bool)strtotime($date);
}

/**
 * Validates that the email is a real email
 * @param string $email
 * @return bool
 */
function ValidEmail($email) {
    return (bool)filter_var($email, FILTER_VALIDATE_EMAIL);
}
