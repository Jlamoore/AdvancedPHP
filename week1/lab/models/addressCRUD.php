<?php

/**
 * Gets all addresses from database
 * @return array
 */
function ReadAllAddress() {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM address");

    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
}

/**
 * Add the address to the database
 * @param string $fullName
 * @param string $email
 * @param string $address
 * @param string $city
 * @param string $state
 * @param string $zip
 * @param string $bday
 */
function CreateAddress($fullName, $email, $address, $city, $state, $zip, $bday) {
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO address SET fullname = :fullName, email = :email, addressline1 = :address, city = :city, state = :state, zip = :zip, birthday = :bday");
    $binds = array(
        ":fullName" => $fullName,
        ":email" => $email,
        ":address" => $address,
        ":city" => $city,
        ":state" => $state,
        ":zip" => $zip,
        ":bday" => $bday,
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }

    return false;
}
