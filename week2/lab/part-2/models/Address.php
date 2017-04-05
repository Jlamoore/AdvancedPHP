<?php

/**
 * Address Class. Contains methods relevant to addresses. And cleans up code.
 * (Easier to pass an address than all the individual fields)
 * @author 001393760
 */
class Address {

    // All of the fields of an address
    public $fullName = '';
    public $email = '';
    public $address = '';
    public $city = '';
    public $state = '';
    public $zip = '';
    public $bday = '';

    // Create an instance of the validator class and make sure the Address is valid
    function ValidAddress() {
        $errors = [];
        $valid = new Validation();
        if ($valid->FieldIsEmpty($this->fullName)) {
            $errors[] = 'Full name is required.';
        }
        if ($valid->ValidEmail($this->email)) {
            $errors[] = 'Email is not valid';
        }
        if ($valid->FieldIsEmpty($this->address)) {
            $errors[] = 'Address is required.';
        }
        if ($valid->FieldIsEmpty($this->city)) {
            $errors[] = 'City is required.';
        }
        if ($valid->FieldIsEmpty($this->zip)) {
            $errors[] = 'Zip is required.';
        }
        if ($valid->ValidDate($this->bday)) {
            $errors[] = 'Birthdate is not valid';
        }
        return $errors;
    }

}
