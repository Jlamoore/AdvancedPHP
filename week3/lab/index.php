<?php
require_once './includes/autoload.php';
require_once './includes/functions.php';
include './templates/header.php';

//logout and redirect
if (isset($_POST['signout'])) {
    signout();
    header("Location: http://localhost:8080/AdvancedPHP/week3/lab/login.php"); /* Redirect browser */
    exit();
}
?>
</body>
</html>
