<?php

class FileService{

    public static function VerifyFilesExist(array $filesPatchList)
    {
        foreach($filesPatchList as $file)
        {
            if(!file_exists($file))
            {
                throw new Exception("Missing file: ".$file);
            }
        }
    }

    public static function includeFiles(array $filesPatchList)
    {
        foreach($filesPatchList as $file)
        {
            include_once $file;
        }
    }
}
