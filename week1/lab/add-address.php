<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once './models/dbconnect.php';
        require_once './models/util.php';
        require_once './models/validation.php';
        require_once './models/addressCRUD.php';

        $fullName = filter_input(INPUT_POST, 'fullName');
        $email = filter_input(INPUT_POST, 'email');
        $address = filter_input(INPUT_POST, 'address');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $bday = filter_input(INPUT_POST, 'bday');

        $errors = [];
        $states = GetStates();

        if (isPostRequest()) {
            if (empty($fullName)) {
                $errors[] = 'Full name is required.';
            }

            if (!ValidEmail($email)) {
                $errors[] = 'Email is not valid.';
            }

            if (empty($address)) {
                $errors[] = 'Address is required.';
            }

            if (empty($city)) {
                $errors[] = 'City is required.';
            }

            if (empty($state)) {
                $errors[] = 'State is required.';
            }

            if (empty($zip)) {
                $errors[] = 'Zip is required.';
            } else {
                if (!ValidZip($zip)) {
                    $errors[] = 'Zip is not vaild.';
                }
            }

            if (!ValidDate($bday)) {
                $errors[] = 'Date is not valid';
            }

            if (empty($state)) {
                $errors[] = 'State is required.';
            }
            
            if (count($errors) === 0)
            {
                CreateAddress($fullName, $email, $address, $city, $state, $zip, $bday);
            }
        }

        include './templates/messages.html.php';
        include './templates/errors.html.php';
        include './templates/add-address.html.php';
        ?>
    </body>
</html>
