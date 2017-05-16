<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="includes/css/bootstrap.min.css"/>
        <title></title>
    </head>
    <body>
        <nav>
            <!-- Nav --> 
            <ul class="nav nav-pills">
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Sign up</a></li>
                <li><a href="index.php">Home</a></li>
                <?php
                session_start();
                if (isset($_SESSION['userid']) && $_SESSION['userid'] == '1') {
                    echo '<li><a href="Admin.php">Admin</a></li>';
                }
                ?>
            </ul>
        </nav>
        <form method="post">
            <?php
            if (isset($_SESSION['userid'])) {
                echo '<input type="submit" value="Signout!" name="signout">';
            }
            ?></form>
