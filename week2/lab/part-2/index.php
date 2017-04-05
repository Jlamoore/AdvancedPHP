<?php
require_once './models/DBAddress.php';
require_once './models/CRUD.php';
include './templates/header.php';

// Read ALL Addresses from the database
$crud = new CRUD();
$addresses = $crud->ReadAllAddress();

include './templates/view-address.html.php';
?>
</body>
</html>
