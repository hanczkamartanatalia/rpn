<?php

class FileChecker{

    public static function IsFileExist(string $filePatch): bool
    {
        if(!file_exists($filePatch))
        {
            return false;
        }

        return true;
    }


    public static function VerifyFilesExist(array $filesPatchList)
    {
        foreach($filesPatchList as $file)
        {
            if (!self::isFileExist($file))
            {
                throw new Exception("Missing file: ".$file);
            }
        }
    }

    public static function includeFiles(array $filesPatchList)
    {
        foreach($filesPatchList as $file)
        {
            include $filesPatchList;
        }
    }
}
