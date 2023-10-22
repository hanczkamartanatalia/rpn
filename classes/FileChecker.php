<?php

class FileChecker{

    public static function IsFileExist(string $file): bool
    {
        if(!file_exists($file))
        {
            return false;
        }

        return true;
    }


    public static function IsFilesExist(array $filesList): bool
    {
        foreach($filesList as $file)
        {
            if (!self::isFileExist($file))
            {
                return false;
            }

            return true;
        }
    }
}
