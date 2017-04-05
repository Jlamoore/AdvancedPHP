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
        if (!$valid->FieldNotEmpty($this->fullName)) {
            $errors[] = 'Full name is required.';
        }
        if (!$valid->ValidEmail($this->email)) {
            $errors[] = 'Email is not valid';
        } else if ($valid->ValidEmail($this->email)) {
            
        }
        if (!$valid->FieldNotEmpty($this->address)) {
            $errors[] = 'Address is required.';
        }
        if (!$valid->FieldNotEmpty($this->city)) {
            $errors[] = 'City is required.';
        }
        if (!$valid->FieldNotEmpty($this->state)) {
            $errors[] = 'State is required.';
        }
        if (!$valid->FieldNotEmpty($this->zip)) {
            $errors[] = 'Zip is required.';
        }
        if (!$valid->ValidDate($this->bday)) {
            $errors[] = 'Birthdate is not valid';
        }
        return $errors;
    }

}
