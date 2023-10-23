<?php
class StringService{

    public static function removeSpaceAtTheEnd(string &$input)
    {
        if (substr($input, -1) === ' ') {
            $output = substr($input, 0, -1);
        }
    }
}

?>