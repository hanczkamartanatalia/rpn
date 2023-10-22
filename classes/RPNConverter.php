<?php
/*
TODO
Cały algorytm zmieniania zwykłego działania na RPN, IMPLEMENTACJA IO

*/

$file ="../interfaces/RPN.php";

if(!file_exists($file)){
    throw new Exception("Missing file.");
}
include $file;


class RPNConverter implements RPN
{
    public function calculate(string $input):float
    {
        
    }
}

?>