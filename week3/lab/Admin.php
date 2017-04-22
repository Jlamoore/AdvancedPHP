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

//if admin show page
if (isset($_SESSION['userid']) && $_SESSION['userid'] == '1') {
    ?>
    <div class="container">
        <div class="row">
            <table class="table-striped col-lg-12 col-md-12 col-sm-12">
                <th>Userid</th>
                <th>Email</th>
                <th>Created</th>
                <tr><td><?php echo $_SESSION['userid']; ?></td>
                    <td><?php echo $_SESSION['email']; ?></td>
                    <td><?php
    $date = strtotime($_SESSION['created']);
    $dateFormat = date("m/d/y g:i A", $date);
    echo $dateFormat;
    ?></td></tr>
            </table>
        </div>
    </div>
    <?php
} else {
    $errors[] = "You are not an Admin!";
}
?>
</body>
</html>