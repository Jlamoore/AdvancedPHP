        <?php
        require_once './includes/autoload.php';
        include './templates/header.php';
        
        $util = new Util();
        if($util->isPostRequest())
        {
           echo 'post'; 
        }
        
        include './templates/login-html.php';
        ?>
    </body>
</html>
