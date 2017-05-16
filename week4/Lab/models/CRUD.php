<?php

class CRUD {

    public $returnFileInfo = array();

    function delete($file) {
        //get full path
        $path = realpath($file);
        //check if is a file
        if (is_file($path)) {
            //delete
            if (unlink($path)) {
                return 'File Deleted!';
            } else {
                return 'error!';
            }
            echo $path;
        } else {
            return 'Not a File!';
        }
    }

//I could not get this to work for the life of me. I spent about two and a half hours messing with this, file directory etc.. 
    // originally I was getting all the file info here and adding it to an arry and passing the array to the crud.php page
    //now im just doing it on the crud page. 
    //FYI. the size and date would not work here. SplFileInfo error?
    function view($file) {
        if (is_file(realpath($file))) {
            $fileInfo = new finfo(FILEINFO_MIME_TYPE);
            $SplfileInfo = new SplFileInfo(realpath($file));
            $size = $SplfileInfo->getSize();
            $date = date("l F j, Y, g:i a", $SplfileInfo->getMTime());
            $this->returnFileInfo = ["Type" => $fileInfo->file($file)];
            array_push($this->returnFileInfo, ["Size" => $size]);
            array_push($this->returnFileInfo, ["Date" => $date]);
            array_push($this->returnFileInfo, ["Path" => realpath($file)]);
            array_push($this->returnFileInfo, ["Name" => $SplfileInfo->getBasename()]);
            return $this->returnFileInfo;
        }
        return null;
    }

}
