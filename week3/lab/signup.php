<?php
require_once './includes/autoload.php';
include './templates/header.php';

$email = filter_input(INPUT_POST, 'Email');
$pass = filter_input(INPUT_POST, 'Password');
$util = new Util();
if ($util->isPostRequest()) {

    $valid = new Validation();

    if (!$valid->ValidEmail($email)) {

        $errors[] = "Invalid Email!";
    } 
    if (!$valid->ValidPassword($pass)) {

        $errors[] = "Invalid Password!";
    }
    if(!isset($errors) || count($errors) == 0)
    {
        $db = new DB();
        if (!$valid->AvailableEmail($db, $email)) {

            $errors[] = "Email is already in use!";
        } else {
            $added = $db->createLogin($email, $pass);
            $errors = "Success!";
            echo $added;
        }
        $db->closeDB();
    }
}

include './templates/errors.html.php';
include './templates/signup-html.php';
?>
</body>
</html>