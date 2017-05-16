<?php
/**
 * Validation class
 * @author 001393760
 */
class Validation {
    
    //Valid passwords should match this regex.
private $PASSWORD_REGEX = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
    /**
     * Returns true if a field is empty or null.
     * @param type $field
     * @return bool
     */
    function FieldIsEmpty($field) {
        return (bool) empty($field);
    }

    /**
     * Validates that the zip is 5 numbers
     * @param string/int $zip
     * @return bool
     */
    function ValidZip($zip) {
        $regex = '/^[0-9]{5}$/';
        return (bool) preg_match($regex, $zip);
    }

    /**
     * Validates that a date is actually a date
     * @param string $date
     * @return bool
     */
    function ValidDate($date) {
        if (!$this->FieldIsEmpty($date)) {
            return (bool) strtotime($date);
        }
        return FALSE;
    }

    /**
     * Validates that the email is a real email
     * @param string $email
     * @return bool
     */
    function ValidEmail($email) {
        if (!$this->FieldIsEmpty($email)) {
            return (bool) filter_var($email, FILTER_VALIDATE_EMAIL);
        }
        return FALSE;
    }
    
    //validate that the passowrd meets tehe minimum requirements
    function ValidPassword($pass)
    {
        if (!$this->FieldIsEmpty($pass))
        {
            return (bool)preg_match($this->PASSWORD_REGEX, $pass);
        }
        return FALSE;
    }
    
    //make sure that the email entered doesnt already exist
    function AvailableEmail($db, $email)
    {
        $results = $db->getAllEmails();
        foreach ($results as $result) {
            if(strtoupper($result["email"]) == strtoupper($email))
            {
                return FALSE;
            }
        }
        return TRUE;
    }
}
