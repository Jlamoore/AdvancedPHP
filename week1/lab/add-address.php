<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once './models/dbconnect.php';
        require_once './models/util.php';

        $fullName = filter_input(INPUT_POST, 'fullName');
        $email = filter_input(INPUT_POST, 'address');
        $address = filter_input(INPUT_POST, 'fullName');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $bday = filter_input(INPUT_POST, 'bday');
        
        $errors = [];

        if (isPostRequest()) {
            if(empty($fullName)){
                $errors[] = 'Full name is required';
            }
        }
        
        include './templates/add-address.html.php';
        ?>
    </body>
</html>
