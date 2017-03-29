<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include './models/dbconnect.php';
        include './models/addressCRUD.php';
        
        $addresses = ReadAllAddress();
        
        include './templates/view-address.html.php';
        ?>
    </body>
</html>
