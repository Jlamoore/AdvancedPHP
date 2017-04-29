<?php
//includes
include './templates/header.php';
include './models/CRUD.php';
include './models/Util.php';

//classes
$util = new Util();
$crud = new CRUD();

//is post?
if ($util->isPostRequest()) {
    //check teh action, view or delete
    if (filter_input(INPUT_POST, "Action") !== NULL) {
        if (filter_input(INPUT_POST, "Action") == "Delete") {
            //delete the file
            echo $crud->delete(filter_input(INPUT_POST, "id"));
        } else {
            if (filter_input(INPUT_POST, "Action") == "View") {
                //this is the stuff I tried to do in my crud class
                //get the full path.
                $file = realpath(filter_input(INPUT_POST, "id"));
                //create class
                $fileInfo = new finfo(FILEINFO_MIME_TYPE);
                //create class
                $SplfileInfo = new SplFileInfo($file);
                //output type, size, name and date of file
                ?> <p>File Size: <?php echo $SplfileInfo->getSize(); ?></p>
                <p>File Type: <?php echo $fileInfo->file($file); ?></p>
                <p>File Date Created: <?php echo date("l F j, Y, g:i a", $SplfileInfo->getMTime()); ?></p>
                <p>File Link: <a href="<?php echo filter_input(INPUT_POST, "id"); ?>" target="_blank"><?php echo $SplfileInfo->getBasename(); ?></a></p> 
                <form action="#" method="post">
                    <input type="submit" name="Action" value="Delete">
                    <input type="hidden" name="id" value="<?php echo filter_input(INPUT_POST, "id"); ?>"/>
                </form>
                <?php
                //File specific stuff, Img, Iframe, Download etc..
                if ($fileInfo->file($file) == "image/jpeg" || $fileInfo->file($file) == "image/png" || $fileInfo->file($file) == "image/gif") {
                    ?><img src="<?php echo filter_input(INPUT_POST, "id"); ?>"><?php
                } else if ($fileInfo->file($file) == "text/plain") {
                    ?> <textarea rows="20" cols="200"><?php
                    $spl = new SplFileObject($file);
                    $spl->openFile();
                    echo $spl->fread($spl->getSize())
                    ?></textarea><?php
                    } else if ($fileInfo->file($file) == "application/pdf" || $fileInfo->file($file) == "text/html") {
                        ?><iframe src="<?php echo filter_input(INPUT_POST, "id"); ?>" height="500px" width="1000px"> <?php
                } else {
                    ?><a href="<?php echo filter_input(INPUT_POST, "id"); ?>" download>download</a><?php
                }
            }
        }
    } else {
        echo 'Post error';
    }
}
?>
</body>
</html>
