<?php
//includes
include './templates/header.php';
include './models/FindFiles.php';
//classes
$findFiles = new FindFiles();
//set the folder to look into and get all the files
$findFiles->folder = "./includes/uploads";
$files = $findFiles->getFiles();
?>

<ol>
    <?php //display all the found files
    foreach ($files as $file) {
        ?><form method="post" action="crud.php">
            <li><p><?php echo $file["Name"]; ?></p>
                <input type="submit" name="Action" value="Delete">
                <input type="submit" name="Action" value="View">
                <input type="hidden" name="id" value="<?php echo $file["FullPath"]; ?>"/>
                <img src="<?php echo $file["FullPath"]; ?>"/> </li>
        </form>
        <?php
    }
    ?>
</ol>
</body>
</html>
