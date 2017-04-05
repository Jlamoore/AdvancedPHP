
<?php
include './templates/header.php';
require_once './models/dbconnect.php';
require_once './models/util.php';
require_once './models/validate.php';
require_once './models/addressCRUD.php';

// Create and set variables from the add address page
$fullName = filter_input(INPUT_POST, 'fullName');
$email = filter_input(INPUT_POST, 'email');
$address = filter_input(INPUT_POST, 'address');
$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');
$zip = filter_input(INPUT_POST, 'zip');
$bday = filter_input(INPUT_POST, 'bday');

$errors = [];
$states = GetStates();

// Validate all fields, report errors
if (isPostRequest()) {
    if (empty($fullName)) {
        $errors[] = 'Full name is required.';
    }

    if (!ValidEmail($email)) {
        $errors[] = 'Email is not valid.';
    }

    if (empty($address)) {
        $errors[] = 'Address is required.';
    }

    if (empty($city)) {
        $errors[] = 'City is required.';
    }

    if (empty($state)) {
        $errors[] = 'State is required.';
    }

    if (empty($zip)) {
        $errors[] = 'Zip is required.';
    } else {
        if (!ValidZip($zip)) {
            $errors[] = 'Zip is not vaild.';
        }
    }

    if (!ValidDate($bday)) {
        $errors[] = 'Date is not valid';
    }

    if (empty($state)) {
        $errors[] = 'State is required.';
    }
// No errors: set a success message, Add reccord, Clear fields
    if (count($errors) === 0) {
        CreateAddress($fullName, $email, $address, $city, $state, $zip, $bday);
        $fullName = "";
        $email = "";
        $address = "";
        $city = "";
        $state = "";
        $zip = "";
        $bday = "";
        $errors[] = "Address added";
    }
}

include './templates/messages.html.php';
include './templates/errors.html.php';
include './templates/add-address.html.php';
?>
</body>
</html>
