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
                <?php
                if (isset($links)) {
                    foreach ($links as $link => $link_address) {
                        echo '<li><a href="' . $link_address . '">' . $link . '</a></li>';
                    }
                }
                ?>
                <li><a href="index.php">Address List</a></li>
                <li><a href="add-address.php">Add Address</a></li>
            </ul>
        </nav>