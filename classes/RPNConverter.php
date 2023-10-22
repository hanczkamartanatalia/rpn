<?php
/*
TODO
Cały algorytm zmieniania zwykłego działania na RPN

*/

$file ="../interfaces/RPN.php";

if(!file_exists($file)){
    throw new Exception("Missing file: ".$file);
}
include $file;


class RPNConverter {

    public static function RPNConverter(string $input) : string {
        $result = "";
        return $result;
    }
}

?>