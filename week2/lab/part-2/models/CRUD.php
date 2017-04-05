<?php

/**
 * Description of CRUD
 *
 * @author 001393760
 */
class CRUD extends DBAddress {
    /**
     * Gets all addresses from database
     * @return array
     */
    function ReadAllAddress() {
        $db = DBAddress::getDB();
        $stmt = $db->prepare("SELECT * FROM address");

        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $results;
    }

    /**
     * Add the address to the database
     * @param Address $address
     */
    function CreateAddress(Address $address) {
        $db = DBAddress::getDB();
        $stmt = $db->prepare("INSERT INTO address SET fullname = :fullName, email = :email, addressline1 = :address, city = :city, state = :state, zip = :zip, birthday = :bday");
        $binds = array(
            ":fullName" => $address->fullName,
            ":email" => $address->email,
            ":address" => $address->address,
            ":city" => $address->city,
            ":state" => $address->state,
            ":zip" => $address->zip,
            ":bday" => $address->bday,
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        }

        return false;
    }

}
