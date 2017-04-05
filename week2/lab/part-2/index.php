<?php
include './templates/header.php';
include './models/dbconnect.php';
include './models/addressCRUD.php';
// Read ALL Addresses from the database

$addresses = ReadAllAddress();

include './templates/view-address.html.php';
?>
</body>
</html>
