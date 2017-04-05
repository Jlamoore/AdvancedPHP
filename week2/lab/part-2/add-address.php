
<?php
//Required classes (maybe I should use the autoload function. This is getting to be alot.)
require_once './models/DBAddress.php';
require_once './models/CRUD.php';
require_once './models/Validation.php';
require_once './models/util.php';
require_once './models/Address.php';
include './templates/header.php';

// Create a new address
$address = new Address();

// Create and set properties from the add address page
$address->fullName = filter_input(INPUT_POST, 'fullName');
$address->email = filter_input(INPUT_POST, 'email');
$address->address = filter_input(INPUT_POST, 'address');
$address->city = filter_input(INPUT_POST, 'city');
$address->state = filter_input(INPUT_POST, 'state');
$address->zip = filter_input(INPUT_POST, 'zip');
$address->bday = filter_input(INPUT_POST, 'bday');

$errors = [];
$states = GetStates();

// Validate all fields, report errors
if (isPostRequest()) {
    $errors = $address->ValidAddress();
// No errors: set a success message, Add reccord, Clear fields
    if (count($errors) === 0) {
        $Crud = new CRUD();
        $Crud->CreateAddress($address);
        $address->fullName = '';
        $address->email = '';
        $address->address = '';
        $address->city = '';
        $address->state = '';
        $address->zip = '';
        $address->bday = '';
        $errors[] = "Address added";
    }
}
//html includes
include './templates/messages.html.php';
include './templates/errors.html.php';
include './templates/add-address.html.php';
?>
</body>
</html>
