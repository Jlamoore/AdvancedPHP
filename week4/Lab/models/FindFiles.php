<?php

class FindFiles {

    public $folder = null;
    public $files = array();
    public $numberOfFiles;

    //get all of teh files in teh upload folder
    function getFiles() {
        //check folder variable
        if (!isset($this->folder)) {
            return "Not set!";
        }
        //search the directory
        $directory = scandir($this->folder);
        //for each file get the full path, check that its a file, and then add the full path and name to an array.
        foreach ($directory as $file) :
            $this->numberOfFiles = count($this->files);
            $fullPath = $this->folder . DIRECTORY_SEPARATOR . $file;
            if (is_file($fullPath)) :
                $this->files[$this->numberOfFiles] = ["FullPath" => $fullPath,
                    "Name" => $file];
            endif;
        endforeach;
        return $this->files;
    }

}
