<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Address
 *
 * @author 001393760
 */
class Address {

    public $fullName = '';
    public $email = '';
    public $address = '';
    public $city = '';
    public $state = '';
    public $zip = '';
    public $bday = '';

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
