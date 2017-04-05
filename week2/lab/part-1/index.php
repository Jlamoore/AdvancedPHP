<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once './autoload.php';
        
        $errorMessage = new ErrorMessage();
        $successMessage = new SuccessMessage();
        
        $successMessage->addMessage("Test1","Testing");
        $successMessage->addMessage("Test2","Testing");
        $successMessage->addMessage("Test3","Testing");
        
        $successMessage->removeMessage("Test2");
        var_dump('<br />', $successMessage->getAllMessages());
        
        $errorMessage->addMessage("Test1","Testing");
        $errorMessage->addMessage("Test2","Testing");
        $errorMessage->addMessage("Test3","Testing");
        
        $errorMessage->removeMessage("Test1");
        var_dump('<br />', $errorMessage->getAllMessages());
        ?>
    </body>
</html>
