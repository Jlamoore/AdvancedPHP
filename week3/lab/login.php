<?php
require_once './includes/autoload.php';
require_once './includes/functions.php';
include './templates/header.php';

$email = filter_input(INPUT_POST, 'Email');
$pass = filter_input(INPUT_POST, 'Password');
$util = new Util();
if ($util->isPostRequest()) {
    //logout and redirect
    if (isset($_POST['signout'])) {
        signout();
        header("Location: http://localhost:8080/AdvancedPHP/week3/lab/login.php"); /* Redirect browser */
        exit();
    }
    //validate
    $valid = new Validation();

    if (!$valid->ValidEmail($email)) {

        $errors[] = "Invalid Email!";
    }
    if (!$valid->ValidPassword($pass)) {

        $errors[] = "Invalid Password!";
    }
    if (!isset($errors) || count($errors) == 0) {
        $db = new DB();
        $userid = $db->Login($email);
        if (isset($userid)) {
            if ($userid["password"] == sha1($pass)) {
                $_SESSION['userid'] = $userid["user_id"];
                $_SESSION['email'] = $userid["email"];
                $_SESSION['created'] = $userid["created"];
                $errors[] = "Logged in!";
            } else {
                $errors[] = "Failed to login!";
            }
        }
    }
}

include './templates/errors.html.php';
include './templates/login-html.php';
?>
</body>
</html>
